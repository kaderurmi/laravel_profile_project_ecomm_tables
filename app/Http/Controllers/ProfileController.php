<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
   function page (Request $request){
    return view('Home');
   }
}
