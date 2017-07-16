<?php

namespace SoutheastPhp\Http\Controllers\Api;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SoutheastPhp\Api\AirportTransformer;
use SoutheastPhp\Http\Controllers\Controller;
use SoutheastPhp\Http\Requests\AirportRequest;

class AirportController extends Controller
{
    /**
     * @var string
     */
    private $endpoint = 'https://www.air-port-codes.com/api/v1/autocomplete?term=';

    /**
     * @var Response
     */
    private $response;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var AirportTransformer
     */
    private $transformer;

    public function __construct(Response $response, Client $client, AirportTransformer $transformer)
    {
        $this->response = $response;
        $this->client = $client;
        $this->transformer = $transformer;
    }

    public function index(AirportRequest $request)
    {
        $airports = $this->makeRequest($request);

        $list = fractal(json_decode($airports, true))->transformWith($this->transformer)->toArray();

        return $this->response->setContent($list);
    }

    private function makeRequest(AirportRequest $request)
    {
        $response = $this->client->get($this->endpoint . $request->getTerm(), [
            'headers' => [
                'APC-Auth' => env('AIRPORT_KEY'),
                'APC-Auth-Secret' => env('AIRPORT_SECRET')
            ]
        ]);


        if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 299) {
            return $response->getBody()->getContents();
        } else {
            throw new Exception(sprintf(
                'IATA API threw a %s and returned %s',
                $response->getStatusCode(),
                $response->getReasonPhrase()
            ));
        }

    }
}
