<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\UserManager;
use App\Models\User;
use App\Models\Room;
use App\Models\Myplants;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    var $manager;

    function __construct() {
        $this->manager = app(UserManager::class);
    }

    public function user(){
        $user = User::all()->find(Auth::user());

        return new UserResource($user);
    }

    /**
     * create rooms for user in profile
     */

    public function rooms(){
        $rooms = Room::where('user_id', Auth::id())->get();
        return $rooms;
    }

    public function createRoom(Request $request){
        $room = $this->manager->createRoom(Auth::id(), $request->toArray());
        return $room;
    }

    public function delRoom($id){
        return $this->manager->delRoom($id);
    }

    /**
     * get count of plants user's
     */

    public function countPlants(){
        $count = Myplants::where('user_id', Auth::id())->count();
        return $count;
    }
}
