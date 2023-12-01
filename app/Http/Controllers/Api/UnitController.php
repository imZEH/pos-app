<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function getUnits() {
        $units = Unit::all(); // SELECT * FROM units;

        if ( $units->count() > 0 ) {
            return response()->json( [
                'status'=> 200,
                'data'=> $units
            ], 200 );
        } else {
            return response()->json( [
                'status'=> 404,
                'message'=> 'No data'
            ], 404 );
        }
    }

    public function save( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'name' => 'required',
            'slug' => 'required'
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {
            $user = Unit::create( [
                'name' => $request->name,
                'slug' => $request->slug
            ] );

            if ( $user ) {
                return response()->json( [
                    'status' => 200,
                    'message' => 'Unit added successfully'
                ], 200 );
            } else {
                return response()->json( [
                    'status' => 500,
                    'message' => 'Something went wrong'
                ], 500 );
            }
        }
    }

    public function update( Request $request, int $id ) {
        $validator = Validator::make( $request->all(), [
            'name' => 'required',
            'slug' => 'required'
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {

            $user = Unit::find( $id );

            if ( $user ) {
                $user->update( [
                    'name' => $request->name,
                    'slug' => $request->slug
                ] );

                return response()->json( [
                    'status' => 200,
                    'message' => 'Unit updated successfully'
                ], 200 );
            } else {
                return response()->json( [
                    'status' => 500,
                    'message' => 'User not found'
                ], 500 );
            }
        }
    }
}
