<?php

namespace App\Http\Controllers\Api;

use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    public function getsubcategory() {
        $units = subcategory::join('category', 'subcategory.categoryId', '=', 'category.id')
                    ->select('subcategory.*', 'category.name as categoryname')
                    ->get();

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
            'categoryId' => 'required'
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {
            $user = subcategory::create( [
                'name' => $request->name,
                'categoryId' => $request->categoryId
            ] );

            if ( $user ) {
                return response()->json( [
                    'status' => 200,
                    'message' => 'Category added successfully'
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
            'categoryId' => 'required'
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {

            $user = subcategory::find( $id );

            if ( $user ) {
                $user->update( [
                    'name' => $request->name,
                    'categoryId' => $request->categoryId
                ] );

                return response()->json( [
                    'status' => 200,
                    'message' => 'Category updated successfully'
                ], 200 );
            } else {
                return response()->json( [
                    'status' => 500,
                    'message' => 'User not found'
                ], 500 );
            }
        }
    }
    public function getsubcategoryId($id) {
        $subcategories = subcategory::where('categoryId', $id)->get();

        if ( $subcategories->count() > 0 ) {
            return response()->json( [
                'status'=> 200,
                'data'=> $subcategories
            ], 200 );
        } else {
            return response()->json( [
                'status'=> 404,
                'message'=> 'No data'
            ], 404 );
        }
    }
}

