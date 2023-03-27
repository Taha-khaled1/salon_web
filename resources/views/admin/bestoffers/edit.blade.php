@extends('layouts.app1')
@section('content')


    <div id="layoutSidenav_content">
        {{-- @if (Auth::user()->rule_id == 1) --}}

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">تعديل {{ $dep->department_title_ar }}</h1>


                    <div class="card-body" dir="rtl">
                        <form method="post" action="{{ route('editSlider') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="redirect" value="bestOffers">
                            <input type="hidden" name="dep_id" value="{{ $dep_id }}">
                            <input type="hidden" name="sliderId" value="{{ $sliderId }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    {{ app()->getLocale() == 'ar' ? 'العنوان بالعربية' : 'Title Ar' }}
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="articles_title_ar"
                                    value="{{ $article->articles_title_ar }}">
                            </div>
                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                    {{ app()->getLocale() == 'ar' ? 'العنوان بالانجليزية' : 'Title En' }}
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="articles_title_en"
                                    value="{{ $article->articles_title_en }}">
                            </div>

                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                    {{ app()->getLocale() == 'ar' ? 'المحتوي بالعربية' : 'Subject ar' }}</label>
                                <textarea type="LONGBLOB" id="arabic" onchange="change()" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"style="" name="articles_subject_ar" rows="9" cols="900"><?php echo str_replace('<br />', ' ', $article->articles_subject_ar . "\n"); ?></textarea>

                            </div>
                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                    {{ app()->getLocale() == 'ar' ? 'المحتوي بالانجليزية' : 'Subject en' }}</label>
                                <textarea type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"style="" name="articles_subject_en" rows="9" cols="900"> <?php echo str_replace('<br />', ' ', $article->articles_subject_en . "\n"); ?>  </textarea>
                            </div>

                            {{-- @if ($article->articles_isactive=='active')
                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    style="margin-top: 10px;display: block;font-size: x-large">
                                    الحالة
                                </label>
                                <input type="radio" name="articles_isactive" value="active" checked="checked">
                                <label>
                                    نشط
                                </label><br>
                                <input type="radio" name="articles_isactive" value="inactive">
                                <label> غير نشط
                                </label><br>
                            </div>

                            @else

                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    style="margin-top: 10px;display: block;font-size: x-large">
                                    الحالة
                                </label>
                                <input type="radio" name="articles_isactive" value="active" >
                                <label>
                                    نشط
                                </label><br>
                                <input type="radio" name="articles_isactive" value="inactive" checked="checked">
                                <label> غير نشط
                                </label><br>
                            </div>

                            @endif --}}



                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                   السعر
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="price"
                                    value="{{ $article->price }}">
                            </div>

                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                  مدة الاشتراك بالشهور
                                </label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="offer_period"
                                    value="{{ $article->offer_period }}">
                            </div>


                            @if ($article->articles_image)
                                <div id="pic" class="form-group" style="margin-top: 10px;">
                                    <img src="{{ asset('articles/' . $article->articles_image) }}" alt=""
                                        style="height: 150px;">
                                    <button onclick="newPic(event)" class="btn btn-danger"
                                        style="margin-top: 113px;font-size: small;">
                                        {{ app()->getLocale() == 'ar' ? 'حذف' : 'delete' }} </button>
                                </div>
                            @endif

                            <div id="newPic" style="display: none">
                                <div class="form-group" style="margin-top: 10px">
                                    <label
                                        for="exampleInputEmail1">{{ app()->getLocale() == 'ar' ? $dep->department_title_ar : $dep->department_title_en }}
                                        {{ app()->getLocale() == 'ar' ? ' الصورة 1' : 'picture 1' }}</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1"
                                        name="articles_image[]">
                                </div>


                            </div>

                            <button type="submit" class="btn btn-warning" style="margin-top:35px">
                                {{ app()->getLocale() == 'ar' ? 'تعديل' : 'edit' }} </button>
                        </form>



                    </div>



                </div>
            </div>
    </div>
    </main>

    </div>

    <script>
        function newPic(event) {
            event.preventDefault();
            document.getElementById("pic").style.display = 'none';
            document.getElementById("newPic").style.display = 'block';
        }

        function setHeight(textarea) {
            //document.getElementById('arabic').style.height = document.getElementById('arabic').scrollHeight + 'px';
            textarea.style.height=textarea.scrollHeight + 'px';
        }
        //setHeight();
        var textarea=document.getElementsByTagName("textarea");
        //console.log(textarea);
        for(var i=0;i<textarea.length;i++)
        {
            //console.log(textarea[i]);
            selectedTextArea=textarea[i];
            setHeight(selectedTextArea);
        }
    </script>
@endsection

