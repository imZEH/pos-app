<?php

namespace App\Http\Controllers\Api;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function getSales() {
        $orders = Orders::join( 'order_details', 'orders.id', '=', 'order_details.orderId' )
        ->join( 'product', 'product.id', '=', 'order_details.productId' )
        ->join( 'customer', 'customer.id', '=', 'orders.customerId' )
        ->join( 'transaction_type', 'transaction_type.id', '=', 'orders.transactionId' )
        ->select( 'orders.orderNumber', 'customer.firstName', 'customer.lastName', 'product.name', 'order_details.price', 'order_details.qty' )
        ->where('transaction_type.id', '=', 1)
        ->get();

        if ( $orders->count() > 0 ) {
            return response()->json( [
                'status'=> 200,
                'data'=> $orders
            ], 200 );
        } else {
            return response()->json( [
                'status'=> 200,
                'message'=> 'No data',
                'data'=> []
            ], 200 );
        }
    }
    public function getReturns() {
        $orders = Orders::join( 'order_details', 'orders.id', '=', 'order_details.orderId' )
        ->join( 'product', 'product.id', '=', 'order_details.productId' )
        ->join( 'customer', 'customer.id', '=', 'orders.customerId' )
        ->join( 'transaction_type', 'transaction_type.id', '=', 'orders.transactionId' )
        ->select( 'orders.orderNumber', 'customer.firstName', 'customer.lastName', 'product.name', 'order_details.price', 'order_details.qty' )
        ->where('transaction_type.id', '=', 2)
        ->get();

        if ( $orders->count() > 0 ) {
            return response()->json( [
                'status'=> 200,
                'data'=> $orders
            ], 200 );
        } else {
            return response()->json( [
                'status'=> 200,
                'message'=> 'No data',
                'data'=> []
            ], 200 );
        }
    }
    public function getCancel() {
        $orders = Orders::join( 'order_details', 'orders.id', '=', 'order_details.orderId' )
        ->join( 'product', 'product.id', '=', 'order_details.productId' )
        ->join( 'customer', 'customer.id', '=', 'orders.customerId' )
        ->join( 'transaction_type', 'transaction_type.id', '=', 'orders.transactionId' )
        ->select( 'orders.orderNumber', 'customer.firstName', 'customer.lastName', 'product.name', 'order_details.price', 'order_details.qty' )
        ->where('transaction_type.id', '=', 3)
        ->get();

        if ( $orders->count() > 0 ) {
            return response()->json( [
                'status'=> 200,
                'data'=> $orders
            ], 200 );
        } else {
            return response()->json( [
                'status'=> 200,
                'message'=> 'No data',
                'data'=> []
            ], 200 );
        }
    }
}
