<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\LawResource;
use App\UserManager;
use App\AdminManager;
use App\Models\User;
use App\Models\Law;
use App\Models\Room;
use App\Models\Advice;
use App\Models\Myplants;
use App\Models\Query;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    var $manager;

    function __construct() {
        $this->manager = app(AdminManager::class);
    }

    /**
     * get queries for an articles
     */

    public function queries(){
        return Query::with('users')->get();
    }

    public function queryById($id){
        return Query::where('id', $id)->with('users')->get();
    }

    /**
     * get laws
     */

    public function laws(){
        $laws = Law::with('users')->get();
        return $laws;
    }

    public function lawById($id){
        return Law::where('id', $id)->with('users')->get();
    }

    /**
     * filters for laws
     */
    
    public function lawsByStatusOne() {
        $laws = Law::where('status', '=', 'На рассмотрении')->with('users')->get();
        return $laws;
    }

    public function lawsByStatusTwo() {
        $laws = Law::where('status', '=', 'Одобрено')->with('users')->get();
        return $laws;
    }

    public function lawsByStatusThree() {
        $laws = Law::where('status', '=', 'Отказано')->with('users')->get();
        return $laws;
    }

    /**
     * filters for queries
     */

     public function queriesByStatusOne() {
        $laws = Query::where('status', '=', 'На проверке')->with('users')->get();
        return $laws;
    }

    public function queriesByStatusTwo() {
        $laws = Query::where('status', '=', 'Опубликовано')->with('users')->get();
        return $laws;
    }

    public function queriesByStatusThree() {
        $laws = Query::where('status', '=', 'Отказано')->with('users')->get();
        return $laws;
    }

    /**
     * update status for law
     */

    public function updateLaw($id, Request $request){
        $law = Law::where('id', $id)->update($request->all());
        return $law;
    }

    /**
     * update status for law
     */

    public function updateQuery($id, Request $request){
        $query= Query::where('id', $id)->update($request->all());
        return $query;
    }

    /**
     * add advice
     */

    public function createAdvice(Request $request){
        $advice = $this->manager->createAdvice(Auth::id(), $request->toArray());
        return $advice;
    }

    /**
     * give role of expert for user
     */

    public function giveRoleExpert($id, Request $request){
        $user = User::where('id', $id)->first();
        $user->assignRole('expert');
        $user->removeRole('user');
        return $user;
    }


}
