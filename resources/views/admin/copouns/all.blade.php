@extends('layouts.app1')
@section('content')
    <div id="layoutSidenav_content">

        <main>

            <div class="container-fluid px-4">
                <h1 class="mt-4">الكوبونات</h1>


                <div class="card mb-4">
                    <div class="card-header">
                        <a class="btn btn-success" href="{{ route('addCopounPage') }}" > اضافة </a>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    {{-- <th>id</th> --}}
                                    <th>
                                       كود الكوبون
                                    </th>

                                    <th>
                                        قيمة الخصم
                                    </th>



                                    <th>
                                        تحكم
                                    </th>
                                </tr>
                            </thead>
                        
                            <tbody>

                                @foreach ($sliders as $slider)
                                <tr>
                                    {{-- <td>{{ $slider->id }} </td> --}}
                                    <td>{{ $slider->copoun_name }} </td>
                                    <td>{{ $slider->copoun_value }} </td>
                                    {{-- <td>
                                        @if ($slider->status =='active')

                                        <a class="btn btn-danger"
                                        href="{{ route('isActiveToggle',[$slider->id]) }}">
                                       حظر </a>

                                        @else

                                        <a class="btn btn-success"
                                        href="{{ route('isActiveToggle',[$slider->id]) }}">
                                       تنشيط </a>

                                    @endif
                                    </td> --}}




                                     <td>
                                        <form method="POST" action="{{ route('deleteCoupon') }}">
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
