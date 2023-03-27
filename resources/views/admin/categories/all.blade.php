@extends('layouts.app1')
@section('content')
<div id="layoutSidenav_content" >

    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">الاقسام</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('addCategories') }} ">  اضافة قسم </a>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th >الاسم بالعربية</th>
                                <th >الاسم بالانجليزية</th>
                                <th >الخدمات</th>
                                <th  >تحكم</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($departements as $departement )
                            <tr>
                                <td>{{$departement->id}} </td>
                                <td>{{$departement->department_title_ar}} </td>
                                <td>{{$departement->department_title_en}} </td>
                                <td>
                                    <a class="btn btn-primary" style=""
                                        href="{{route('categoryServicies', $departement->id)}}">اضغط هنا للخدمات</a>
                                </td>

                                <td>
                                    <a class="btn btn-warning" style=""
                                        href="{{ route('editCategories', $departement->id) }}">تعديل</a>
                                </td>
                                <td>

                                    <form method="POST" action="{{ route('deleteCategory', $departement->id) }}">
                                        @csrf

                                        <input type="submit" onclick="confirmDelete(event)" class="btn btn-danger" value="مسح">
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
