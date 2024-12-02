<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Component;

class TypeController extends Controller
{
    public function index()
    {
        
        $allComponents = Component::all();
        $types = Type::all(); 

        return view('comp.chose_comp', compact(
         'allComponents',
         'types'
    ));
    }
}
