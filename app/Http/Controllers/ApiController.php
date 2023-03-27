<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Order;
use App\Models\User;


class ApiController extends Controller
{
    public function getSelectedProducts($id)
    {
       // return $id;
        $selected_products=Department::find($id)->articles->where('articles_rate','active')->toArray();

        return $selected_products;
    }

    public function details($id)
    {
        $orders=Order::find($id);
        $orders['service_description']=str_replace('<br />', ' ', $orders['service_description'] . "\n");

        return $orders;
    }
}
