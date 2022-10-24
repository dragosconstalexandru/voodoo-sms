<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jobs\LogUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function logUser(Request $request): Response
    {
        try{
            $pickedUser = User::inRandomOrder()->limit(1)->get()->first();
            LogUser::dispatch($pickedUser);
            return new Response('Logged user');
        } catch (ModelNotFoundException $exception) {
            return (new Response('No user found'))->setStatusCode(404);
        }
    }
}
