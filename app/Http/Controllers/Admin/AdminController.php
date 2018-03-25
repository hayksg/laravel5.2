<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth', ['only' => 'index']);
        //$this->middleware('auth', ['except' => 'index']);
    }
    
    public function index()
    {
        return view('admin.index');
    }
}
