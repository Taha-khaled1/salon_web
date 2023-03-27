@extends('layouts.app1')
@section('content')
    <div id="layoutSidenav_content">

        <main>

            <div class="container-fluid px-4">
                <h1 class="mt-4">حجوزات المنتجات</h1>
                <form class="form-inline my-2 my-lg-0" name="search" method="GET" action="{{route('searchProductOrder')}}" style="margin-top: 10px !important;display: flex;">

                    <input class="form-control mr-sm-2" type="search" placeholder="بحث" aria-label="Search" name="search_field" style="width: 17% !important;">

                    <select class="btn btn-outline-dark my-2 my-sm-0" name="search_type" style="margin-right: 1%;">
                        <option value="all">الكل</option>
                        <option value="user_name">الاسم</option>
                        <option value="user_email">البريد الالكتروني</option>
                        <option value="user_mobile">رقم الجوال</option>
                        <option value="product_name">اسم المنتج</option>
                        <option value="status">الحالة</option>

                    </select>

                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" style="margin-right: 1%;">بحث</button>
                </form>


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
                                    <th> اسم المنتج
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

                                    <td>{{ $slider->user_name }} </td>
                                    <td>{{ $slider->user_email }} </td>
                                    <td>{{ $slider->user_mobile }} </td>
                                    <td>{{ $slider->product_name }} </td>
                                    <td>
                                        {{$slider->status}}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary"

                                            href="{{route('editProductOrderPage',$slider->id)}}">
                                           المزيد</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('deleteProductOrder')}}">
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

@endsection
