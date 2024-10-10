<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\JobForm;
use Validator;

class CareerController extends Controller
{

    public function careerIndex()
    {
        $data = Career::orderBy('created_at', 'desc')->get();
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

    public function careerStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'company' => 'required|string',
            'profile' => 'required|string',
            'no_of_post' => 'required',
            'mobile' => 'required|digits:10|regex:/^[0-9]{10}$/',                   
            'city' => 'required|string',
            'state' => 'required|string',
            'job_type' => 'required|string',
            'language' => 'required|string',
            'qualification' => 'required|string',
            'min_salary' => 'required|string',
            'max_salary' => 'required|string',
            'min_experience' => 'required|string',
            'max_experience' => 'required|string',
            'opening_date' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|max:10240',
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
            $request->image->move(public_path("career/image"), $image);
        } else {
            return response()->json([
                'status' => 422,
                'errors' => ['image' => 'Image is required.']
            ], 422);
        }

        // Create the blog post
        $data = Career::create([
            'title' => $request->title,
            'company' => $request->company,
            'profile' => $request->profile,
            'no_of_post' => $request->no_of_post,
            'city' => $request->city,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'state' => $request->state,
            'job_type' => $request->job_type,
            'language' => $request->language,
            'qualification' => $request->qualification,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'min_experience' => $request->min_experience,
            'max_experience' => $request->max_experience,
            'opening_date' => $request->opening_date,
            'website' => $request->website,
            'description' => $request->description,            
            'image' => $image
        ]);

        if ($data) {
            return response()->json([
                'status' => 200,
                'message' => 'Job Detail Added Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Unable to add your Request"
            ], 500);
        }
    }

  

    public function careerShow($id)
    {
        $data = Career::find($id);
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
        
    public function careerUpdate(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3',            
        ]);

        // dd($request);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $data = Career::find($id);
            if ($data) {
                $data->update([
                    'title' => $request->title,                                       
                    'company' => $request->company,                                       
                    'profile' => $request->profile,                                       
                    'mobile' => $request->mobile,                                       
                    'email' => $request->email,                                       
                    'no_of_post' => $request->no_of_post,                                       
                    'city' => $request->city,                                       
                    'state' => $request->state,                                       
                    'job_type' => $request->job_type,                                       
                    'language' => $request->language,                                       
                    'qualification' => $request->qualification,                                       
                    'min_salary' => $request->min_salary,                                       
                    'max_salary' => $request->max_salary,                                       
                    'min_experience' => $request->min_experience,                                       
                    'max_experience' => $request->max_experience,                                       
                    'opening_date' => $request->opening_date,                                       
                    'website' => $request->website,                                       
                    'description' => $request->description,     
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

    public function careerDestroy($id)
    {
        $data  = Career::find($id);
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
            $photo = time() . "." . $request->photo->extension();
            $request->photo->move(public_path("career/candidate/photo"), $photo);
        } else {
            return response()->json([
                'status' => 422,
                'errors' => ['photo' => 'Photo is required.']
            ], 422);
        }

        if ($request->hasFile('document')) {
            $document = time() . "." . $request->document->extension();
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
    
}
