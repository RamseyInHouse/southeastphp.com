<?php

namespace SoutheastPhp\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SoutheastPhp\Api\UserTransformer;
use SoutheastPhp\Http\Controllers\Controller;
use SoutheastPhp\Http\Requests\Api\UserRequest;
use SoutheastPhp\Models\UserRepository;

class UserController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var UserTransformer
     */
    private $transformer;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(Response $response, UserTransformer $transformer, UserRepository $userRepository)
    {
        $this->response = $response;
        $this->transformer = $transformer;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return $this->response->setContent(fractal($user)->transformWith($this->transformer)->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request)
    {
        $this->userRepository->createUser($request);

        return $this->response->setContent('User was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
