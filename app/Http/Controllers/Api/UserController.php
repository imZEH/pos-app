<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    public function index() {
        $users = User::join('user_type', 'user.userTypeId', '=', 'user_type.id')
                    ->select('user.*', 'user_type.*')
                    ->get();

        if ( $users->count() > 0 ) {
            return response()->json( [
                'status'=> 200,
                'data'=> $users
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
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'contactNumber' => 'required',
            'userTypeId' => 'required'
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {
            $user = User::create( [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'address' => $request->address,
                'contactNumber' => $request->contactNumber,
                'userTypeId' => $request->userTypeId
            ] );

            if ( $user ) {
                return response()->json( [
                    'status' => 200,
                    'message' => 'User added successfully'
                ], 200 );
            } else {
                return response()->json( [
                    'status' => 500,
                    'message' => 'Something went wrong'
                ], 500 );
            }
        }
    }

    public function getUser( $id ) {
        $user = User::find( $id );
        if ( $user ) {
            return response()->json( [
                'status' => 200,
                'data' => $user
            ], 200 );
        } else {
            return response()->json( [
                'status' => 500,
                'message' => 'Something went wrong'
            ], 500 );
        }
    }

    public function update( Request $request, int $id ) {
        $validator = Validator::make( $request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'contactNumber' => 'required',
            'userTypeId' => 'required',
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {

            $user = User::find( $id );

            if ( $user ) {
                $user->update( [
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'address' => $request->address,
                    'contactNumber' => $request->contactNumber,
                    'userTypeId' => $request->userTypeId
                ] );

                return response()->json( [
                    'status' => 200,
                    'message' => 'User updated successfully'
                ], 200 );
            } else {
                return response()->json( [
                    'status' => 500,
                    'message' => 'User not found'
                ], 500 );
            }
        }
    }

    public function delete( $id ) {
        $user = User::find($id);
        if ( $user ) {
            $user->delete();
            return response()->json( [
                'status' => 200,
                'message' => 'User deleted successfully'
            ], 200 );
        } else {
            return response()->json( [
                'status' => 404,
                'message' => 'User not found'
            ], 404 );
        }
    }
}
