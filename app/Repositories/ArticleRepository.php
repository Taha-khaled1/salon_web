<?php

namespace App\Repositories;

use App\Contracts\ArticlesInterface;
use App\Models\Article;
use App\Models\ArticleDay;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleRepository implements ArticlesInterface
{
    //get departments to all department pages
    public function userDeps()
    {
        $userDeps = Department::where('department_isactive', 'active')->get();
        return $userDeps;
    }

    public function parameters($id)
    {
        $dep = Department::find($id);
        $sliders = Article::where('departement_id', $dep->id)->get();
       // $userDeps = $this->userDeps();

        $parameters = [
         //   'userDeps' => $userDeps,
            'dep' => $dep,
            'sliders' => $sliders
        ];

        return $parameters;
    }

    public function addArticlePage($id)
    {
        return Department::find($id);
    }

    public function storeArticle(Request $request)
    {
        // dd($request->all());
        $ar = nl2br(htmlentities($request->articles_subject_ar, ENT_QUOTES, 'UTF-8'));
        $en = nl2br(htmlentities($request->articles_subject_en, ENT_QUOTES, 'UTF-8'));
        $flag = $request->flag;

        $dt = now();
        $date = $dt->format('Y,dS M,(D) ');
        $path = 'articles/';
        $count = 0;
        $x = array();
        //return $_FILES['articles_image']['name'][0];
        if ($_FILES['articles_image']['name'][0] || $_FILES['articles_image']['name'][1] || $_FILES['articles_image']['name'][2] || $_FILES['articles_image']['name'][3]) {
            // return 'done';
            foreach ($_FILES['articles_image']['name'] as $i => $name) {
                // now $name holds the original file name  time() . '.' . $course_pic->extension()
                $tmp_name = time() . $_FILES['articles_image']['name'][$i];

                if ($tmp_name == null) {
                    array_push($x, null);
                    continue;
                }
                if (move_uploaded_file($_FILES['articles_image']['tmp_name'][$i], $path . $tmp_name)) {
                    $count++;
                    array_push($x, $tmp_name);
                }
            }
        }

        array_keys($x);
        //return $x;
        array_key_exists(2, $x) ? $x[2] : null;
        $article = Article::create([
            'departement_id' => $request->sliderId,
            'articles_title_ar' => $request->articles_title_ar,
            'articles_title_en' => $request->articles_title_en,
            'articles_subject_ar' => $ar,
            'articles_subject_en' => $en,
            'articles_isactive' => $request->articles_isactive,
            'articles_image' => array_key_exists(0, $x) && $x[0] ? $x[0] : null,
            'articles_date' => $date,
            'articles_address_ar' => $request->articles_address_ar,
            'articles_address_en' => $request->articles_address_en,
            'articles_subject_ar2' => $request->articles_subject_ar2,
            'articles_subject_en2' => $request->articles_subject_en2,
            'price'=>$request->price,
            'offer_period'=>$request->offer_period,
            'articles_rate'=>'active',
            'start_at'=>$request->start_at,
            'end_at'=>$request->end_at,
        ]);
        $article->articles_image2 = array_key_exists(1, $x) && $x[1] ? $x[1] : null;
        $article->articles_image3 = array_key_exists(2, $x) && $x[2] ? $x[2] : null;
        $article->articles_image4 = array_key_exists(3, $x) && $x[3] ? $x[3] : null;
        $article->save();
        // ArticleDay
        foreach($request->day_details_ar as $index=>$single_day_details_ar){
            ArticleDay::create(['article_id'=>$article->id,'day_details_ar'=>$single_day_details_ar,'day_details_en'=>$request->day_details_en[$index]]);
        }
    }

    public function editArticlePage(int $sliderId)
    {
         $dep = Article::find($sliderId)->departement;
        $article = Article::find($sliderId);
        $parameters = [
            'dep' => $dep,
            'article' => $article
        ];

        return $parameters;
    }

    public function updateArticle(Request $request, $redirect='no')
    {
        $id = $request->sliderId;
        $count = 0;
        $path = 'articles/';
        $x = array();
        $ar = nl2br(htmlentities($request->articles_subject_ar, ENT_QUOTES, 'UTF-8'));
        $en = nl2br(htmlentities($request->articles_subject_en, ENT_QUOTES, 'UTF-8'));
        $ar2 = nl2br(htmlentities($request->articles_subject_ar2, ENT_QUOTES, 'UTF-8'));
        $en2 = nl2br(htmlentities($request->articles_subject_en2, ENT_QUOTES, 'UTF-8'));
        foreach ($_FILES['articles_image']['name'] as $i => $name) {
            // now $name holds the original file name
            $tmp_name = time() . $_FILES['articles_image']['name'][$i];
            if ($tmp_name == null) {
                array_push($x, null);
                continue;
            }

            if (move_uploaded_file($_FILES['articles_image']['tmp_name'][$i], $path . $tmp_name)) {
                array_push($x, $tmp_name);
                $count++;
            }
        }
        // return $x;
        $update = array();
        $update['articles_title_ar'] = $request->articles_title_ar;
        $update['articles_title_en'] = $request->articles_title_en;

        $update['articles_subject_ar'] = $ar;
        $update['articles_subject_en'] = $en;

        // $update['articles_isactive'] = $request->articles_isactive;
        $update['articles_address_ar'] = $request->articles_address_ar;
        $update['articles_address_en'] = $request->articles_address_en;
        $update['articles_subject_ar2'] = $ar2;
        $update['articles_subject_en2'] = $en2;
        $update['articles_keyword'] = $request->articles_keyword;
        $update['articles_desc'] = $request->articles_desc;
        $update['price']=$request->price;
        $update['offer_period']=$request->offer_period;
        $update['start_at']=$request->start_at;
        $update['end_at']=$request->end_at;

        Article::where('id', $id)->update(
            $update
        );
        if (count($x) > 0) {
            $article = Article::find($id);
            if (array_key_exists(0, $x) && $x[0]) {
                $article->articles_image = $x[0];
            }
            if (array_key_exists(1, $x) && $x[1]) {
                $article->articles_image2 = $x[1];
            }
            if (array_key_exists(2, $x) && $x[2]) {
                $article->articles_image3 = $x[2];
            }
            if (array_key_exists(3, $x) && $x[3]) {
                $article->articles_image4 = $x[3];
            }
            $article->save();
        }
        $article = Article::find($id);
        ArticleDay::where('article_id',$article->id)->truncate();
        foreach($request->day_details_ar as $index=>$single_day_details_ar){
            ArticleDay::create(['article_id'=>$article->id,'day_details_ar'=>$single_day_details_ar,'day_details_en'=>$request->day_details_en[$index]]);
        }
       // if($redirect=='back')
       // return redirect()->back();

    }

    public function deleteArticle(Request $request)
    {
        $id = $request->sliderId;
        $article = Article::find($id);
        //return $article;
        // $article->articles_image;
        $img_destination = 'articles/' . $article->articles_image;
        $img_destination2 = 'articles/' . $article->articles_image2;
        $img_destination3 = 'articles/' . $article->articles_image3;
        $img_destination4 = 'articles/' . $article->articles_image4;
        if (File::exists($img_destination)) {
            // return 'done';
            File::delete($img_destination);
            // return 'done';
        }
        if (File::exists($img_destination2)) {
            File::delete($img_destination2);
        }
        if (File::exists($img_destination3)) {
            File::delete($img_destination3);
        }
        if (File::exists($img_destination4)) {
            File::delete($img_destination4);
        }
        // return 'no';
        $article->delete();
    }

    public function searchArticles(Request $request)
    {
        $search_field = $request->search_field;
        $type = $request->type;
        $id = $request->id;
        $dep = Department::find($id);
        $sliders=Article::where($type,$search_field)->where('departement_id',$id)->get();

        $parameters = [
            'dep' => $dep,
            'sliders' => $sliders
        ];

        return $parameters;
    }


}
