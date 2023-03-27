<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use App\Models\CartOrder;
//added
use Exception;
use App\Contracts\UserInterface;
use Illuminate\Support\Facades\Auth;
// use Excel;
// use App\Exports\AppointmentExport;
// use App\Exports\AppointmentExportEN;
// use PDF;
use DB;
use App\Models\Article;

class UserController extends Controller
{
    public $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function Settings()
    {
        $setting=Setting::find(1);
        return $setting;
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

    public function editUser(Request $request)
    {
        //email not changed
        if (Auth::user()->email == $request->email) {

            $this->user->editName($request);
            return redirect()->back()->with('edit', 'edit');
        }
        //edit name and email
        else
        {
             $result=$this->user->editNameAndEmail($request);

             if($result==true)
             return redirect()->back()->with('edit', 'edit');

             else
             return redirect()->back()->with('fail', 'fail');

        }
    }

    public function editPassword(Request $request)
    {
       $result=$this->user->changePassword($request);

       if($result=='success')
       {
          return redirect()->back()->with('edit', 'edit');
       }
       elseif($result=='confirm')
       {
          return redirect()->back()->with('confirm', 'confirm');
       }
       else
       {
          return redirect()->back()->with('error', 'error');
       }
    }

    public function manageOrders()
    {
        $id=Auth::user()->id;
        $setting = $this->Settings();
        $orders=User::find($id)->orders;
        $count=$this->get_cart_items();
        $my_offeries_name=DB::table('orders')->where('user_id',Auth::user()->id)->pluck('service_name')->toArray();
        $my_offeries=Article::with('days')->whereIn('articles_title_en',$my_offeries_name)->get();
        return view('user.manageOrders',compact('setting','orders','count','my_offeries'));
    }

    public function manageProductsOrders()
    {
        $setting = $this->Settings();
        $count=$this->get_cart_items();

        $cartOrders=CartOrder::where('user_id',Auth::user()->id)->get();
        $my_offeries_name=DB::table('orders')->where('user_id',Auth::user()->id)->pluck('service_name')->toArray();
        $my_offeries=Article::with('days')->whereIn('articles_title_en',$my_offeries_name)->get();
        return view('user.manageProductsOrders',compact('setting','count','cartOrders','my_offeries'));
    }
    public function getfullcalender()
    {
        $setting = $this->Settings();
        $count=$this->get_cart_items();

        $cartOrders=CartOrder::where('user_id',Auth::user()->id)->get();
        $my_offeries_name=DB::table('orders')->where('user_id',Auth::user()->id)->pluck('service_name')->toArray();
        $my_offeries=Article::with('days')->whereIn('articles_title_en',$my_offeries_name)->get();
        return view('user.getfullcalender',compact('setting','count','cartOrders','my_offeries'));
    }

}
