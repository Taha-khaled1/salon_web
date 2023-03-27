@extends('layouts.app1')
@section('content')
    <div id="layoutSidenav_content">

        <main>

            <div class="container-fluid px-4">
                <h1 class="mt-4">طلبات التواصل</h1>

                <div class="card mb-4">

                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>
                                        الاسم
                                    </th>
                                    <th> البريد الالكتروني
                                    </th>
                                    <th> رقم الجوال
                                    </th>
                                    <th> نوع الشكوي
                                    </th>
                                    <th> الحالة
                                    </th>
                                    <th>
                                        تحكم
                                    </th>
                                </tr>
                            </thead>
                         
                            <tbody>

                                @foreach ($sliders as $slider)
                                <tr>

                                    <td>{{ $slider->name }} </td>
                                    <td>{{ $slider->email }} </td>
                                    <td>{{ $slider->phone }} </td>
                                    <td>{{ $slider->type }} </td>
                                    <td>
                                        {{$slider->status}}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{route('showContactUsInfo',$slider->id)}}">
                                           المزيد</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('deleteContactUsInfo') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $slider->id }}">
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
