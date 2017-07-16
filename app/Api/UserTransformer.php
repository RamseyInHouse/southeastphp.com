<?php

namespace SoutheastPhp\Api;

use League\Fractal\TransformerAbstract;
use SoutheastPhp\User;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
            'preferredName' => $user->preferred_name,
            'city' => $user->city,
            'companyName' => $user->company,
            'twitter' => $user->twitter,
            'firstConference' => $user->first_conference
        ];
    }
}