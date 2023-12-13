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

    public function save(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'sellingPrice' => 'required',
        'stock' => 'required',
        'unitId' => 'required',
        'categoryId' => 'required',
        'subCategoryId' => 'required',
        'imgPath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add image validation rules
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 422,
            'errors' => $validator->messages(),
        ], 422);
    } else {
       $image = "";
        if ($request->hasFile('imgPath')) {
            $imgPath = $request->file('imgPath');
            $imageName = time() . '.' . $imgPath->getClientOriginalExtension();
            $imgPath->move(public_path('images'), $imageName);
            // Save $imageName to the database or use it as needed
           $image = "public/images" . "" . $imageName;
        }
        $user = Product::create([
            'name' => $request->name,
            'sellingPrice' => $request->sellingPrice,
            'stock' => $request->stock,
            'unitId' => $request->unitId,
            'categoryId' => $request->categoryId,
            'subCategoryId' => $request->subCategoryId,
            'imgPath' => $image
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Product added successfully',
        ], 200);
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
}
