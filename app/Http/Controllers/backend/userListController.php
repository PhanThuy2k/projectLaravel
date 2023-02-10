<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class userListController extends Controller
{
    public function userList()
    {
        $user = User::Search()->paginate(7)->withQueryString();
        return view('backend.pages.user.index',compact('user'));
    }
}
