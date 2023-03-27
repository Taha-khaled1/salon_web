<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Cart;
use App\Models\Article;
use App\Models\CartOrder;
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
    public function Settings()
    {
        $setting=Setting::find(1);
        return $setting;
    }

    public function cartPage()
    {
        $setting=$this->Settings();
        $user_id = Auth::user()->id;
        $newItems=Cart::where('user_id',$user_id)->get();
        $total=0;
        $count=0;

        foreach($newItems as $item)
        {

           $product= Article::find($item['product_id']);
           $product_name_ar=$product['articles_title_ar'];
           $product_name_en=$product['articles_title_en'];
           $product_price=$product['price'];
           $item['product_name_ar']=$product_name_ar;
           $item['product_name_en']=$product_name_en;

           $item['product_price']=$product_price;
           $total+=$item['qty'] * $item['price'];
           $count++;

        }

         $items=$newItems;

//          $item['qty']
// $item['price']


        return view('cart.items',compact('setting','items','total','count'));
    }

    public function addToCart($product_id)
    {
       $product=Article::find($product_id);
       $product_image=$product->articles_image;
       $price=$product->price;
       $user_id = Auth::user()->id;

       $cart=Cart::where([
        ['user_id',$user_id],
        ['product_id',$product_id]

        ])->get();

          //$cart;

       if($cart->isNotEmpty())
       {
           $quantity=$cart[0]->qty;
           $cart_id=$cart[0]->id;
           ++$quantity;

           $update['qty']=$quantity;
           $update['price']=$quantity * $price;
           Cart::where('id', $cart_id)->update(
               $update
           );
       }
       else{
        Cart::create([
            'user_id'=>$user_id,
            'product_id'=>$product_id,
            'qty'=>1,
            'price'=>$price,
            'image' => $product_image
           ]);
       }

       return redirect()->back()->with('success','success');

    }

    public function deleteFromCard(Request $request)
    {
        $id=$request->id;
        Cart::find($id)->delete();
        return redirect()->back();
    }

    public function buyCard(Request $request)
    {
        $user_id = Auth::user()->id;
        $newItems=Cart::where('user_id',$user_id)->get();
        $total=0;

        foreach($newItems as $item)
        {

           $product= Article::find($item['product_id']);
           $product_name_ar=$product['articles_title_ar'];
           $product_name_en=$product['articles_title_en'];
           $product_price=$product['price'];
           $item['product_name_ar']=$product_name_ar;
           $item['product_name_en']=$product_name_en;

           $item['product_price']=$product_price;
           $total=$item['qty'] * $item['price'];
           $status='ب انتظار التوصيل';

           CartOrder::create([
            'user_id' =>$user_id,
            'user_name' =>Auth::user()->name,
            'user_email' =>Auth::user()->email,
            'user_address'=>Auth::user()->address,
            'user_mobile'=>Auth::user()->mobile,
            'product_name'=>$product_name_ar,
            'quantity'=>$item['qty'],
            'price'=>$item['price'],
            'total'=>$total,
            'status'=>$status
           ]);


        }

        //create cart order
        return redirect()->back()->with('success','success');
    }
}
