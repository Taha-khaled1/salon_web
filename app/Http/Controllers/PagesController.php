<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\OrderInterface;
use App\Models\Article;
use App\Models\Department;
use App\Models\Setting;
use App\Models\ContactUs;
use App\Models\CartOrder;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    public $order;

    function __construct(OrderInterface $order)
    {
       $this->order=$order;
    }

    public function get_cart_items()
    {
        if(Auth::user())
        {
          $wordlist = CartOrder::where('user_id', '=',Auth::user()->id )->get();
          $count = $wordlist->count();
        }
        else
        {
            $count=0;
        }
        return $count;
    }

    public function Settings()
    {
        $setting=Setting::find(1);
        return $setting;
    }

    public function policies($term)
    {
        $setting=$this->Settings();
       if($term=='terms')
       {
        $term_en='Terms and Conditions';
        $term_ar='الشروط والاحكام';
           $privacy_ar=$setting->setting_terms_ar;
           $privacy_en=$setting->setting_terms_en;
       }
       elseif($term=='privacy')
       {
        $term_en='Privacy Policy';
        $term_ar='سياسة الخصوصية';
        $privacy_ar=$setting->setting_pay_policy_ar;
        $privacy_en=$setting->setting_pay_policy_en;
       }
       elseif($term=='payment')
       {
        $term_en='Payment Privacies';
        $term_ar='سياسة الدفع';
        $privacy_ar=$setting->setting_payback_policy_ar;
        $privacy_en=$setting->setting_payback_policy_en;

       }
       $count=$this->get_cart_items();

       return view('terms',compact('setting','term_en','term_ar','privacy_ar','privacy_en','count'));
    }

    public function ourProducts()
    {
        $setting=$this->Settings();
        $bestSellerProducts=Department::find(7)->articles->where('articles_isactive','active');
        $products=Department::find(7)->articles;
        $count=$this->get_cart_items();

        return view('products',compact('setting','bestSellerProducts','products','count'));
    }

    public function contactUs()
    {
        $setting=$this->Settings();
          //count orders
          $count=$this->get_cart_items();


        return view('contactus',compact('setting','count'));
    }

    public function contactUsForm(Request $request)
    {
       //return $request;
       $message = nl2br(htmlentities($request->message, ENT_QUOTES, 'UTF-8'));

       ContactUs::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'type'=>$request->type,
            'message'=>$message,
            'status'=>'نشط',
       ]);

       return redirect()->back()->with('success','success');
    }

    public function servicies()
    {
        $setting=$this->Settings();
        $categories=Department::where('categories','active')->get();
        $selected_category=$categories->first();
        $id=$selected_category->id;
        $selected_products=Department::find($id)->articles;
       // $this->selected_products=$selected_products;
       $count=$this->get_cart_items();
        return view('servicies',compact('setting','categories','selected_products','count'));
    }

    public function offers()
    {
        $setting=$this->Settings();
        $currentOffers=Department::find(3)->articles;
        $packages=Department::find(10)->articles;
        $suggestedPackages=Department::find(10)->articles->where('articles_isactive','active');
        $count=$this->get_cart_items();

        return view('offers',compact('setting','currentOffers','packages','suggestedPackages','count'));
    }

    //booking service page
    public function bookServicePage($id,$type)
    {
        //return $type;
        $setting=$this->Settings();
        $service=Article::find($id);
        $count=$this->get_cart_items();

        return view('booking.service',compact('setting','service','type','count'));
    }

    public function bookServiceForm(Request $request)
    {
       // return $request;
        $this->order->addOrder($request);
        if($request->type=='service')
        {
            return redirect()->route('servicies')->with('success','success');
        }
        elseif($request->type=='offer')
        {
            return redirect()->route('offers')->with('success','success');
        }

    }

    public function changeSelectedProducts($id)
    {
        $slider=Department::find(1)->articles->where('articles_isactive','active');
        $aboutus=Department::find(2)->articles;
        $bestOffersTitle=Department::find(3);
        $bestOffers=Department::find(3)->articles->where('articles_isactive','active');
        $setting=Setting::find(1);
      //  return $bestOffers->without('articles')->get();

      $categories=Department::where('categories','active')->get();
      //$selected_category=$categories->first();
     // $id=$selected_category->id;
     $selected_category_id=$id;
      $selected_products=Department::find($selected_category_id)->articles->where('articles_rate','active')->toArray();
      $categories=Department::where('categories','active')->get()->toArray();
      $count=$this->get_cart_items();

        return View('welcome',[
        "slider"=>$slider,
        "aboutus"=>$aboutus,
        "bestOffers"=>$bestOffers,
        "bestOffersTitle"=>$bestOffersTitle,
        "categories"=>$categories,
        "selected_category_id"=>$selected_category_id,
        "selected_products"=>$selected_products,
        'count'=>$count,
        "setting"=>$setting
        ]);


    }

    public function ShowProduct($id)
    {
        $item=Article::findorfail($id);
        $setting=$this->Settings();
        $count=$this->get_cart_items();
        $products=Department::find(7)->articles;
        return view('show-product',compact('item','setting','count','products'));
    }
}
