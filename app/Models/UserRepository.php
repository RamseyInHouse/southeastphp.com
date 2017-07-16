<?php
/**
 * Created by PhpStorm.
 * User: trask
 * Date: 7/15/17
 * Time: 12:18 PM
 */

namespace SoutheastPhp\Models;


use SoutheastPhp\Http\Requests\Api\UserRequest;
use SoutheastPhp\User;

class UserRepository
{
    public function createUser(UserRequest $request)
    {
        $user = new User();

        $user->name = $request->getEmail();
        $user->email = $request->getEmail();
        $user->first_name = $request->getFirstName();
        $user->last_name = $request->getLastName();
        $user->preferred_name = $request->getPreferredName();
        $user->twitter = $request->getTwitter();
        $user->company = $request->getCompanyName();
        $user->password = bcrypt($request->getPassword());

        return $user->save();
    }
}