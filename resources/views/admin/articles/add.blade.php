@extends('layouts.app1')
@section('content')

           {{-- <h1> {{ App::getLocale()=='ar' ? 'اضافة '.$dep->department_title_ar : 'create '.$dep->department_title_en }} </h1>
           <form method="post" action="{{route('createSlider')}}"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="flag" value="slider">
            <input type="hidden" name="sliderId" value="{{$sliderId}}">
            <div class="form-group">
                <label for="exampleInputEmail1">
                    {{App::getLocale()=='ar' ? 'العنوان بالعربية' : 'Title Ar'}}
                </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_title_ar">
            </div>
            <div class="form-group" style="margin-top: 10px">
                <label for="exampleInputEmail1">
                    {{App::getLocale()=='ar' ? 'العنوان بالانجليزية' : 'Title En'}}
                </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_title_en">
            </div>
            <div class="form-group" style="margin-top: 10px">
                <label for="exampleInputEmail1">
                    {{App::getLocale()=='ar' ? 'عنوان المحتوي باللغة العربية' : 'subject title ar'}} </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_address_ar">
            </div>
            <div class="form-group" style="margin-top: 10px">
                <label for="exampleInputEmail1">
                   {{App::getLocale()=='ar' ? 'عنوان المحتوي باللغة الانجليزية' : 'subject title en'}} </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_address_en">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">
                    {{ App::getLocale()=='ar' ? 'المحتوي بالعربية' : 'Subject Ar'}}
                </label>
                <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    style="height: 100px;" name="articles_subject_ar">
            </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    {{App::getLocale()=='ar' ? 'المحتوي بالانجليزية' : 'Subject En'}}
                </label>
                <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    style="height: 100px;" name="articles_subject_en">
            </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{App::getLocale()=='ar' ? '2المحتوي بالعربية' : 'Subject Ar 2'}} </label>
                <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    style="height: 100px;" name="articles_subject_ar2">
            </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{App::getLocale()=='ar' ?'2المحتوي بالانجليزية' : 'Subject En 2'}} </label>
                <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    style="height: 100px;" name="articles_subject_en2">
            </textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">
                    {{App::getLocale()=='ar' ? 'نشط ام لا' : 'active or not'}}</label>
                <input type="radio"   name="articles_isactive" value="active" required>
                <label >{{App::getLocale()=='ar' ? 'نعم' : 'yes'}} </label><br>
                <input type="radio"    name="articles_isactive" value="inactive" required>
                <label >{{App::getLocale()=='ar' ? 'لا' : 'no'}}</label><br>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{App::getLocale()=='ar' ? $dep->department_title_ar. ' صورة 1' : $dep->department_title_en.'picture 1' }}  </label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{App::getLocale()=='ar' ? $dep->department_title_ar.' صورة 2' : $dep->department_title_en.'picture 2' }}</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{App::getLocale()=='ar' ? $dep->department_title_ar.' صورة 3' : $dep->department_title_en.'picture 3' }}</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{App::getLocale()=='ar' ? $dep->department_title_ar.' صورة 4' : $dep->department_title_en.'picture 4' }}</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
            </div>

            <button type="submit" class="btn btn-success" style="margin-top: 10px;margin-bottom: 30px;">{{App::getLocale()=='ar' ? 'اضافة' : 'add'}}</button>

           </form> --}}

           <div id="layoutSidenav_content" >

            <main>
                <div class="container-fluid px-4">
                    <h1>اضافة  {{$dep->department_title_ar}}</h1>

                    <ol class="breadcrumb mb-4">
                        {{-- <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">add {{$dep->department_title_en}}</li> --}}
                    </ol>
                    {{-- <div class="card mb-4">

                    </div> --}}
                    <div class="card mb-4">
                        {{-- <div class="card-header">


                        </div> --}}
                        <div class="card-body" dir="rtl">


                            <form method="post" action="{{route('createSlider')}}"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="flag" value="slider">
                                <input type="hidden" name="sliderId" value="{{$sliderId}}">
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
                                       المحتوي بالعربية
                                    </label>
                                    <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                         name="articles_subject_ar" rows="4" cols="50">
                                </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        المحتوي بالانجليزية
                                    </label>
                                    <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        style="height: 100px;" name="articles_subject_en" rows="4" cols="50">
                                </textarea>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">
                                        نشط ام لا</label>
                                    <input type="radio"   name="articles_isactive" value="active" required>
                                    <label >نعم </label><br>
                                    <input type="radio"    name="articles_isactive" value="inactive" required>
                                    <label >لا</label><br>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{$dep->department_title_ar. 'صورة 1' }} </label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
                                </div>

                                <button type="submit" class="btn btn-success" style="margin-top: 10px;margin-bottom: 30px;"> اضافة </button>

                               </form>

                        </div>
                    </div>
                </div>
            </main>

        </div>


 @endsection

