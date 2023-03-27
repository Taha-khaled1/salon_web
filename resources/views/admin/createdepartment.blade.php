@extends('layouts.app1')
@section('content')
    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Department</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active">add Department</li>
                </ol>
                <div class="card mb-4">

                </div>
                <div class="card mb-4">
                    <div class="card-header">


                    </div>
                    <div class="card-body">

                        <h1>create departement </h1>
                        <form method="post" action="{{ route('department.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="department_title_ar">
                            </div>
                            <div class="form-group" style="margin-top: 10px">
                                <label for="exampleInputEmail1">English Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="department_title_en">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    style="margin-top: 10px;display: block;font-size: x-large">is branch</label>
                                <input type="radio" name="depatment_isbranch" value="active" required>
                                <label>yes</label><br>
                                <input type="radio" name="depatment_isbranch" value="inactive" required>
                                <label>no</label><br>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    style="margin-top: 10px;display: block;font-size: x-large">is active</label>
                                <input type="radio" name="depatment_isactive" value="active" required>
                                <label>yes</label><br>
                                <input type="radio" name="depatment_isactive" value="inactive" required>
                                <label>no</label><br>
                            </div>
                            <div class="form-group" style="margin-top: 10px">
                                <label for="exampleInputEmail1">Main Department</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="department_fatherid">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> department picture</label>
                                <input type="file" class="form-control" id="exampleInputPassword1"
                                    name="department_image">
                            </div>

                            <button type="submit" class="btn btn-success" style="margin-top: 10px">add</button>

                        </form>

                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection






