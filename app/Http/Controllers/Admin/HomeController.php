<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function profile(){
        return view('profile.update-profile-information-form');
    }
    public function vista(){
        return view('vision');
    }

}
