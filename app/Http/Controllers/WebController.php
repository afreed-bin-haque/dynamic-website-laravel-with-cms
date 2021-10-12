<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class WebController extends Controller
{
    public function ViewHeader(){
        $hero= HeroSection::latest()->get();
        return view('admin.hero_section.hero',compact('hero'));
    }
    public function AddHero(){
        return view('admin.hero_section.add');
    }
    public function StoreHero(Request $request){
        $validateData=$request->validate([
            'header_text'=>'required|max:255',
            'header_description'=>'required|max:255',
        ],[
            'header_text.required'=>'Please write Header Text',
            'header_description.min'=>'Maximum value of the input section exceeded',
            'header_image.required'=> 'Please select an image for the Brand',
            'header_image.mimes'=>'This file is not uploadable.The brand image must be a file of type: jpg,jpeg,png',
        ]);
        $hero_image = $request->file('header_image');
        $name_gen = hexdec(uniqid()).'.'.$hero_image->getClientOriginalExtension();
        Image::make($hero_image)->resize(1920,1080)->save('image/hero/'.$name_gen);
        $last_img = 'image/hero/'.$name_gen;
        HeroSection::insert([
            'header_text' => $request->header_text,
            'short_description' => $request->header_description,
            'image'=> $last_img,
            'created_at' => Carbon :: now()
        ]);
        return Redirect()->back()->with('success','Header Created Successfully');
    }
    public function EditHero($id){
        $hero=HeroSection::find($id);
        return view('admin.hero_section.edit',compact('hero'));
    }
    public function UpdateHero(Request $request,$id){
        $validateData=$request->validate([
            'header_text'=>'required|max:255',
            'header_description'=>'required|max:255',
        ],[
            'header_text.required'=>'Please write Brand Name',
            'header_text.min'=>'Maximum value of the input section exceeded',
            'header_description.required'=>'Please write Brand Name',
            'header_description.min'=>'Maximum value of the input section exceeded',
            'image.required'=> 'Please select an image for the Brand',
            'image.mimes'=>'This file is not uploadable.The brand image must be a file of type: jpg,jpeg,png',
        ]);
        $old_image= $request->old_image;
        $header_image = $request->file('image');
        if($header_image){
        $name_gen = hexdec(uniqid()).'.'.$header_image->getClientOriginalExtension();
        Image::make($header_image)->resize(1920,1080)->save('image/hero/'.$name_gen);
        $last_img = 'image/hero/'.$name_gen;

        unlink($old_image);
        HeroSection::find($id)->update([
            'header_text' => $request->header_text,
            'short_description' => $request->header_description,
            'image'=> $last_img,
            'created_at' => Carbon :: now()
        ]);
        return Redirect()->back()->with('success','Header Updated Successfully');
        }else{
            HeroSection::find($id)->update([
                'header_text' => $request->header_text,
                'short_description' => $request->header_description,
                'created_at' => Carbon :: now()
            ]);
            return Redirect()->back()->with('success','Header Updated Successfully');
        }
    }
    public function Delete($id){
        $image = HeroSection::find($id);
        $temp_img = $image->image;
        unlink($temp_img);

        HeroSection::find($id)->delete();
        return Redirect()->back()->with('danger','Hero data Deleted Successfully');
    }
}
