<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view("home.userpage", compact("products"));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == "1") {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();

            $order = Order::all();

            $total_revenue = 0;

            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delivery_status','=','delivered')->get()->count();
            $total_processing = Order::where('delivery_status','=','processing')->get()->count();

            return view("admin.home",compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        }
        else
        {
            $products = Product::paginate(6);
            return view("home.userpage", compact("products"));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);

            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;

            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            }else{
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $product->quantity;
            $cart->save();

            return redirect()->back()->with('message','Added Cart Successfully');
            
        }else{
            return redirect('login')->with(['bake' => 'back']);
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', $id)->get();
            return view('home.showcart', compact('cart'));
        }else{
            return redirect('login');
        }
        
    }

    public function remove_cart($id){
        Cart::where('id', $id)->delete();
        return redirect()->back()->with('message','Removed');
    }

    public function cash_order(){
        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id', $userid)->get();

        foreach ($data as $data) {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status ='Paid';
            $order->delivery_status ='processing';
            $order->save();

            $cart = Cart::find($data->id)->delete();

        }
        return redirect()->back()->with('message','We have Received your Order. We will connect with you soon...');
    }

    public function stripe($totalprice){
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order() {
        if (Auth::id() ) {
            $user =  Auth::user();
            $userid = $user->id;
            $order = Order::where('user_id','=', $userid)->get();

            return view('home.order',compact('order'));
        }else {
            return redirect('login');
        }
    }
    public function cancel_order($id) {
        $order = Order::find($id);
        $order->delivery_status = 'You canceled the order';
        $order->save();
        return redirect()->back()->with('message','');
    }
    public function product_search(Request $request) {
        $search_text = $request->search;
        $products = Product::where('title','LIKE','%$search_text%')
        ->orWhere('catagory','LIKE','%$search_text%')->paginate(9);
        return view('home.userpage', compact('products'));
    }


}
