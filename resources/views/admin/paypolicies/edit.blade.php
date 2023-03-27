@extends('layouts.app1')
@section('content')
    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">سياسة الدفع</h1>
                {{-- <div class="card mb-4">

                </div> --}}
                {{-- <div class="card mb-4"> --}}
                    {{-- <div class="card-header" dir="rtl">


                    </div> --}}
                    <div class="card-body">

                        <div class="iframe-container" dir="rtl">

                            <form method="post" action="{{ route('editPayPolicies') }}" enctype="multipart/form-data"
                               >
                                @csrf


                                <div class="form-group" style="margin-top: 10px">
                                    <label for="exampleInputEmail1">سياسة الدفع بالعربية</label>
                                    <textarea type="LONGBLOB" class="form-control" rows="9" cols="50"
                                         name="setting_pay_policy_ar" style="margin-top: 10px;"><?php echo str_replace('<br />', ' ',$setting->setting_pay_policy_ar . "\n"); ?></textarea>
                                </div>

                                <div class="form-group" style="margin-top: 10px">
                                    <label for="exampleInputEmail1">سياسة الدفع بالانجليزية</label>
                                    <textarea type="LONGBLOB" class="form-control" rows="9" cols="50"
                                         name="setting_pay_policy_en" style="margin-top: 10px;"><?php echo str_replace('<br />', ' ',$setting->setting_pay_policy_en . "\n"); ?></textarea>
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
