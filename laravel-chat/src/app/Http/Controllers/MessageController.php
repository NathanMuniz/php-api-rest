<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Message;
use App\Http\Request;
use App\Conversation;
use LRedis;

class MessageController extends Controller
{

  public function store(Request $request){
    $Conversation = Conversation::findOrFail($request->conversation_id);
    if($conversation->user1 == Auth::user()->id || $conversaion->user2 == Auth::user()->id){
      
      $message = new Message; 
      $message->conversation_id = $request->conversation_id;
      $message->user_id = Auth::user()->id;
      $message->text = $request->text;
      $message->is_read = 0;
      $message->save();

      $receiver_id = ($conversation->user1 == Auth::user()->id)? $conversaion->user2: $Conversation->user1;
      $data = [
        'conversation_id'=>$request->conversation_id,
        'text' => $request->text,
        'clinet_id' => $receiver_id 
      ];

      $redis = LRedis::connection();
      $redis->publish('message', json_encode($data));

      return response()->json(true);
    }
    
    return response()->json(true);
  }

  return response()->json("permission error");



}
