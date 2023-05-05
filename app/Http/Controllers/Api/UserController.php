<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\LawResource;
use App\UserManager;
use App\Models\User;
use App\Models\Room;
use App\Models\Advice;
use App\Models\Myplants;
use App\Models\Law;
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

    public function updateUser(Request $request){
        // $user = User::where('id', $id)->update($request->all());
        $user = User::all()->find(Auth::user())->update($request->all());
        return $user;
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

    public function updateRoom($id, Request $request){
        // $user = User::where('id', $id)->update($request->all());
        $room = Room::where('id', $id)->update($request->all());
        return $room;
    }

    public function getMyRoomById($id){
        return Room::where('id', $id)->get();
    }



    /**
     * get count of plants user's
     */

    public function countPlants(){
        $count = Myplants::where('user_id', Auth::id())->count();
        return $count;
    }

    /**
     * add plant in table myplants
     */

    public function addPlant(Request $request) {
        $plant = $this->manager->addPlant(Auth::id(), $request->toArray());
        return $plant;
    }

    public function myplants(){
        $myplants = Myplants::where('user_id', Auth::id())->with('plants')->get();
        // $myplants = Myplants::with('plants')->get(); 
        return $myplants;       
    }

    public function getMyPlantById($id){
        return Myplants::where('id', $id)->with('plants')->get();
    }

    /**
     * advice
     */

    public function getAllAdvice(){
        return Advice::with('users')->get();
    }

    public function getAdviceById($id){
        return Advice::where('id', $id)->get();
    }

    /**
     * add law for an get right of an expert
     */

    public function createLaw(Request $request){
        $law = $this->manager->createLaw(Auth::id(), $request->toArray());
        return new LawResource($law);
    }

    /**
     * delete MyPlants
     * 
     */

    public function delPlant($id){
        return $this->manager->delPlant($id);
    }

    /**
     * update room of Myplants
     */

    public function updateMyPlant($id, Request $request){
        $myplant = Myplants::where('id', $id)->update($request->all());
        return $myplant;
    }

    public function myLaws(){
        $laws = Law::where('user_id', Auth::id())->latest()->get();
        return $laws;       
    }



}
