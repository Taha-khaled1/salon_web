@extends('layouts.app1')
@section('content')
    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">سياسة الاسترجاع</h1>

                {{-- <div class="card mb-4">

                </div> --}}
                {{-- <div class="card mb-4">
                    <div class="card-header" dir="rtl">

                    <h1></h1>
                    </div> --}}
                    <div class="card-body">

                        <div class="iframe-container" dir="rtl">

                            <form method="post" action="{{ route('editPayBackPolicies') }}" enctype="multipart/form-data"
                               >
                                @csrf


                                <div class="form-group" style="margin-top: 10px">
                                    <label for="exampleInputEmail1">سياسة الاسترجاع بالعربية</label>
                                    <textarea type="LONGBLOB" class="form-control" rows="9" cols="50"
                                         name="setting_payback_policy_ar" style="margin-top: 10px;"> <?php echo str_replace('<br />', ' ',$setting->setting_payback_policy_ar . "\n"); ?></textarea>
                                </div>

                                <div class="form-group" style="margin-top: 10px">
                                    <label for="exampleInputEmail1">سياسة الاسترجاع بالانجليزية</label>
                                    <textarea type="LONGBLOB" class="form-control" rows="9" cols="50"
                                         name="setting_payback_policy_en" style="margin-top: 10px;"> <?php echo str_replace('<br />', ' ',$setting->setting_payback_policy_en . "\n"); ?></textarea>
                                </div>




                                <button type="submit" class="btn btn-warning"
                                    style="margin-top: 10px;margin-bottom: 34px;">تعديل</button>

                            </form>



                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection
