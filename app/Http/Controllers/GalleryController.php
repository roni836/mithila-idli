<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use Validator;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::orderBy('created_at', 'desc')->get();
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',                   
            'link' => 'required',             
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = time() . "." . $request->image->extension();
            $request->image->move(public_path("gallery/image"), $image);
        } else {
            return response()->json([
                'status' => 422,
                'errors' => ['image' => 'Image is required.']
            ], 422);
        }

        // Create the blog post
        $gallery = Gallery::create([
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'image' => $image,
            'status' => 1,
            // 'date' => $request->date,
            'delete_reason' => $request->date,
        ]);

        if ($gallery) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Added Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Unable to add your Request"
            ], 500);
        }
    }

    
    public function update(Request $request, int $id)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'link' => 'required',
        ]);

        // If validation fails, return error messages
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        }

        // Find the gallery item by ID
        $gallery = Gallery::find($id);

        // Check if the gallery item exists
        if ($gallery) {
            // Retain old image if no new one is provided
            if ($request->hasFile('image')) {
                $image = time() . '.' . $request->image->extension();
                $request->image->move(public_path('gallery/image'), $image);
            } else {
                // Retain old image if no new one is provided
                $image = $gallery->image;
            }
            // dd($request->hasFile('image'));
            // Update the gallery item
            $gallery->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $image,
                // 'date' => $request->date,
                'delete_reason' => $request->delete_reason,
            ]);

            // Return success response
            return response()->json([
                'status' => 200,
                'message' => 'Data Updated Successfully',
            ], 200);
        } else {
            // Return error response if no gallery item is found
            return response()->json([
                'status' => 404,
                'message' => 'No Data Found',
            ], 404);
        }
    }


    public function show($id)
    {
        $data = Gallery::find($id);
        if($data){
            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => "No Data Found"
            ], 404);
        }
    }

    public function destroy($id)
    {
        $data  = Gallery::find($id);
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
