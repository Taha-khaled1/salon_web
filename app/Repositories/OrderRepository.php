<?php
namespace App\Repositories;

use App\Contracts\OrderInterface;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderRepository implements OrderInterface
{
    public function addOrder(Request $request)
    {
        $status='بانتظار الموافقة';
        $description=nl2br(htmlentities($request->service_details, ENT_QUOTES, 'UTF-8'));

        Order::create([
            'user_id'=>$request->user_id,
            'user_name'=>$request->user_name,
            'user_email'=>$request->user_email,
            'user_address'=>$request->user_address,
            'user_mobile'=>$request->user_mobile,
            'type'=>$request->type,
            'status'=>$status,
            'service_name'=>$request->service_name,
            'service_start_date'=>$request->service_start_date,
            'service_end_date'=>$request->service_end_date,
            'service_period'=>$request->service_period,
            'service_price'=>$request->service_price,
            'service_description'=>$description
        ]);
    }

    public function all()
    {
        $orders=Order::all();

        return $orders;
    }

    public function delete_order($id)
    {
        Order::find($id)->delete();
    }

    public function get_one_order($id)
    {
        $order=Order::find($id);
        return $order;
    }

    public function edit_order_method(Request $request)
    {
        $id=$request->id;
        $update=[];
        $update['user_name']=$request->user_name;
        $update['user_email']=$request->user_email;
        $update['user_mobile']=$request->user_mobile;
        $update['user_address']=$request->user_address;
        $update['type']=$request->type;
        $update['service_name']=$request->service_name;
        $update['service_price']=$request->service_price;
        $update['service_description']=$request->service_description;
        $update['service_period']=$request->service_period;
        $update['status']=$request->status;

        Order::where('id', $id)->update(
            $update
        );

    }

    public function getOffersAndServices()
    {
       return Order::where('type','!=','products')->get();
    }
}


