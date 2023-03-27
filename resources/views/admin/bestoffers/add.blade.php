@extends('layouts.app1')
@section('content')

           <div id="layoutSidenav_content" >

            <main>
                <div class="container-fluid px-4">
                    <h1>اضافة  {{$dep->department_title_ar}}</h1>


                    <div class="card mb-4">

                        <div class="card-body" dir="rtl">


                            <form method="post" action="{{route('createSlider')}}"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="redirect" value="bestOffers">
                                <input type="hidden" name="flag" value="slider">
                                <input type="hidden" name="sliderId" value="{{$sliderId}}">
                                <input type="hidden" name="articles_isactive" value="active">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        العنوان بالعربية
                                    </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                         name="articles_title_ar">
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="exampleInputEmail1">
                                       العنوان بالانجليزية
                                    </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                         name="articles_title_en">
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                       محتوي المقال بالعربية
                                    </label>
                                    <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    rows="9"  cols="9" name="articles_subject_ar">
                                </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        محتوي المقال بالانجليزية
                                    </label>
                                    <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        rows="9"  cols="9" name="articles_subject_en">
                                </textarea>
                                </div>

                                <div class="form-group" style="margin-top: 20px">
                                    <label for="exampleInputEmail1">
                                       السعر
                                    </label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="price" >
                                </div>

                                <div class="form-group" style="margin-top: 20px">
                                    <label for="exampleInputEmail1">
                                       المدة
                                    </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="offer_period" >
                                </div>

                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">
                                        حالة العرض</label>
                                    <input type="radio"   name="articles_isactive" value="active" required>
                                    <label >نشط</label><br>
                                    <input type="radio"    name="articles_isactive" value="inactive" required>
                                    <label >غير نشط</label><br>
                                </div> --}}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{$dep->department_title_ar . 'صورة 1' }} </label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" required>
                                </div>


                                <button type="submit" class="btn btn-success" style="margin-top: 10px;margin-bottom: 30px;"> اضافة </button>

                               </form>

                        </div>
                    </div>
                </div>
            </main>

        </div>


 @endsection

