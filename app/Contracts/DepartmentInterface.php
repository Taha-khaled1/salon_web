<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface DepartmentInterface{

    public function  userDeps();

    public function all();

    public function sortTable(string $sort);

    public function createDepartment(Request $request);

    public function editDepartmentPage(int $id);

    public function updateDepartment(Request $request, $id);

    public function deleteDepartment($id);

}
