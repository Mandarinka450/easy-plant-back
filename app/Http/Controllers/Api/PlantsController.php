<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;

class PlantsController extends Controller
{
    public function getAll(){
        return Plant::all();
    }

    public function plantByCategory($id){
        return Plant::where('category_id', $id)->get();
    }

    public function getPlantById($id){
        return Plant::where('id', $id)->get();
    }

    /**
     * find a plant in catalog
     */

    public function findPlant($plant){
        $plants = Plant::where('name_rus', 'LIKE', "%{$plant}%")->get();
        return $plants;
    }
}
