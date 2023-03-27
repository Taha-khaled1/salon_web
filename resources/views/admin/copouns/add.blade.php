@extends('layouts.app1')
@section('content')
    <div id="layoutSidenav_content">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <main>
            <div class="container-fluid px-4">
                <h1>اضافة كوبون</h1>


                <div class="card mb-4">

                    <div class="card-body" dir="rtl">


                        <form method="post" action="{{ route('storeCoupon') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="status" value="active">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    كود الكوبون
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="copoun_name">
                            </div>


                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                    قيمة الخصم بالنسبة المئوية
                                </label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="copoun_value">
                            </div>

                            {{-- <div class="form-group" style="margin-top: 20px">
                                    <label for="exampleInputEmail1">
                                       المدة
                                    </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="offer_period" >
                                </div> --}}

                            {{-- <div class="form-group">
                                    <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">
                                        حالة العرض</label>
                                    <input type="radio"   name="articles_isactive" value="active" required>
                                    <label >نشط</label><br>
                                    <input type="radio"    name="articles_isactive" value="inactive" required>
                                    <label >غير نشط</label><br>
                                </div> --}}

                            {{-- <div class="form-group">
                                    <label for="exampleInputEmail1"> صورة  </label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" required>
                                </div> --}}


                            <button type="submit" class="btn btn-success" style="margin-top: 10px;margin-bottom: 30px;">
                                اضافة </button>

                        </form>

                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection
