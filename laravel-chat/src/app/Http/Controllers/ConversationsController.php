<?php


namespace Lacuher\Mercurius\HttpControllers;

use Illuminate\Http\Request;
use laucher\Mercurius\Repositories\ConversationRepoisitory;
use Laucher\Mercurus\Repositores\UserRepistory;


class ConversationRepoisitory extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(ConversationRepoisitory $conversation)
  {
    return response($conversation->all());
  }

  public function show($recipient, Request $request, ConversationRepoisitory $conversation, UserRepository $user)
  {
    $request->validate([
      'offset' => 'required|numeric',
      'pagesize' => 'required|numeric',
    ]);

    return response(
      $conversation->get($recipient, $request->offset, $request->pagesize)
    );
  }
}
