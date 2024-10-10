<?php

namespace App\Http\Controllers;
use App\Mail\FranchiseMail;
use App\Models\Franchise;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    public function franchiseIndex()
    {
        $data = Franchise::orderBy('created_at', 'desc')->get();
        if ($data->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => "No Records found"
            ], 404);
        }
    }

    public function franchiseStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',                   
            'mobile' => 'required|digits:10|regex:/^[0-9]{10}$/',                   
            'email' => 'required|email',                   
            'location' => 'required|string',                   
        ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            }
        else {    
            $data = Franchise::create([
                'name' => $request->name,                                       
                'mobile' => $request->mobile,
                'location'=>$request->location,                                       
                'email'=>$request->email,                                       
                'message'=>$request->message  
            ]);
    
            if ($data) {

                Mail::to('mithilaidli@gmail.com')->send(new FranchiseMail($data));

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

    public function show($id)
    {
        $data = Franchise::find($id);
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
        
    public function update(Request $request, int $id)
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
            $data = Franchise::find($id);
            if ($data) {
                $data->update([
                    'name' => $request->name,                                       
                    'mobile' => $request->mobile,
                    'location'=>$request->location,                                       
                    'email'=>$request->email,                                       
                    'message'=>$request->message,                                       
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

    public function destroy($id)
    {
        $data  = Franchise::find($id);
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
