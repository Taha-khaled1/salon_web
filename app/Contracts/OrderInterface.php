<?php

namespace App\Contracts;
use Illuminate\Http\Request;

interface OrderInterface
{

    public function addOrder(Request $request);
    public function all();
    public function getOffersAndServices();
    public function delete_order($id);
    public function get_one_order($id);
    public function edit_order_method(Request $request);


}
