<?php

namespace App\Http\Controllers;
use App\Mail\BookedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $user = Order::where('isDelivered',1)->orderBy('created_at', 'desc')->get();
        if ($user->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => "No Records found"
            ], 404);
        }
    }

    public function pendingOrder()
    {
        $user = Order::where('isDelivered',0)->orWhere('isDelivered',2)->orWhere('isDelivered',3)->orderBy('created_at', 'desc')->get();
        if ($user->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => "No Records found"
            ], 404);
        }
    }


    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',                   
            'mobile' => 'required|digits:10|regex:/^[6789][0-9]{9}$/',
            'confirm_mobile' => 'required|same:mobile|digits:10|regex:/^[6789][0-9]{9}$/',
            'pincode' => 'required|digits:6',
            'address' => 'required|string',
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required',
            'quantity' => 'required|integer|min:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        // Fetch the last order's ID and increment it
        $lastOrder = Order::latest()->first();
        $newOrderId = $lastOrder ? $lastOrder->id + 1 : 1; // If no orders exist, start with 1

        // Generate a unique token for the order
        $token = Str::random(32);

        // Create the order
        $order = Order::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'alt_mobile' => $request->alt_mobile,
            'booking_date' => $request->booking_date,
            'pincode' => $request->pincode,
            'price' => $request->price,
            'address' => $request->address,
            'event_type' => $request->event_type,                                                                     
            'booking_time' => $request->booking_time,
            'isDelivered' => 0,
            'status' => 0,
            'quantity' => $request->quantity,
            'order_id' => 'ORD' . str_pad($newOrderId, 5, '0', STR_PAD_LEFT), // Custom order ID format
            'token' => $token, // Store the unique token
        ]);

        if ($order) {
            Mail::to('mithilaidli@gmail.com')->send(new BookedMail($order));

            return response()->json([
                'order_id' => $order->order_id,
                'token' => $token, // Return token for confirmation
                'message' => 'Order Booked Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Unable to add your Request"
            ], 500);
        }
    }

    public function showConfirmOrder(Request $request, $token)
    {
        // Fetch the order using the token
        $order = Order::where('token', $token)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Order details
        $orderDetails = [
            'order_id' => $order->order_id,
            'name' => $order->name,
            'mobile' => $order->mobile,
            'address' => $order->address,
            'pincode' => $order->pincode,
            'quantity' => $order->quantity,
            'amount' => $order->quantity * 20,
            'upi_id' => 'Q113668258@ybl',
        ];

        return view('home.confirm', compact('orderDetails'));
    }
    
    public function confirmOrder(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        $order = Order::where('order_id', $request->order_id)->first();

        if ($order) {
            // Access token directly if it's a field in the orders table
            $token = $order->token;
    
            // Update payment method and set isConfirmed to 1
            $order->payment_method = $request->payment_method;
            $order->isConfirmed = 1; // Set isConfirmed to 1
            $order->save();
    
            return response()->json(['status' => 200, 'token' => $token, 'message' => 'Order confirmed.']);
        }

        return response()->json(['status' => 404, 'message' => 'Order not found.'], 404);
    } 

    public function show($id)
    {
        $user = Order::find($id);
        if($user){
            return response()->json([
                'status' => 200,
                'data' => $user
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => "No call Found"
            ], 404);
        }
    }

    public function viewOrder($id)
    {
        $user = Order::find($id);
        return view('admin.viewOrder',compact('user'));
    }

    public function orderShow($id)
    {
        $data = Order::find($id);
        if($data){
            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => "Not Found"
            ], 404);
        }
    }
        
    public function orderUpdate(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',            
        ]);

        // dd($request);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $data = Order::find($id);
            if ($data) {
                $data->update([
                    'name' => $request->name,                                       
                    'mobile' => $request->mobile,
                    'alt_mobile' => $request->alt_mobile,
                    'address'=>$request->address,                                       
                    'quantity'=>$request->quantity, 
                    'booking_date' => $request->booking_date,
                    'booking_time'=>$request->booking_time,                                       
                    'pincode'=>$request->pincode,     
                    'event_type' => $request->event_type,                                                                     
                    'booking_date'=>$request->booking_date,                                                       
                    'delivered_by'=>$request->delivered_by,                                                       
                    'isDelivered'=>$request->isDelivered,                                                       
                    'price'=>$request->price,                                                       
                    'payment'=>$request->payment,                                                       
                    'status'=>$request->status,                                                       
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Updated Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Not Found"
                ], 500);
            }
        }
    }

    public function orderDestroy($id)
    {
        $data  = Order::find($id);
        // dd($data);
        if($data){
            $data->delete();
            return response()->json([
                'status' => 200,
                'message' => "Deleted Successfully"
            ], 200);
        }
        else{
            return response()->json([
                'status' => 500,
                'message' => "Not Found"
            ], 500);
        }       
    }
}
