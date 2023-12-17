<?php

namespace App\Http\Controllers\Api;

use App\Models\Orders;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\OrdersDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller {
    public function store( Request $request ) {
        $data = $request->json()->all();

        // Check if customerId is provided
        if ( empty( $data[ 'customerId' ] ) ) {
            // Create a new customer with default values

            if ( !empty( $data[ 'customerFirstName' ] ) ) {
                $customer = Customer::create( [
                    'firstName' => $data[ 'customerFirstName' ],
                    'lastName' => $data[ 'customerLastName' ],
                    'contactNumber' => 0,
                    'address' => '',
                ] );
            } else {
                $customer = Customer::create( [
                    'firstName' => 'Unknown',
                    'lastName' => 'Unknown',
                    'contactNumber' => 0,
                    'address' => '',
                ] );
            }
        } else {
            // Check if the provided customerId exists in the customers table
            $customer = Customer::find( $data[ 'customerId' ] );

            // If customerId is not found, create a new customer
            if ( !$customer ) {
                $customer = Customer::create( [
                    'firstName' => 'Unknown',
                    'lastName' => 'Unknown',
                    'contactNumber' => 0,
                    'address' => '',
                ] );
            }
        }

        // You can generate a unique order number as per your requirement
        $orderNumber = uniqid( 'order_' );

        // Create an order
        $order = Orders::create( [
            'orderNumber' => $orderNumber,
            'userId' => 2,
            'customerId' => $customer->id, // Assuming you have customerId in the request
            'transactionId' => 1, // Assuming you have transctionId in the request
        ] );

        foreach ( $data[ 'products' ] as $productId => $productData ) {
            $product = Product::find( $productId );

            // Check if the product exists
            if ( !$product ) {
                return response()->json( [ 'message' => 'Product not found' ], 404 );
            }

            // Step 2: Check if the product has enough stock
            if ( $product->stock >= $productData[ 'quantity' ] ) {

            } else {
                return response()->json( [ 'message' => 'Insufficient stock for the product ' . $product->name ], 400 );
            }
        }

        // Save order details
        foreach ( $data[ 'products' ] as $productId => $productData ) {
            if ( $productData[ 'quantity' ] > 0 ) {
                OrdersDetails::create( [
                    'orderId' => $order->id,
                    'productId' => $productId,
                    'price' => $productData[ 'sellingPrice' ],
                    'qty' => $productData[ 'quantity' ]
                ] );

                $this->updateStock($productId, $productData['quantity']);
            }
        }

        return response()->json( [ 'message' => 'Order created successfully' ], 201 );
    }

    private function updateStock( $productId, $qyt ) {
        $product = Product::find( $productId );
        $product->stock = $product->stock - $qyt;
        $product->save();
    }
    public function getDailyEarnings(){
        $currentDate = Carbon::now()->toDateString();

        $totalSum = OrdersDetails::whereDate('created_at', $currentDate)
            ->sum(DB::raw('price * qty'));

        return response()->json([
            'status' => 200,
            'data' => $totalSum,
        ], 200);
    }
    public function getAnnualEarnings(){
        $year = date('Y'); // Replace this with the desired year

        $totalSum = OrdersDetails::whereYear('created_at', $year)
            ->sum(DB::raw('price * qty'));

        return response()->json([
            'status' => 200,
            'data' => $totalSum,
        ], 200);
    }
}
