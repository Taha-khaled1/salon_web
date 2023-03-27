<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Department;
use App\Models\Setting;
use App\Contracts\DepartmentInterface;

class DepartmentController extends Controller
{

    public $department;

    function __construct(DepartmentInterface $department)
    {

        $this->department=$department;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $departements=$this->department->all();
         $userDeps=$this->department->userDeps();

        return view('admin.departmentlist',compact('departements','userDeps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $userDeps=Department::where('department_isactive','active')->get();
       $userDeps=$this->department->userDeps();
       return view('admin.createdepartment',compact('userDeps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->department->createDepartment($request);

       if($request->redirect)  return redirect()->route('Categories');

       return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dep=$this->department->editDepartmentPage($id);
        $userDeps=$this->department->userDeps();

        return view('admin.editdepartment',compact('userDeps','dep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->department->updateDepartment($request, $id);

        if($request->redirect)  return redirect()->route('Categories');
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->department->deleteDepartment($id);
        return redirect()->route('department.index');
    }

    public function Sort(Request $request)
    {
          $sort= $request->search;
          $departements=$this->department->sortTable($sort);
          $userDeps=$this->department->userDeps();

          return view('admin.departmentlist',compact('departements','userDeps'));
    }
    public function confirmDeleteDepartment($id)
    {
        return redirect()->back()->with('delete_confirm', $id);
    }
}

