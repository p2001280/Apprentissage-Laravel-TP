<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import correct de la façade Hash

class HomeController extends Controller
{

    public function index() {
        $properties = Property::available()
        ->recent()
        ->limit(4)
        ->get();
        return view('home', ['properties' => $properties]);
    }

}
