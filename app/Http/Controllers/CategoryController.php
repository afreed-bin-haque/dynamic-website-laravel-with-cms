<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllCatagory(){
        $categories=Catagory::latest()->paginate(4);
        $trachcart=Catagory::onlyTrashed()->latest()->paginate(2);
        return view('admin.category.categories',compact('categories','trachcart'));
    }
    public function StoreCategory(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:catagories|max:255',
        ],
        [
            'category_name.required' => 'Please write Categrory Name',
            'category_name.max' => 'Maximum value of the input section exceeded',
        ]);
        Catagory :: insert([
            'category_name' => $request ->category_name,
            'user_id' => Auth :: user() -> id,
            'created_at' => Carbon :: now()
        ]);
        return Redirect()->back()->with('success','Category Added Successfully');
    }
    public function Edit($id){
        $categories=DB::table('catagories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));
    }
    public function Update(Request $request, $id){
        $data = array();
        $update_time=Carbon::now()->toDateTimeString();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth :: user()->id;
        $data['updated_at'] = $request-> $update_time;
        DB :: table('catagories')->where('id',$id)->update($data);
        return Redirect()->route('all.category')->with('success','Category has been successfully Updated');
    }
    public function SoftDelete($id){
        $delete=Catagory::find($id)->delete();
        return Redirect()->back()->with('success','Moved to the trash cane');
    }
    public function Restore($id){
        $restore=Catagory::withTrashed()->find($id)->restore();
        return Redirect()->route('all.category')->with('success','Category restored successfully');
    }
    public function Delete($id){
        $permanent_delete=Catagory::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->route('all.category')->with('danger','Category permanently deleted');
    }
}
