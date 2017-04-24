<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EmailChecker;

class EmailCheckController extends Controller
{
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
