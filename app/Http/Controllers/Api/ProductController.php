<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
        public function getProduct() {
            $units = Product::join('unit', 'product.unitId', '=', 'unit.id')
                        ->join('category', 'product.categoryId', '=', 'category.id')
                        ->join('subcategory', 'product.subCategoryId', '=', 'subcategory.id')
                        ->select('product.*', 'unit.name as unit', 'category.name as categoryname','subcategory.name as subcategoryname')
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
            'sellingPrice' => 'required',
            'stock' => 'required',
            'unitId' => 'required',
            'categoryId' => 'required',
            'subCategoryId' => 'required'
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {
            $user = Product::create( [
                'name' => $request->name,
                'sellingPrice' => $request->sellingPrice,
                'stock' => $request->stock,
                'unitId' => $request->unitId,
                'categoryId' => $request->categoryId,
                'subCategoryId' => $request->subCategoryId,
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
            'sellingPrice' => 'required',
            'stock' => 'required',
            'unitId' => 'required',
            'categoryId' => 'required',
            'subCategoryId' => 'required'
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        } else {

            $user = Product::find( $id );

            if ( $user ) {
                $user->update( [
                    'name' => $request->name,
                    'sellingPrice' => $request->sellingPrice,
                    'stock' => $request->stock,
                    'unitId' => $request->unitId,
                    'categoryId' => $request->categoryId,
                    'subCategoryId' => $request->subCategoryId
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
