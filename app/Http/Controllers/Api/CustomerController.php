<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function getCustomer() {
        $units = Customer::all();

        if ( $units->count() > 0 ) {
            return response()->json( [
                'status'=> 200,
                'data'=> $units
            ], 200 );
        } else {
            return response()->json( [
                'status'=> 200,
                'message'=> 'No data',
                'data'=> []
            ], 200 );
        }
    }

    public function getCustomerBySearch( Request $request )
    {
        $requestData = $request->json()->all();
        $query = $requestData[ 'query' ] ?? '';

        $queryBuilder = Customer::query();

        if ( $query !== '' ) {
            $queryBuilder->where(function($q) use ($query) {
                $q->where('firstName', 'like', '%' . $query . '%')
                  ->orWhere('lastName', 'like', '%' . $query . '%');
            });
        }

        $customer = $queryBuilder->get();

        if ( $customer->count() > 0 ) {
            return response()->json( [
                'status' => 200,
                'data' => $customer
            ], 200 );
        } else {
            return response()->json( [
                'status' => 200,
                'message' => 'No data found',
                'data' => []
            ], 200 );
        }
    }

    public function save( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'contactNumber' => 'required',
            'address' => 'required'
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {
            $user = Customer::create( [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'contactNumber' => $request->contactNumber,
                'address' => $request->address
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

    

    public function update( Request $request, int $id ) {
        $validator = Validator::make( $request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'contactNumber' => 'required',
            'address' => 'required'
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {

            $user = Customer::find( $id );

            if ( $user ) {
                $user->update( [
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'contactNumber' => $request->contactNumber,
                    'address' => $request->address
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
        $user = Customer::find($id);
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
