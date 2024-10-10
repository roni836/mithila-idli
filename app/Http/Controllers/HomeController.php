<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Event;
use Validator;
class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function orderPage(){
        return view('home.orderNow');
    }
   
    public function successOrder($token){
        $data = Order::where('token', $token)->first();
        return view('home.success-page',compact('data'));
    }

    public function career(){
        return view('home.career');
    }
    
    public function appliedCareer(){
        return view('home.appliedCareer');
    }

    public function blog(){
        return view('home.blog');
    }

    public function whyUs(){
        return view('home.whyUs');
    }

    public function brandStory(){
        return view('home.brandStory');
    }

    public function franchiseQuery(){
        return view('home.franchiseQuery');
    }

    public function bookEvent(){
        return view('home.bookEvent');
    }

    public function cartLocator(){
        return view('home.cartLocator');
    }
    public function trackNow(){
        return view('home.trackNow');
    }

    // public function trackOrder(Request $request)
    // {
    //     // Validate that the search input is provided
    //     $validator = Validator::make($request->all(), [
    //         'search_input' => 'required',
    //     ]);
    
    //     // If validation fails, return a JSON response with errors
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 422,
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }
    
    //     // Search for the order by order_id or mobile_no
    //     $order = Order::where('order_id', $request->search_input)->orWhere('mobile', $request->search_input)->get();
    //     $event = Event::where('mobile', $request->search_input)->get();

    
    //     // If the order is found, return it in the response
    //     if (!$order->isEmpty()) {
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Order found successfully.',
    //             'data' => $order,
    //         ], 200);
    //     }
    //     else{
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Order found successfully.',
    //             'data' => $event,
    //         ], 200);
    //     }
      
    //          // If the order is not found, return a 404 error response
    //     return response()->json([
    //         'status' => 404,
    //         'message' => 'Order not found.',
    //     ], 404);
        
    // }

    public function trackOrder(Request $request)
    {
        // Validate that the search input is provided
        $validator = Validator::make($request->all(), [
            'search_input' => 'required',
        ]);
    
        // If validation fails, return a JSON response with errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }
    
        // Search for the order by order_id or mobile_no
        $order = Order::where('order_id', $request->search_input)
                    ->orWhere('mobile', $request->search_input)
                    ->latest()
                    ->get();
    
        // If no orders are found
        if ($order->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No orders found.',
            ], 404);
        }
    
        // Return the found orders
        return response()->json([
            'status' => 200,
            'message' => 'Data found successfully.',
            'data' => $order,
        ], 200);
    }
    

}
