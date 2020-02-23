<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loadHome(){
        $laraconEstDateTime = Carbon::parse(config('app.laraconDate'));
        $laraconEstDateTime = Carbon::parse($laraconEstDateTime);
        $eventPassed = false;
        if (Carbon::now('EST')->gt($laraconEstDateTime) && Carbon::now()->diffInDays($laraconEstDateTime) < 20){
            $eventPassed = true;
        }
        return view('welcome')->with('laraconEstDateTime',$laraconEstDateTime)->with('eventPassed',$eventPassed);
    }
}
