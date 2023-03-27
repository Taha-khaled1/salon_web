@extends('layouts.app1')
@section('content')
<div id="layoutSidenav_content">

    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Department list</h1>
         
            <div class="card mb-4">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('department.create') }} ">add</a>

                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th >Main Dep</th>
                                <th >Arabic Title</th>
                                <th >English Title</th>
                                <th >is Branch</th>
                                <th >is active</th>
                                <th >image</th>
                                <th  >control</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th >ID</th>
                                <th >Main Dep</th>
                                <th >Arabic Title</th>
                                <th >English Title</th>
                                <th >is Branch</th>
                                <th >is active</th>
                                <th >image</th>
                                <th  >control</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($departements as $departement )
                            <tr>
                                <td>{{$departement->id}} </td>
                                <td>{{$departement->department_fatherid}} </td>
                                <td>{{$departement->department_title_ar}} </td>
                                <td>{{$departement->department_title_en}} </td>
                                <td>{{$departement->department_isbranch}} </td>
                                <td>{{$departement->department_isactive}} </td>
                                <td>
                                    @if ($departement->department_image ==null)
                                    <p> no image</p>
                                    @else
                                    <img src="{{ asset('articles/' . $departement->department_image) }}" alt=""
                                                  onclick="fullScreen(event)">

                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning" style=""
                                        href="{{ route('department.edit', $departement->id) }}">edit</a>
                                </td>
                                <td>

                                    <form method="POST" action="{{ route('department.destroy', $departement->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="confirmDelete(event)" class="btn btn-danger" value="delete">
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
