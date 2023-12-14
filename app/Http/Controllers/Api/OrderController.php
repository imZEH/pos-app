<?php

namespace App\Http\Controllers\Api;

use App\Models\Orders;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\OrdersDetails;
use App\Http\Controllers\Controller;

class OrderController extends Controller {
    public function store( Request $request ) {
        $data = $request->json()->all();

        // Check if customerId is provided
        if ( empty( $data[ 'customerId' ] ) ) {
            // Create a new customer with default values
            $customer = Customer::create( [
                'firstName' => 'Unknown',
                'lastName' => 'Unknown',
                'contactNumber' => 0,
                'address' => '',
            ] );
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
            'transctionId' => 1, // Assuming you have transctionId in the request
        ] );

        // Save order details
        foreach ( $data[ 'products' ] as $productId => $productData ) {
            OrdersDetails::create( [
                'orderId' => $order->id,
                'productId' => $productId,
                'price' => $productData[ 'sellingPrice' ],
            ] );
        }

        return response()->json( [ 'message' => 'Order created successfully' ], 201 );
    }
}
