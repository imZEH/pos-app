<?php

namespace App\Http\Controllers\Api;

use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTypeController extends Controller
{
    public function getUserType() {
        $user_types = UserType::all();

        if ( $user_types->count() > 0 ) {
            return response()->json( [
                'status'=> 200,
                'data'=> $user_types
            ], 200 );
        } else {
            return response()->json( [
                'status'=> 404,
                'message'=> 'No data'
            ], 404 );
        }
    }
}
