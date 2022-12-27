<?php

namespace App\Http\Controllers\backend;
// do không cùng cấp với controller nên phải use
use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }
}
