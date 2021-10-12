<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrand(){
        $brands = Brand::latest()->paginate(10);
        return view('admin.brand.brands',compact('brands'));
    }
    public function StoreBrand(Request $request){
        $validateData=$request->validate([
            'brand_name'=>'required|unique:brands|max:255',
            'brand_image'=>'required|mimes:jpg.jpeg,png',
        ],[
            'brand_name.required'=>'Please write Brand Name',
            'brand_name.min'=>'Maximum value of the input section exceeded',
            'brand_image.required'=> 'Please select an image for the Brand',
            'brand_image.mimes'=>'This file is not uploadable.The brand image must be a file of type: jpg,jpeg,png',
        ]);
        $brand_image = $request->file('brand_image');
        //$name_gen = hexdec(uniqid());
        //$img_ext =strtolower($brand_image->getClientOriginalExtension());
        //$img_name = $name_gen.'.'.$img_ext;
        //$up_location ='image/brand/';
        //$last_img = $up_location.$img_name;
        //$brand_image->move($up_location,$img_name);
        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
        $last_img = 'image/brand/'.$name_gen;
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image'=> $last_img,
            'created_at' => Carbon :: now()
        ]);
        return Redirect()->back()->with('success','Brand Inserted Successfully');
    }
    public function Edit($id){
        $brands=Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }
    public function Update(Request $request,$id){
        $validateData=$request->validate([
            'brand_name'=>'required|max:255',
        ],[
            'brand_name.required'=>'Please write Brand Name',
            'brand_name.min'=>'Maximum value of the input section exceeded',
            'brand_image.required'=> 'Please select an image for the Brand',
            'brand_image.mimes'=>'This file is not uploadable.The brand image must be a file of type: jpg,jpeg,png',
        ]);
        $old_image= $request->old_image;
        $brand_image = $request->file('brand_image');
        if($brand_image){
         //$name_gen = hexdec(uniqid());
        //$img_ext =strtolower($brand_image->getClientOriginalExtension());
        //$img_name = $name_gen.'.'.$img_ext;
        //$up_location ='image/brand/';
        //$last_img = $up_location.$img_name;
        //$brand_image->move($up_location,$img_name);

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
        $last_img = 'image/brand/'.$name_gen;

        unlink($old_image);
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image'=> $last_img,
            'created_at' => Carbon :: now()
        ]);
        return Redirect()->back()->with('success','Brand Updated Successfully');
        }else{
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon :: now()
            ]);
            return Redirect()->back()->with('success','Brand Updated Successfully');
        }
    }
    public function Delete($id){
        $image = Brand::find($id);
        $temp_img = $image->brand_image;
        unlink($temp_img);

        Brand::find($id)->delete();
        return Redirect()->back()->with('danger','Brand Deleted Successfully');
    }

    //Multi Image input function
    public function MultiImages(){
        $multi_images = MultiImage::all();
        return view('admin.multi_images.multi_images',compact('multi_images'));
    }
    public function StoreMultiImage(Request $request){
        $image = $request->file('multi_image');
        foreach($image as $multi_images){
        $name_gen = hexdec(uniqid()).'.'.$multi_images->getClientOriginalExtension();
        Image::make($multi_images)->resize(300,200)->save('image/multi_image/'.$name_gen);
        $last_img = 'image/multi_image/'.$name_gen;
        MultiImage::insert([
            'image'=> $last_img,
            'created_at' => Carbon :: now()
        ]);
    }
        return Redirect()->back()->with('success','Images Inserted Successfully');
    }

    //User Log in logout
    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success','Successfully log out.Thank you for visiting');
    }
}
