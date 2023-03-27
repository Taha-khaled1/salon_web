@extends('layouts.app1')
@section('content')


    <div id="layoutSidenav_content">
        {{-- @if (Auth::user()->rule_id == 1) --}}

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">معلومات الطلب</h1>




                    <div class="card-body" dir="">
                        <form method="post" action="{{route('editContactUsInfo')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{$contact->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    الاسم
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="name"
                                    value="{{ $contact->name }}" >
                            </div>
                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                  البريد الالكتروني
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="email"
                                    value="{{ $contact->email }}">
                            </div>
                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                  رقم الجوال
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="phone"
                                    value="{{ $contact->phone }}">
                            </div>

                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                    المحتوي
                                   </label>
                                <textarea type="LONGBLOB" id="arabic" onchange="change()" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"style="" name="message" style="margin-top: 10px"><?php echo str_replace('<br />', ' ', $contact->message . "\n"); ?></textarea>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    style="margin-top: 10px;display: block;font-size: x-large">
                                   الحالة
                                </label>
                                <select name="status">
                                    <option value="{{$contact->status}}" selected>{{$contact->status}}</option>
                                    <option value="نشط">نشط</option>
                                    <option value=" غير نشط"> غير نشط</option>

                                </select>
                                
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

