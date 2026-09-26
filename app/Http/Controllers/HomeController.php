<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\user;

use App\models\product;

use App\models\order;

use App\Models\Cart;



class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
    
    if($usertype=='1'){
        return view('admin.home');
    }
    else{
        $data = product::paginate(3);
        $user=auth()->user();
        $count=cart::where('phone',$user->phone)->count();


        return view('user.home', compact('data', 'count'));    
    }
    
}

public function index(){

if(Auth::id())
{
    return redirect('redirect');
}
    else{

    $data = product::paginate(3);
    return view('user.home', compact('data'));    
    }
     
}

public function search(Request $request){
    
    $search= $request->search;
if($search == ''){
    
     $data = product::paginate(3);
    return view('user.home', compact('data')); 
    
}

    $data = product::where('title', 'like', '%' .$search. '%')->get();

    return view('user.home', compact('data'));

    
}

public function addcard(Request $request, $id){
    
if(Auth::id()){

    $product = product::find($id);

    $user = auth()->user();

    $cart = new cart;


    
    $cart->name=$user->name; 
    
    $cart->phone=$user->phone; 
    
    $cart->address=$user->address; 
    
    $cart->product_title=$product->title;
    
    $cart->price= $product->price;
    
    $cart->quantity = $request->quantity;

    $cart->save();
    
    return redirect()->back();
}else{
    return redirect('login'); 
}
    
}


public function showcart(){

$user=auth()->user();
$count=cart::where('phone',$user->phone)->count();
$cart=cart::where('phone',$user->phone)->get();
return view('user.showcart', compact('count', 'cart'));

}

public function remove($id){
    $data=cart::find($id);
    $data->delete();
    return redirect()->back()->with('message', 'Product Removed Successfully');


}


public function confirmorder(Request $request){
    $user=auth()->user();

    $name=$user->name;
    $phone=$user->phone;
    $address=$user->address;

    foreach($request->product_title as $key=>$product_title){

        $order = new order;

        $order->product_name=$request->product_title[$key];

        $order->price=$request->price[$key];

        $order->quantity=$request->quantity[$key];

        $order->name=$name;

        $order->phone=$phone;

        $order->address=$address;

        $order->status='not delivered';

        $order->save();

        // $cart_id= $request->cart_id[$key];

        // $cart=cart::find($cart_id);

        // $cart->delete();
}
DB::table('carts')->where('phone', $phone)->delete();
return redirect()->back()->with('message', 'Product orderded Successfully');

}
}