<?php

namespace Launcher\Mercurius\Http\Controllers;

class PagesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function notificationPageSample()
  {
    return View('mercurius::example');
  }
}
