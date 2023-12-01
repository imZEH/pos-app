<?php

namespace App\Http\Controllers\Api;

use App\Models\Accounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function getAccounts() {
        $accounts = Accounts::all(); // SELECT * FROM units;

        if ( $accounts->count() > 0 ) {
            return response()->json( [
                'status'=> 200,
                'data'=> $accounts
            ], 200 );
        } else {
            return response()->json( [
                'status'=> 404,
                'message'=> 'No data'
            ], 404 );
        }
    }
}
