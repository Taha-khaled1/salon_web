@extends('layouts.app1')
@section('content')

    <div id="layoutSidenav_content">

        <main>

            <div class="container-fluid px-4">
                <h1 class="mt-4">{{ $dep->department_title_ar }}</h1>



                <div class="card mb-4">
                    <div class="card-header">
                        <a class="btn btn-success" href="{{ route('addBestOffersPage', $dep->id) }}" > اضافة </a>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th >id</th>
                                    <th >
                                        العنوان بالعربية
                                    </th >
                                    <th> العنوان بالانجليزية
                                    </th>
                                    <th> عرض في الصفحة الرئيسية
                                    </th>
                                    <th>
                                        الصورة
                                    </th>
                                    <th>
                                        السعر
                                    </th>

                                    <th>
                                       مدة العرض بالشهور
                                    </th>

                                    <th>
                                        تحكم
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }} </td>
                                    <td>{{ $slider->articles_title_ar }} </td>
                                    <td>{{ $slider->articles_title_en }} </td>
                                    <td>
                                        @if ($slider->articles_isactive =='active')

                                        <a class="btn btn-danger"
                                        href="{{ route('isActiveToggle',[$slider->id]) }}">
                                       حظر </a>

                                        @else

                                        <a class="btn btn-success"
                                        href="{{ route('isActiveToggle',[$slider->id]) }}">
                                       تنشيط </a>

                                    @endif
                                    </td>
                                    <td>
                                        @if ($slider->articles_image ==null)
                                        <p> لا توجد صورة </p>
                                        @else
                                        <img src="{{ asset('articles/' . $slider->articles_image) }}" alt=""
                                        style="height: 110px;" >
                                        @endif
                                    </td>
                                    <td>
                                        {{$slider->price}}
                                    </td>
                                    <td>
                                        {{$slider->offer_period}}
                                    </td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ route('editBestOffersPage',[$slider->id,$dep->id]) }}">
                                           تعديل </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('deleteSlider') }}">
                                            @csrf
                                            <input type="hidden" name="sliderId" value="{{ $slider->id }}">
                                            <button id="delete" onclick="confirmDelete(event)" type="submit" class="btn btn-danger">
                                             حذف    </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <script>
           window.onload = function subject() {
            trimString('article1', 15);
            trimString('article2', 15);
        }
        var originalText=[];

        function trimString(classname, no) {
            var a1 = document.getElementsByClassName(classname);
            for (var i = 0; i < a1.length; i++) {
                var text = a1[i].innerText;
                originalText.push(a1+i,text);
                var l = text.length;
                let result = text.slice(0, no);
                var final = result + '...';
                a1[i].innerText = final;
            }
        }
    </script>
@endsection
