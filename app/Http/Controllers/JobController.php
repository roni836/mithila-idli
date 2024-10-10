<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobForm;
use Validator;


class JobController extends Controller
{
    public function jobAppliedIndex()
    {
        $data = JobForm::with("career")->orderBy('created_at', 'desc')->get();
        // dd($data);
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

    public function jobAppliedStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'father' => 'required|string',
            'mother' => 'required|string',
            'qualification' => 'required|string',
            'experience' => 'required|string',
            'skills' => 'required|string',
            'dob' => 'required|string',
            'religion' => 'required|string',
            'community' => 'required|string',
            'pincode' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'gender' => 'required|string',
            'mobile' => 'required|digits:10|regex:/^[0-9]{10}$/',
            'photo' => 'required|max:10240',
            'document' => 'required|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        // Handle the file upload
        if ($request->hasFile('photo')) {
            $photo = "IMG" . time() . "." . $request->photo->extension();
            $request->photo->move(public_path("career/candidate/photo"), $photo);
        } else {
            return response()->json([
                'status' => 422,
                'errors' => ['photo' => 'Photo is required.']
            ], 422);
        }

        if ($request->hasFile('document')) {
            $document = "DOC" . time() . "." . $request->document->extension();
            $request->document->move(public_path("career/candidate/document"), $document);
        } else {
            return response()->json([
                'status' => 422,
                'errors' => ['document' => 'Document is required.']
            ], 422);
        }

        // Create the blog post
        $data = JobForm::create([
            'name' => $request->name,         
            'mother' => $request->mother,         
            'father' => $request->father,         
            'dob' => $request->dob,         
            'gender' => $request->gender,         
            'religion' => $request->religion,         
            'community' => $request->community,         
            'mobile' => $request->mobile,         
            'email' => $request->email,         
            'experience' => $request->experience,         
            'skills' => $request->skills,         
            'area' => $request->area,         
            'city' => $request->city,         
            'state' => $request->state,         
            'pincode' => $request->pincode,         
            'career_id' => $request->career_id,         
            'qualification' => $request->qualification,         
            'photo' => $photo,
            'document' => $document,
            'status'=>0
        ]);

        if ($data) {
            return response()->json([
                'status' => 200,
                'message' => 'Successfully Applied'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Unable to add your Request"
            ], 500);
        }
    }

    public function show($id)
    {
        $data = JobForm::find($id);
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation for photo
            'document' => 'nullable|mimes:pdf,doc,docx|max:5120', // Document validation
        ]);

        // dd($request);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        }

        // Fetch the existing record
        $data = JobForm::find($id);
        if (!$data) {
            return response()->json([
                'status' => 500,
                'message' => "Not Found"
            ], 500);
        }

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = "IMG" .  time() . "." . $request->photo->extension();
            $request->photo->move(public_path("career/candidate/photo"), $photo);
        }else{
            $photo = $data->photo;
        }

        // Handle document upload
        if ($request->hasFile('document')) {
            $document = "DOC" . time() . "." . $request->document->extension();
            $request->document->move(public_path("career/candidate/document"), $document);
        }
        else{
            $document = $data->document;
        }

        // Update the data in the database
        $data->update([
            'name' => $request->name,
            'mother' => $request->mother,
            'father' => $request->father,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'community' => $request->community,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'area' => $request->area,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'career_id' => $request->career_id,
            'qualification' => $request->qualification,
            'photo' => $photo, // Updated or existing photo
            'document' => $document, // Updated or existing document
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 200,
            'message' => "Updated Successfully"
        ], 200);
    }

    public function destroy($id)
    {
        $data  = JobForm::find($id);
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
