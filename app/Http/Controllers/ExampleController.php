<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function testeLaravel($teste){
        return "Laravel Rodando... " . $teste;
    }
}
