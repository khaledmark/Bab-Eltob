<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Screen;
use App\Property;
use App\Rate;
use App\Setting;
use Illuminate\Http\Request;
use Validator;

class LangingController extends Controller
{

    public function index(){
        return view('welcome');
    }
}
