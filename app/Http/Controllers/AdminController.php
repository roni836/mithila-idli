<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JobForm;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function manageOrder(){
        return view('admin.manageOrder');
    }

    public function managePendingOrder(){
        return view('admin.managePendingOrder');
    }

    public function insertOrder(){
        return view('admin.insertOrder');
    }

    public function manageFranchise(){
        return view('admin.manageFranchise');
    }

    public function insertFranchise(){
        return view('admin.insertFranchise');
    }

    public function manageEvent(){
        return view('admin.manageEvent');
    }

    public function insertEvent(){
        return view('admin.insertEvent');
    }

    public function manageGallery(){
        return view('admin.manageGallery');
    }

    public function insertGallery(){
        return view('admin.insertGallery');
    }

    public function manageBlog(){
        return view('admin.manageBlog');
    }

    public function insertBlog(){
        return view('admin.insertBlog');
    }

    public function manageCareer(){
        return view('admin.manageCareer');
    }

    public function insertCareer(){
        return view('admin.insertCareer');
    }

    public function manageJobForm(){
        return view('admin.manageJobForm');
    }

    public function insertJobForm(){
        return view('admin.insertJobForm');
    }

    public function viewJobForm($id){
        $data = JobForm::where('id', $id)->first();
        return view('admin.viewJobForm',compact('data'));
    }

    public function viewRating(){
        return view('admin.viewRating');
    }

   
    
}
