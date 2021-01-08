<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Random;
use App\Models\Breakdown;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    public function index()
    {
        $randoms = Random::all();
        foreach($randoms as $random){
            $random->update(['flag' => true]);
        }
        for($i=0 ; $i<$this->randomizer(); $i++){
            $random = new Random([
                'values' => $this->nameGenerator(),
                'flag' => false
                ]);
            $random->save();
            for($j=0; $j<$this->randomizer(); $j++){
                $breakdown = new Breakdown(['values' => $this->randomString() ]);
                $random->breakdowns()->save($breakdown);
            }
        }

        $randoms = Random::all();
        return view('viewrandom', ['allRandom' =>$randoms]);
    }

    public function nameGenerator()
    {
        $json = file_get_contents(base_path('resources/lang/names.json'));
        $names = json_decode($json);
        return $names[rand(0, sizeof($names) )];
    }

    public function randomizer(){
        return rand(5,10);
    }

    public function randomString($length = 5){
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

}
