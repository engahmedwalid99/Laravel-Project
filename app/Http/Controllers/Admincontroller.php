<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\order;

use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    public function products(){
        return view('admin.product');
    }


    public function uploadproduct(Request $request){
        

        $data =new product;

        $image = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);
        $data->image=$imagename;
        
        

        $data->title = $request->product;
        $data->price = $request->price;
        $data->Description = $request->Description;
        $data->quantity = $request->quantity;

        $data->save();


        return redirect()->back()->with('message', 'product Added successfully');

        
    }
    
    public function showproduct(){

        $data = product::all();
        return view('admin.showproduct',compact('data'));
    }


//  use App\Models\Product;   // make sure this is at the top of your controller

public function deleteproduct($id)
{
    $data = Product::find($id);

    if ($data) {
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted');
    }

    return redirect()->back()->with('error', 'Product not found');
}


public function updateview($id){
    
    $data = product::find($id);
    return view('admin.updateview',compact('data'));
}


public  function updateproduct(Request  $request, $id){

    $data =product::find($id);

        $image = $request->file;
        if($image){
            
        
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);
        $data->image=$imagename;
        }
        

        $data->title = $request->product;
        $data->price = $request->price;
        $data->Description = $request->Description;
        $data->quantity = $request->quantity;

        $data->save();


        return redirect()->back()->with('message', 'product Updated successfully');

    
}



public function showorder(){
    $order=order::all();
    return view('admin.showorder',compact('order'));
}


public function updatestatus($id){
    $data=order::find($id);
    $data->status='delivered';
    $data->save();
    return redirect()->back();
}
}