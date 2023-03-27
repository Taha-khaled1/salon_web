<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Department;
use App\Models\Setting;
use App\Models\Copoun;
use Illuminate\Support\Facades\File;


use Excel;
use App\Exports\UsersExport;
use PDF;
//use I18N_Arabic_Glyphs;
use App\Http\Controllers\Controller;
//use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Contracts\ArticlesInterface;
use App\Contracts\OrderInterface;
use App\Models\ContactUs;
use App\Models\CartOrder;
use App\Models\Order;

class ArticleController extends Controller
{
    //to make the view
    public $blade;
    public $parameters;

    public $article;
    public $order;

    public function __construct(ArticlesInterface $article , OrderInterface $order)
    {
        $this->article = $article;
        $this->order=$order;
    }

    public function settings()
    {
        $userDeps = $this->article->userDeps();
        $setting = Setting::findOrNew(1);
        $setting->save();

        $parameters=[
            "userDeps"=>$userDeps,
            "setting"=>$setting
        ];

        return $parameters;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->blade = 'admin.articles.all';
        $this->parameters = $this->article->parameters($id);

        $blade = $this->blade;
        return view($this->blade, $this->parameters);
    }

    public function welcome()
    {
             $slider=Department::find(1)->articles->where('articles_isactive','active');
        $aboutus=Department::find(2)->articles;
        $bestOffersTitle=Department::find(3);
        $bestOffers=Department::find(3)->articles->where('articles_isactive','active');
        $setting=Setting::find(1);
      //  return $bestOffers->without('articles')->get();

      $categories=Department::where('categories','active')->get();
      $selected_category=$categories->first();
      $selected_category_id=$selected_category->id;
      $selected_products=Department::find($selected_category_id)->articles->where('articles_rate','active')->toArray();
      $categories=Department::where('categories','active')->get()->toArray();

      //count orders
      if(Auth::user())
      {
        $wordlist = CartOrder::where('user_id', '=',Auth::user()->id )->get();
        $count = $wordlist->count();
      }
      else
      {
          $count=0;
      }


        return View('welcome',[
        "slider"=>$slider,
        "aboutus"=>$aboutus,
        "bestOffers"=>$bestOffers,
        "bestOffersTitle"=>$bestOffersTitle,
        "categories"=>$categories,
        "selected_category_id"=>$selected_category_id,
        "selected_products"=>$selected_products,
        "count"=>$count,
        "setting"=>$setting
        ]);
    }


    public function addSliderPage($id)
    {
        $type_id = $id;
        $userDeps = $this->article->userDeps();
        $dep = $this->article->addArticlePage($type_id);
        $sliderId = $id;

        return view('admin.articles.add', compact('userDeps', 'sliderId', 'dep'));
    }
    public function createSlider(Request $request)
    {
        $departmentId = $request->sliderId;
        $this->article->storeArticle($request);
        if($request->redirect)
        {
            return redirect()->route($request->redirect, $departmentId);
        }

        return redirect()->route('article.show', $departmentId);
    }
    // public function Sort(Request $request)
    // {
    //     $sort = $request->search;
    //     if ($sort == 'Arabic Title') {
    //         $departements = Department::orderBy('department_title_ar', 'DESC')->get();
    //     } elseif ($sort == 'English Title') {
    //         $departements = Department::orderBy('department_title_en', 'DESC')->get();
    //     }
    //     $userDeps = $this->userDeps();
    //     return view('admin.departmentlist', compact('departements', 'userDeps'));
    // }
    public function editSliderPage($id, $depArticle_id)
    {

        $dep_id = $depArticle_id;
        $sliderId = $id;
        $dep = Article::find($sliderId)->departement;
        $userDeps = $this->article->userDeps();
        $parameters = $this->article->editArticlePage($sliderId);

        return view('admin.articles.edit', compact('sliderId', 'userDeps', 'dep_id','dep'), $parameters);
    }
    public function editSlider(Request $request)
    {
        // return $request;
        $dep_id = $request->dep_id;
        $this->article->updateArticle($request);

        if($request->redirect)
        {
            return redirect()->route($request->redirect, $dep_id);
        }
        return redirect()->route('article.show', $dep_id);
      // return redirect()->back();
    }

    public function deleteSlider(Request $request)
    {
        $this->article->deleteArticle($request);
        return redirect()->back();
    }
    public function sortArticle(Request $request)
    {
        $sort = $request->search;
        $id = $request->id;
        $sortColum = '';
        $sort == 'Title Ar' || $sort == 'العنوان بالعربية' ? $sortColum = 'articles_title_ar' : '';
        // return $sortColum;
        $sort == 'Title En' || $sort == 'العنوان بالانجليزية' ? $sortColum = 'articles_title_en' : '';
        $sort == 'Subject Ar' || $sort == 'المحتوي بالعربية' ? $sortColum = 'articles_subject_ar' : '';
        $sort == 'Subject EN' || $sort == 'المحتوي بالانجليزية' ? $sortColum = 'articles_subject_en' : '';
        $sort == 'is active' || $sort == 'نشط ام لا' ? $sortColum = 'articles_isactive' : '';
        $sliders = Article::orderBy($sortColum, 'DESC')->where('departement_id', $id)->paginate();
        // $sliders=Article::where('departement_id',$dep->id)->paginate();
        $dep = Department::find($id);
        $userDeps = $this->userDeps();
        return view('admin.articles.all', compact('dep', 'userDeps', 'sliders'));
    }

    public function searchArticles(Request $request)
    {

        $userDeps = $this->article->userDeps();
        $parameters=$this->article->searchArticles($request);
        return view('admin.articles.all', compact( 'userDeps'),$parameters);
    }

    public function export($dep_id)
    {
        return Excel::download(new UsersExport($dep_id), 'users.csv');
    }
    public function downloadPdf($dep_id)
    {
        $sliders = Article::select('articles_title_ar', 'articles_title_en', 'articles_subject_ar', 'articles_subject_en', 'articles_isactive', 'price')->where('departement_id', $dep_id)->get();
        $dep = Department::find($dep_id);
        $pdf = PDF::loadView('pdf.articlepdf', [
            'title' => 'Certificate',
            'format' => 'A4-P',
            'orientation' => 'P'
        ], compact('sliders', 'dep'));
        return $pdf->download('report.pdf');
    }

    public function settingWebsite()
    {
        $userDeps = $this->article->userDeps();
        $setting = Setting::findOrNew(1);
        $setting->save();
        return view('admin.setting.edit', compact('setting', 'userDeps'));
    }
    public function editSetting(Request $request)
    {
        //return $request;
        $setting_worktime_ar = nl2br(htmlentities($request->setting_worktime_ar, ENT_QUOTES, 'UTF-8'));
        $setting_worktime_en = nl2br(htmlentities($request->setting_worktime_en, ENT_QUOTES, 'UTF-8'));

        $update = array();
        $update['setting_title_ar'] = $request->setting_title_ar;
        $update['setting_title_en'] = $request->setting_title_en;
        $update['setting_site_email'] = $request->setting_site_email;
        $update['setting_keywords'] = $request->setting_keywords;
        $update['setting_description'] = $request->setting_description;
        $update['setting_site_address_ar'] = $request->setting_site_address_ar;
        $update['setting_site_address_en'] = $request->setting_site_address_en;
        $update['setting_googlemap'] = $request->setting_googlemap;
        $update['setting_facebookurl'] = $request->setting_facebookurl;
        $update['setting_twitterurl'] = $request->setting_twitterurl;
        $update['setting_googleplusurl'] = $request->setting_googleplusurl;
        $update['setting_instgramurl'] = $request->setting_instgramurl;
        $update['setting_snapchaturl'] = $request->setting_snapchaturl;
        $update['setting_linkedinurl'] = $request->setting_linkedinurl;
        $update['setting_youtubeurl'] = $request->setting_youtubeurl;
        $update['setting_whatsappurl'] = $request->setting_whatsappurl;
        $update['setting_sitetell1'] = $request->setting_sitetell1;
        $update['setting_worktime_ar']=$setting_worktime_ar;
        $update['setting_worktime_en']=$setting_worktime_en;

        Setting::where('id', 1)->update(
            $update
        );
        return redirect()->back();
    }

    public function terms()
    {
        $parameters=$this->settings();
       // return 'done';
       return view('admin.terms.edit',$parameters);
    }

    public function editTerms(Request $request)
    {
        $update = array();
        $ar = nl2br(htmlentities($request->setting_terms_ar, ENT_QUOTES, 'UTF-8'));
        $en = nl2br(htmlentities($request->setting_terms_en, ENT_QUOTES, 'UTF-8'));
        $update['setting_terms_ar'] = $ar;
        $update['setting_terms_en'] = $en;
        Setting::where('id', 1)->update(
            $update
        );

        return redirect()->back();
    }

    public function payPolicies()
    {
        $parameters=$this->settings();
       // return 'done';
       return view('admin.payPolicies.edit',$parameters);
    }

    public function editPayPolicies(Request $request)
    {
        $update = array();
        $ar = nl2br(htmlentities($request->setting_pay_policy_ar, ENT_QUOTES, 'UTF-8'));
        $en = nl2br(htmlentities($request->setting_pay_policy_en, ENT_QUOTES, 'UTF-8'));

        $update['setting_pay_policy_ar'] = $ar ;
        $update['setting_pay_policy_en'] = $en;
        Setting::where('id', 1)->update(
            $update
        );

        return redirect()->back();
    }

    public function payBackPolicies()
    {
        $parameters=$this->settings();
        // return 'done';
        return view('admin.paybackpolicies.edit',$parameters);
    }

    public function editPayBackPolicies(Request $request)
    {
        $update = array();
        $ar = nl2br(htmlentities($request->setting_payback_policy_ar, ENT_QUOTES, 'UTF-8'));
        $en = nl2br(htmlentities($request->setting_payback_policy_en, ENT_QUOTES, 'UTF-8'));

        $update['setting_payback_policy_ar'] = $ar ;
        $update['setting_payback_policy_en'] =$en ;
        Setting::where('id', 1)->update(
            $update
        );

        return redirect()->back();

    }

    public function aboutUsPage($id)
    {

        $this->blade = 'admin.aboutus.edit';
        $dep_id = $id;
       // $this->parameters = $this->article->parameters($id);
        $this->parameters=$this->article->editArticlePage(4);
        $this->parameters['dep_id']=$dep_id;
        $this->parameters['sliderId']=4;

       // $article = Article::find(4);

        $blade = $this->blade;
        return view($this->blade,$this->parameters);
    }

    public function editFixedArticles(Request $request)
    {
        // return $request;
        $dep_id = $request->dep_id;
        $this->article->updateArticle($request);
       // return redirect()->route('article.show', $dep_id);
       return redirect()->back();
    }

    public function bestOffers($id)
    {
        $this->parameters = $this->article->parameters($id);

        return view('admin.bestoffers.all', $this->parameters);
    }

    public function addBestOffersPage($id)
    {
        $type_id = $id;
        $userDeps = $this->article->userDeps();
        $dep = $this->article->addArticlePage($type_id);
        $sliderId = $id;

        return view('admin.bestoffers.add', compact('userDeps', 'sliderId', 'dep'));
    }

    public function editBestOffersPage($id, $depArticle_id)
    {
        $dep_id = $depArticle_id;
        $sliderId = $id;
        $userDeps = $this->article->userDeps();
        $parameters = $this->article->editArticlePage($sliderId);

        return view('admin.bestoffers.edit', compact('sliderId', 'userDeps', 'dep_id'), $parameters);
    }

    //subscribtios
    public function subscribtions($id)
    {
        $this->parameters = $this->article->parameters($id);

        return view('admin.subscribes.all', $this->parameters);
    }

    public function addSubscribtionPage($id)
    {
        $type_id = $id;
        $userDeps = $this->article->userDeps();
        $dep = $this->article->addArticlePage($type_id);
        $sliderId = $id;

        return view('admin.subscribes.add', compact('userDeps', 'sliderId', 'dep'));
    }

    public function editSubscribtionPage($id,$depArticle_id)
    {
        $dep_id = $depArticle_id;
        $sliderId = $id;
        $userDeps = $this->article->userDeps();
        $parameters = $this->article->editArticlePage($sliderId);

        return view('admin.subscribes.edit', compact('sliderId', 'userDeps', 'dep_id'), $parameters);
    }

    //products
    public function products($id)
    {
        $this->parameters = $this->article->parameters($id);

        return view('admin.products.all', $this->parameters);
    }

    public function addproductsPage($id)
    {
        $type_id = $id;
        $userDeps = $this->article->userDeps();
        $dep = $this->article->addArticlePage($type_id);
        $sliderId = $id;
        if($dep->categories)
        {
           $page='categoryServicies';
        }
        else
        {
            $page='products';
        }

        return view('admin.products.add', compact('userDeps', 'sliderId', 'dep','page'));
    }

    public function editproductsPage($id, $depArticle_id)
    {
        $dep_id = $depArticle_id;
        $sliderId = $id;
        $dep = Article::find($sliderId)->departement;
        $userDeps = $this->article->userDeps();
        $parameters = $this->article->editArticlePage($sliderId);
       // return $parameters;
        if($dep->categories)
        {
           $page='categoryServicies';
        }
        else
        {
            $page='products';
        }


        return view('admin.products.edit', compact('sliderId', 'userDeps', 'dep_id','page','dep'), $parameters);
    }

    public function contactUsRequests()
    {
        $contactUsRequests=ContactUs::all();
        $sliders=$contactUsRequests;
        return view('admin.contactus.all', compact('sliders'));
    }

    public function showContactUsInfo($id)
    {
        $contact=ContactUs::find($id);
       return view('admin.contactus.edit', compact('contact'));
    }

    public function editContactUsInfo(Request $request)
    {
        //return $request;
        $id=$request->id;
        $update = array();
        $ar = nl2br(htmlentities($request->message, ENT_QUOTES, 'UTF-8'));
        $update['name'] = $request->name;
        $update['email'] = $request->email;
        $update['message'] = $ar;
        $update['phone'] = $request->phone;
        $update['status'] = $request->status;


        ContactUs::where('id', $id)->update(
            $update
        );

        //return redirect()->back();
        return redirect()->route('contactUsRequests');
    }

    public function deleteContactUsInfo(Request $request)
    {
        $id=$request->id;
        ContactUs::find($id)->delete();
        return redirect()->back();
    }

    public function Categories()
    {
        $categories=Department::where('categories','active')->get();
        $departements=$categories;

        return view('admin.categories.all', compact('departements'));
    }

    public function addCategories()
    {
        return view('admin.categories.add');
    }

    public function editCategories($id)
    {
        $dep=Department::find($id);

        return view('admin.categories.edit', compact('dep'));
    }

    //delete category with articles
    public function deleteCategory($id)
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

            return redirect()->back();
    }

    //servicies for one category
    public function categoryServicies($id)
    {
       // return $id;
       $sliders=Department::find($id)->articles;
       $dep=Department::find($id);
        return view('admin.servicies.all',compact('sliders','dep'));
    }

    public function toggleLatestAdded($id)
    {
         $service=Article::find($id);
         $flag=0;
         if(!$service->articles_rate)
         {
            //return 'done';
           // $service->articles_rate='active';
           $flag=1;
         }
         //return $service->articles_rate;

        if($service->articles_rate=='active' )
        {
             $service->articles_rate='inactive';
        }

        else $service->articles_rate='active';

         $service->save();

        return redirect()->back();
    }

    public function isActiveToggle($id)
    {
        $article=Article::find($id);
        if($article->articles_isactive=='active' )
        {
             $article->articles_isactive='inactive';
        }

        else $article->articles_isactive='active';

         $article->save();

        return redirect()->back();
    }

    //Coupons
    public function allCoupons()
    {
        $sliders = Copoun::all();

        return view('admin.copouns.all', compact('sliders'));
    }

    public function addCopounPage()
    {

        return view('admin.copouns.add');
    }

    public function storeCoupon(Request $request)
    {
        //return $request;
        try {
            Copoun::create([
                'copoun_name'=>$request->copoun_name,
                'copoun_value'=>$request->copoun_value,
                'status'=>$request->status
            ]);

            return redirect()->route('allCoupons');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'هذا الكود مخزن بالفعل من فضلك ادخل كود جديد');
        }
    }

    public function deleteCoupon(Request $request)
    {
        $id=$request->id;
        Copoun::find($id)->delete();
        return redirect()->back();
    }

    //orders routes
    public function allOrders()
    {
        $orders=$this->order->getOffersAndServices();
        $sliders=$orders;

        return view('admin.orders.all',compact('sliders'));
    }

    public function searchOrder(Request $request)
    {
        $search_field = $request->search_field;
        $type = $request->search_type;
        if($type=='all')
        {
            $productOrders=Order::all();
        }
        else
        {
            $productOrders=Order::where($type,$search_field)->get();
        }

        $sliders=$productOrders;

        return view('admin.orders.all',compact('sliders'));
    }

    public function deleteOrder($id)
    {
        $this->order->delete_order($id);
        return redirect()->back();
    }

    public function editOrderPage($id)
    {
        $order=$this->order->get_one_order($id);
        $contact=$order;
        return view('admin.orders.edit',compact('contact'));
    }


    public function editOrderForm(Request $request)
    {
        $this->order->edit_order_method($request);
        return redirect()->back();
    }

    //all product orders
    public function allProductOrders()
    {
        $productOrders=CartOrder::all();
        $sliders=$productOrders;

        return view('admin.ProductOrders.all',compact('sliders'));
    }

    public function editProductOrderPage($id)
    {
        $contact=CartOrder::find($id);
        return view('admin.productOrders.edit',compact('contact'));
    }

    public function editProductOrderForm(Request $request)
    {
       // return $request;
        $id=$request->id;
        $update=[];
        $update['user_name']=$request->user_name;
        $update['user_email']=$request->user_email;
        $update['user_mobile']=$request->user_mobile;
        $update['user_address']=$request->user_address;
        $update['product_name']=$request->product_name;
        $update['price']=$request->price;
        $update['quantity']=$request->quantity;
        $update['total']=$request->total;
        $update['status']=$request->status;

        CartOrder::where('id', $id)->update(
            $update
        );

        return redirect()->back();
    }

    public function searchProductOrder(Request $request)
    {

        $search_field = $request->search_field;
        $type = $request->search_type;
        if($type=='all')
        {
            $productOrders=CartOrder::all();
        }
        else
        {
            $productOrders=CartOrder::where($type,$search_field)->get();
        }

        $sliders=$productOrders;

        return view('admin.ProductOrders.all',compact('sliders'));
    }

    public function deleteProductOrder(Request $request)
    {
        $id=$request->id;
        CartOrder::find($id)->delete();

        return redirect()->back();
    }



}
