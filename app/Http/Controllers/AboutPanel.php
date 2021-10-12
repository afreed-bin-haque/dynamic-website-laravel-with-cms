<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutSection;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class AboutPanel extends Controller
{
    public function About_panel(){
        $home_about_panel=AboutSection::latest()->get();
        return view('admin.home_about_panel.home_about',compact('home_about_panel'));
    }
    public function AddAbout(){
        return view('admin.home_about_panel.add');
    }
    public function StoreAbout(Request $request){
        $validateData=$request->validate([
            'question_title'=>'required|max:255',
            'title'=>'required|max:255',
            'description'=>'required|max:255',
        ],[
            'question_title.required'=>'Please write About Question',
            'title.required'=>'Please write About Title',
            'description.min'=>'Maximum value of the input section exceeded',
            'image.required'=> 'Please select an image for the Brand',
            'image.mimes'=>'This file is not uploadable.The brand image must be a file of type: jpg,jpeg,png',
        ]);
        $about_image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$about_image->getClientOriginalExtension();
        Image::make($about_image)->resize(800,600)->save('image/about/'.$name_gen);
        $last_img = 'image/about/'.$name_gen;
        AboutSection::insert([
            'question_title'=> $request->question_title,
            'title'=> $request->title,
            'description'=> $request->description,
            'image'=> $last_img,
            'created_at' => Carbon :: now()
        ]);
        return Redirect()->back()->with('success','About Created Successfully');
    }
    public function EditAboutSection($id){
        $about_old=AboutSection::find($id);
        return view('admin.home_about_panel.edit',compact('about_old'));
    }
    public function UpdateAboutSection(Request $request,$id){
        $validateData=$request->validate([
            'question_title'=>'required|max:255',
            'title'=>'required|max:255',
            'description'=>'required|max:255',
        ],[
            'question_title.required'=>'Please write About Question',
            'title.required'=>'Please write About Title',
            'description.min'=>'Maximum value of the input section exceeded',
            'image.required'=> 'Please select an image for the Brand',
            'image.mimes'=>'This file is not uploadable.The brand image must be a file of type: jpg,jpeg,png',
        ]);
        $old_image= $request->old_image;
        $about_image = $request->file('image');
        if($about_image){
        $name_gen = hexdec(uniqid()).'.'.$about_image->getClientOriginalExtension();
        Image::make($about_image)->resize(800,600)->save('image/about/'.$name_gen);
        $last_img = 'image/about/'.$name_gen;

        unlink($old_image);
        AboutSection::find($id)->update([
            'question_title'=> $request->question_title,
            'title'=> $request->title,
            'description'=> $request->description,
            'image'=> $last_img,
            'created_at' => Carbon :: now()
        ]);
        return Redirect()->back()->with('success','About Updated Successfully');
        }else{
            AboutSection::find($id)->update([
                'question_title'=> $request->question_title,
                'title'=> $request->title,
                'description'=> $request->description,
                'created_at' => Carbon :: now()
            ]);
            return Redirect()->back()->with('success','About Updated Successfully');
        }
    }
    public function DeleteSection($id){
        $image = AboutSection::find($id);
        $temp_img = $image->image;
        unlink($temp_img);

        AboutSection::find($id)->delete();
        return Redirect()->back()->with('danger','About data Deleted Successfully');
    }
    public function ViewMore(){
        return view('about');
    }
    public function ViewAboutInner(){
        return view('admin.inner_about.about');
    }
}
