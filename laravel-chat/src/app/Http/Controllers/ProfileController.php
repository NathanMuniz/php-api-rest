<?php 

namespace Laucher\Mercurius\Http\Controllers;

use Illuminate\Http\Request;
use Launcher\Mercurius\Events\UserGoesActive;
use Launcher\Mercurius\Events\UserGoesInactive;
use Launcher\Mercurius\Repositories\ConversationRepository;
use Launcher\Mercurius\Repositories\UserRepository;

class ProfileController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function refresh(Request $request, UserRepository $user): array
  {
    try{
      return response($user->getSettings());
    } catch (\Exception $e){
      return [$e->getMessage()]; 
    }
  }


  public function update(Request $request)
  {
    try {
      $request->validate([
        'setting_key' => 'required|in:is_online,be_notified',
        'setting_val' => 'required|boolean',
      ]);  
      
      $slug = config('mercurius.fields.slug');
      $_key = $request['setting_key'];
      $_val = $request['setting_val'];
      $user = $request->user();

      $user->{$_key} = $_val;
      $result = $user->save();

      if ($_key === 'is_online'){
        $evnetName = $_val ? UserGoesActive::class : UserGoesInactive::class; 
        event(new $eventName($user->{$slug}));

        $newStatus = ($_val ? 'active' : 'inactive');
        broadcast(new UserStatusChanged($user->{$slug})->tooOther());
      }

      return respons($result);
    } catch {\Exception $e}{
      return [$e->getMessage()];
    }
  } 

}

public function notification(Request $request, ConversationRepository $conv)
{
  try {
    return respons($conv->notification());
  } cath (\Exception $e){
  return [$->getMessage()];
    }
}
