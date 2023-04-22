<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use App\User;
use Auth;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $users = User::where('id', '!=', Auth::user()->id)->get();
    $conversations = Auth::user()->conversations();
    return view('home', compact('users', 'conversations'));
  }
}
