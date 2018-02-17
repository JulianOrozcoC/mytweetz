<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Twitter;
use \File;
class TwitterController extends Controller
{
    private $count = 10;
    private $format = 'array';

    public function twitterUserTimeLine(){
        $data = Twitter::getUserTimeLine(['count' => $this->count, 'format' => $this->format]);
        return view('twitter')->with('data', $data);
    }

    public function tweet(Request $request){
        $this->validate($request, [
            'tweet' => 'required'
        ]);

        $newTweet = ['status' => $request->tweet];
        
    }
}
