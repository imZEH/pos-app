<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
 {
    public function getProduct() {
        $units = Product::join( 'unit', 'product.unitId', '=', 'unit.id' )
        ->join( 'category', 'product.categoryId', '=', 'category.id' )
        ->join( 'subcategory', 'product.subCategoryId', '=', 'subcategory.id' )
        ->select( 'product.*', 'unit.name as unit', 'category.name as categoryname', 'subcategory.name as subcategoryname' )
        ->get();

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

    public function getProductBySearch(Request $request)
    {
        
        $requestData = $request->json()->all();
        $query = $requestData['query'] ?? '';
        $subcategoryIds = $requestData['subcategoryIds'] ?? [];
        
        $queryBuilder = Product::query();
    
        if ($query !== '') {
            $queryBuilder->where('name', 'like', '%' . $query . '%');
        }
    
        if (!empty($subcategoryIds)) {
            $queryBuilder->whereIn('subCategoryId', $subcategoryIds);
        }
    
        $products = $queryBuilder->get();
    
        if ($products->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $products
            ], 200);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'No data found',
                'data' => []
            ], 200);
        }
    }
    

    public function save( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'name' => 'required',
            'sellingPrice' => 'required',
            'stock' => 'required',
            'unitId' => 'required',
            'categoryId' => 'required',
            'subCategoryId' => 'required',
            'imgPath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for image file
        ] );

        if ( $validator->fails() ) {
            return response()->json( [
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422 );
        } else {
            // Handle image upload
            $imagePath = $request->file( 'imgPath' )->store( 'images' );
            // 'images' is the storage folder

            $product = Product::create( [
                'name' => $request->name,
                'sellingPrice' => $request->sellingPrice,
                'stock' => $request->stock,
                'unitId' => $request->unitId,
                'categoryId' => $request->categoryId,
                'subCategoryId' => $request->subCategoryId,
'imgPath' => $imagePath, // Save the image path to the database
            ] );

            if ( $product ) {
                return response()->json( [
                    'status' => 200,
                    'message' => 'Product added successfully',
                ], 200 );
            } else {
                return response()->json( [
                    'status' => 500,
                    'message' => 'Something went wrong',
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
