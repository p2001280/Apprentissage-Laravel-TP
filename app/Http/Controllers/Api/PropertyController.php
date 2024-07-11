<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\PropertyCollection;

class PropertyController extends Controller
{
    public function index() 
    {
        // return Property::paginate(5);
         
        // return PropertyResource::collection(Property::limit(5)->with('options')->get());
        // return new PropertyCollection(Property::limit(5)->with('options')->get());
        return new PropertyResource(Property::find(10));    
    }
}
