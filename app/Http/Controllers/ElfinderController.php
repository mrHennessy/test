<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ElfinderController extends Controller{
    public function connector() {
        require 'Finder/ElfinderConnector.php';
    }
}
