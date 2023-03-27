@extends('layouts.app1')
@section('content')


    <div id="layoutSidenav_content">
        {{-- @if (Auth::user()->rule_id == 1) --}}

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">معلومات الحجز</h1>

                   <div class="card-body" dir="">
                        <form method="post" action="{{route('editOrderForm')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{$contact->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    اسم المستخدم
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="user_name"
                                    value="{{ $contact->user_name }}" >
                            </div>
                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                  البريد الالكتروني
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="user_email"
                                    value="{{ $contact->user_email }}">
                            </div>
                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                  رقم الجوال
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="user_mobile"
                                    value="{{ $contact->user_mobile }}">
                            </div>
                            
                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                  العنوان
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="user_address"
                                    value="{{ $contact->user_address }}">
                            </div>

                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                  نوع الحجز
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="type"
                                    value="{{ $contact->type }}">
                            </div>

                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                  اسم الخدمة
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="service_name"
                                    value="{{ $contact->service_name }}">
                            </div>

                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                  سعر الخدمة
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="service_price"
                                    value="{{ $contact->service_price }}">
                            </div>




                            <div class="form-group" style="margin-top: 20px">
                                <label for="exampleInputEmail1">
                                    وصف الخدمة
                                   </label>
                                <textarea type="LONGBLOB" id="arabic" onchange="change()" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"style="" name="service_description" style="margin-top: 10px"><?php echo str_replace('<br />', ' ', $contact->service_description . "\n"); ?></textarea>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    style="margin-top: 10px;display: block;font-size: x-large">
                                   الحالة
                                </label>
                                <select name="status">
                                    <option value="{{$contact->status}}" selected>{{$contact->status}}</option>
                                    <option value="منتهي">منتهي</option>
                                    <option value="نشط">نشط</option>
                                </select>
                            </div>

                            @if ($contact->service_period)

                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    style="margin-top: 10px;display: block;font-size: x-large">
                                 المدة بالشهور
                                </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="service_period"
                                value="{{ $contact->service_period }}">
                            </div>


                            @endif




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

