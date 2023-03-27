@extends('layouts.app2')

@section('content1')

    <div class="col-lg-8 col-md-8 mb-8 mb-md-8 one">
          {{-- alerts --}}
        @if (app()->getLocale() == 'ar')
            @if (session('edit'))
                <div class="alert alert-warning" style="margin-top: 10px;">
                    <p style="text_user-align: start"> تم تعديل البيانات بنجاح</p>
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <p style="text_user-align: start"> هذا الحساب موجود بالفعل <br> من فضلك ادخل حساب اخر</p>
                </div>
            @endif
            {{-- error --}}
            @if (session('error'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <p style="text-align: start"> كلمة المرور غير صحيحة</p>
                </div>
            @endif
            @if (session('confirm'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <p> كلمة المرور الجديدة غير صحيحة</p>
                </div>
            @endif
        @else
            @if (session('edit'))
                <div class="alert alert-warning" style="margin-top: 10px;">
                    <p> data edited successfully !</p>
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <p> this email already exists <br> please enter another one !</p>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <p> old password is wrong !</p>
                </div>
            @endif
            @if (session('confirm'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <p> new password is incorrect !</p>
                </div>
            @endif
        @endif



        <form method="POST" action="{{ route('editUser') }}">
            @csrf

            <h1 class="text_user"> @lang('auth.personal profile') </h1>

            <h3 class="text_user">
                @lang('auth.Name'): <br> <input type="text_user" style="width:90%;margin-top:10px" name="name"
                    value="{{ Auth::user()->name }}">
            </h3>
            <h3 class="text_user" style="margin-bottom: 10px;">
                @lang('auth.Email Address'): <br> <input type="email" style="width:90%;padding-bottom: 2px;margin-top:10px"
                    name="email" value="{{ Auth::user()->email }}">
            </h3>
            <h3 class="text_user" style="margin-bottom: 10px;">
                @lang('auth.mobile'): <br> <input type="number" style="width:90%;padding-bottom: 2px;margin-top:10px"
                    name="mobile" value="{{ Auth::user()->mobile }}">
            </h3>
            <h1 style="text-align: center" class="span2"> <input type="submit" value="@lang('auth.edit')"> </h1>
        </form>

        <div class="three">
            <h1 class="text_user"> @lang('auth.changepassword') </h1>
            <form method="POST" action="{{ route('editPassword') }}">
                @csrf
                <h3 class="text_user">
                    <input type="text_user" style="width:90%;margin-top: 12px;" name="old_password"
                        placeholder="@lang('auth.enter Password')" required>
                </h3>
                <h3 class="text_user">
                    <input type="text_user" style="width:90%;margin-top: 12px;" name="new_password"
                        placeholder="@lang('auth.new Password')" required>
                </h3>
                <h3 class="text_user">
                    <input type="text_user" style="width:90%;margin-top: 12px;" name="confirm_password"
                        placeholder="@lang('auth.confirm New Password')" required>
                </h3>
                <h3 style="text-align: center;"> <input type="submit" class="span3" value="@lang('auth.change Password')"> </h3>
            </form>
        </div>

    </div>


    {{-- <div class="col-lg-8 col-md-8 mb-8 mb-md-8 one">
            @if (session('edit'))
                <div class="alert alert-warning" style="margin-top: 10px;">
                    <p> data edited successfully !</p>
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <p> this email already exists <br> please enter another one !</p>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <p> old password is wrong !</p>
                </div>
            @endif
            @if (session('confirm'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <p> new password is incorrect !</p>
                </div>
            @endif


            {{-- <form method="POST" action="">
                @csrf

                <h1 class="text_user">Personal Page </h1>

                <h3 class="text_user">
                    name: <br> <input type="text_user" style="width:90%;margin-top:10px" name="name"
                        value="{{ Auth::user()->name }}">
                </h3>
                <h3 class="text_user" style="margin-bottom: 10px;">
                    email: <br> <input type="email" style="width:90%;padding-bottom: 2px;margin-top:10px" name="email"
                        value="{{ Auth::user()->email }}">
                </h3>
                <h3 class="text_user" style="margin-bottom: 10px;">
                    mobile: <br> <input type="number" style="width:90%;padding-bottom: 2px;margin-top:10px" name="mobile"
                        value="{{ Auth::user()->mobile }}">
                </h3>
                <h1 style="text-align: center" class="span2"> <input type="submit" value="edit"> </h1>
            </form>

            <div class="three">
                <h1 class="text_user"> change password</h1>
                <form method="POST" action="{{ route('editPassword') }}">
                    @csrf
                    <h3 class="">
                        <input type="text_user" style="width:90%;margin-top: 12px;" name="old_password"
                            placeholder="enter old password" required>
                    </h3>
                    <h3 class="">
                        <input type="text_user" style="width:90%;margin-top: 12px;" name="new_password"
                            placeholder=" enter new password" required>
                    </h3>
                    <h3 class="">
                        <input type="text_user" style="width:90%;margin-top: 12px;" name="confirm_password"
                            placeholder="confirm  password" required>
                    </h3>
                    <h3 style="text-align: center;"> <input type="submit" class="span3" value="change password"> </h3>
                </form>
            </div> --}}

    </div>



@stop
