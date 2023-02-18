<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function index(){
        return view('index');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'weight' => ['required'],
            'height' => ['required'],
        ]);
        
        $weight = $request->input('weight');
        $height = $request->input('height') / 100;

        $usersBMI = number_format($weight / ($height * $height),1);

        $request = session()->flash('bmi', $usersBMI);
        Session::flash('message', 'Calculation performed sucessfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->route('bmi.store');
    }
}
