<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function create(){
          $returnhtml=View()->make('users.create')->render();
          return $returnhtml;
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|confirmed'
        ]);
        return;
    }
}
