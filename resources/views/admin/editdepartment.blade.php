{{-- @extends('layouts.app1')
@section('content')
<div class="container">
<div class="parent" style="display: flex">
<div class="iframe-container" >
    <h1>edit departement </h1>
    <form method="post" action="{{ route('department.update', $dep->id) }}"  enctype="multipart/form-data">
        @method('PUT')
        @csrf
     <div class="form-group">
         <label for="exampleInputEmail1">Arabic Title</label>
         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              name="department_title_ar" value="{{$dep->department_title_ar}}">
     </div>
     <div class="form-group" style="margin-top: 10px">
         <label for="exampleInputEmail1">English Title</label>
         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              name="department_title_en"  value="{{$dep->department_title_en}}">
     </div>
     <div class="form-group">
         <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">is branch</label>
         <input type="radio"   name="depatment_isbranch" value="active"  >
         <label >yes</label><br>
         <input type="radio"    name="depatment_isbranch" value="inactive" checked >
         <label >no</label><br>
     </div>
     <div class="form-group">
         <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">is active</label>
         <input type="radio"   name="depatment_isactive" value="active" checked >
         <label >yes</label><br>
         <input type="radio"    name="depatment_isactive" value="inactive" >
         <label >no</label><br>
     </div>
     <div class="form-group">
        <label for="exampleInputEmail1">main department</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="department_fatherid" value="{{$dep->department_fatherid}}">
    </div>


     @if ($dep->department_image)
     <div id="pic" class="form-group" style="margin-top: 10px;">
         <img  src="{{ asset('articles/' .$dep->department_image) }}" alt="" style="height: 150px;" >
         <button onclick="newPic(event)" class="btn btn-danger" style="margin-top: 113px;font-size: small;"> delete</button>
     </div>
     @endif
     <div id="newPic"  style="display: none">
        <div class="form-group" style="margin-top: 10px">
            <label for="exampleInputEmail1"> new image</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="department_image" >
        </div>
     </div>


     <button type="submit" class="btn btn-warning" style="margin-top: 10px">edit</button>

    </form>

 </div>
</div>
</div>
<script>
    function newPic(event)
    {
        event.preventDefault();
        document.getElementById("pic").style.display='none';
        document.getElementById("newPic").style.display='block';
       // console.log('done');
    }
</script>
@endsection --}}
@extends('layouts.app1')
@section('content')
    <div id="layoutSidenav_content">
        {{-- @if (Auth::user()->rule_id == 1) --}}

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Department</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active">edit Department</li>
                </ol>
                <div class="card mb-4">

                </div>
                <div class="card mb-4">
                    <div class="card-header">


                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('department.update', $dep->id) }}"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                         <div class="form-group">
                             <label for="exampleInputEmail1">Arabic Title</label>
                             <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                  name="department_title_ar" value="{{$dep->department_title_ar}}">
                         </div>
                         <div class="form-group" style="margin-top: 10px">
                             <label for="exampleInputEmail1">English Title</label>
                             <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                  name="department_title_en"  value="{{$dep->department_title_en}}">
                         </div>
                         <div class="form-group">
                             <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">is branch</label>
                             <input type="radio"   name="depatment_isbranch" value="active"  >
                             <label >yes</label><br>
                             <input type="radio"    name="depatment_isbranch" value="inactive" checked >
                             <label >no</label><br>
                         </div>
                         <div class="form-group">
                             <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">is active</label>
                             <input type="radio"   name="depatment_isactive" value="active" checked >
                             <label >yes</label><br>
                             <input type="radio"    name="depatment_isactive" value="inactive" >
                             <label >no</label><br>
                         </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">main department</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                 name="department_fatherid" value="{{$dep->department_fatherid}}">
                        </div>


                         @if ($dep->department_image)
                         <div id="pic" class="form-group" style="margin-top: 10px;">
                             <img  src="{{ asset('articles/' .$dep->department_image) }}" alt="" style="height: 150px;" >
                             <button onclick="newPic(event)" class="btn btn-danger" style="margin-top: 113px;font-size: small;"> delete</button>
                         </div>
                         @endif
                         <div id="newPic"  style="display: none">
                            <div class="form-group" style="margin-top: 10px">
                                <label for="exampleInputEmail1"> new image</label>
                                <input type="file" class="form-control" id="exampleInputPassword1" name="department_image" >
                            </div>
                         </div>


                         <button type="submit" class="btn btn-warning" style="margin-top: 10px">edit</button>

                        </form>


                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection







