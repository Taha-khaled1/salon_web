<?php

namespace App\Repositories;

use App\Contracts\DepartmentInterface;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DepartmentRepository implements DepartmentInterface
{
    //get departments to all department pages
    public function userDeps()
    {
        $userDeps = Department::where('department_isactive', 'active')->get();
        return $userDeps;
    }

    public function all()
    {
        return $departements = Department::all();
    }

    public function createDepartment(Request $request)
    {
        $departmentPic = $request->department_image;
        if ($departmentPic == null) {
            Department::create([
                'department_title_ar' => $request->department_title_ar,
                'department_title_en' => $request->department_title_en,
                'department_isbranch' => $request->depatment_isbranch,
                'department_isactive' => $request->depatment_isactive,
                'department_fatherid' => $request->department_fatherid,
                'categories'=>$request->categories
            ]);
        } else {
            $file_extension = $departmentPic->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'articles';
            $departmentPic->move($path, $file_name);
            Department::create([
                'department_title_ar' => $request->department_title_ar,
                'department_title_en' => $request->department_title_en,
                'department_isbranch' => $request->depatment_isbranch,
                'department_isactive' => $request->depatment_isactive,
                'department_image' => $file_name,
                'department_fatherid' => $request->department_fatherid,
                'categories'=>$request->categories
            ]);
        }
    }

    public function editDepartmentPage(int $id): Department
    {
        $dep = Department::find($id);

        return $dep;
    }

    public function updateDepartment(Request $request, $id)
    {
        $departmentPic = $request->department_image;
        if ($departmentPic == null) {
            $update = array();
            $update['department_title_ar'] = $request->department_title_ar;
            $update['department_title_en'] = $request->department_title_en;
            $update['department_isbranch'] = $request->depatment_isbranch;
            $update['department_isactive'] = $request->depatment_isactive;
            $update['department_fatherid'] = $request->department_fatherid;
            $update['categories']=$request->categories;
            Department::where('id', $id)->update(
                $update
            );
        } else {
            $file_extension = $departmentPic->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'articles';
            $departmentPic->move($path, $file_name);
            $update = array();
            $update['department_title_ar'] = $request->department_title_ar;
            $update['department_title_en'] = $request->department_title_en;
            $update['department_isbranch'] = $request->depatment_isbranch;
            $update['department_isactive'] = $request->depatment_isactive;
            $update['department_fatherid'] = $request->department_fatherid;
            $update['department_image'] = $file_name;
            $update['categories']=$request->categories;
            Department::where('id', $id)->update(
                $update
            );
        }
    }

    public function deleteDepartment($id)
    {
       //$department=Department::find($id)->articles()->delete();
       $articles=Department::find($id)->articles();
       foreach($articles as $article)
       {
        $img_destination = 'articles/' . $article->articles_image;
        if (File::exists($img_destination)) {
            // return 'done';
            File::delete($img_destination);
            // return 'done';
        }
       }
        $articles->delete();
        Department::find($id)->delete();
    }

    public function sortTable(string $sort) :Department
    {
        if($sort=='Arabic Title')
        {
          $departements=Department::orderBy('department_title_ar', 'DESC')->get();
        }
        elseif($sort=='English Title')
        {
          $departements=Department::orderBy('department_title_en', 'DESC')->get();
        }

        return $departements;
    }
}
