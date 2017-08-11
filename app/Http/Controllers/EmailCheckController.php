<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EmailChecker;
use File;

class EmailCheckController extends Controller
{
    public function test()
    {
        $bank_json        = File::get(public_path('json/list.json'));

        $lists = json_decode($bank_json);

        $new_json        = File::get(public_path('json/new.json'));

        $news = json_decode($new_json);
        foreach ($news as $new){
            $email = in_array($new, $lists);
            if (!$email){
                array_push($lists,$new);
            }
        }
        echo count($lists);
        echo '<br>';

        $jsonData = json_encode($lists);
        file_put_contents(public_path('json/result.json'), $jsonData);

        return $email;
    }
    public function index(Request $request)
    {
        $this->validate($request,[
           'email' => 'required|email'
        ]);

        if (EmailChecker::check($request->email)){
            return response()->json([
                'success' => true,
                'message' => $request->email.' is valid'
            ]);
        }

        return response()->json([
            'fail' => true,
            'message' => $request->email.' is invalid'
        ]);


    }
}
