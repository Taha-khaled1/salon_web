<?php

namespace App\Contracts;
use Illuminate\Http\Request;

interface UserInterface{

    public function editName(Request $request);
    public function editNameAndEmail(Request $request);
    public function changePassword(Request $request);
}


