<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Mail\EventMail;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function eventIndex()
    {
        $event = Event::orderBy('created_at', 'desc')->get();
        if ($event->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $event
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => "No Records found"
            ], 404);
        }
    }

    public function eventBooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',                   
            'mobile' => 'required|digits:10|regex:/^[6789][0-9]{9}$/',
            'confirm_mobile' => 'required|same:mobile|digits:10|regex:/^[6789][0-9]{9}$/',
            'address' => 'required|string', 
            'pincode' => 'required|digits:6',                   
            'address' => 'required|string',                   
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required',
            'quantity' => 'required|integer|min:50',                  
            'event_type' => 'required|string',
        ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }
        else {    
            $event = Event::create([
                'name' => $request->name,                                       
                'mobile' => $request->mobile,
                'alt_mobile' => $request->alt_mobile,
                'address'=>$request->address,                                       
                'quantity'=>$request->quantity, 
                'booking_date' => $request->booking_date,
                'booking_time'=>$request->booking_time,                                       
                'pincode'=>$request->pincode,                                       
                'isDelivered'=>0,                                       
                'status'=>0,                                       
                'event_type'=>$request->event_type,                                      
                'booking_date'=>$request->booking_date,                                      
            ]);
    
            if ($event) {
                Mail::to('ronitsaha836@gmail.com')->send(new EventMail($event));

                return response()->json([
                    'status' => 200,
                    'message' => 'We Will Connect You Soon'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Unable to add your Request"
                ], 500);
            }
        }
    }

    public function eventShow($id)
    {
        $data = Event::find($id);
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
        
    public function eventUpdate(Request $request, int $id)
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
            $data = Event::find($id);
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
                    // 'event_type'=>$request->event_type,                                      
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

    public function eventDestroy($id)
    {
        $data  = Event::find($id);
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

//     public function restore($id)
//     {
//         $data = YojnaCategory::onlyTrashed()->findOrFail($id);
//         $data->restore();

//         return response()->json([
//             'success' => true,
//             'message' => 'Data restored successfully'
//         ]);
//     }

//     public function trash()
//     {
//          $data = YojnaCategory::onlyTrashed()->get();
//          return response()->json([
//              'success' => true,
//              'data' => $data
//          ]);
//     }

//     public function forceDelete($id)
//     {
//         $data = YojnaCategory::onlyTrashed()->findOrFail($id);
//         $data->forceDelete();

//         return response()->json([
//             'success' => true,
//             'message' => 'Data permanently deleted'
//         ]); 
//    }
}