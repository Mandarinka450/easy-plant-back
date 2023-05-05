<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\QueryResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Advice;
use App\Models\Query;
use App\ExpertManager;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    var $manager;

    function __construct() {
        $this->manager = app(ExpertManager::class);
    }

    /**
     * create queries of an article
     */

    public function createQuery(Request $request){
        $query = $this->manager->createQuery(Auth::id(), $request->toArray());
        return new QueryResource($query);
    }

    public function myQueries(){
        $queries = Query::where('user_id', Auth::id())->get();
        return $queries;       
    }
}
