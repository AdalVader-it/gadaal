<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




      public function index()
    {          
        $users=user::orderBy('id', 'desc')->paginate(10);

    	return view('auth.index', compact('users'));

    }



}
