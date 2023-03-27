@extends('layouts.app')
@section('content')

    {{-- contact form start --}}
    @if (session('success'))
    <div id="popMessage">
    </div>
    @if (app()->getLocale() == 'ar')
        <script>
            var pop = document.getElementById('popMessage');
            Swal.fire(
                'عمل جيد !',
                'تم ارسال الرسالة بنجاح!',
                'success'
            )
        </script>
    @else
        <script>
            var pop = document.getElementById('popMessage');
            Swal.fire(
                'Good job!',
                'Message sent Successfully!',
                'success'
            )
        </script>
    @endif
@endif


  <section class="ftco-section contact-section" style="background-image:url('{{ asset('images/form-bg.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: center;">
    <div class="overlay"></div>
    <div class="container mt-5" style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}}">
      <div class="row block-9 justify-content-center justify-content-md-end">
                  {{-- <div class="col-md-4 contact-info ftco-animate">
                      <div class="row">
                          <div class="col-md-12 mb-4">
                <h2 class="h4">@lang('auth.Contact Information')</h2>


              </div> 
              <div class="col-md-12 mb-3">
                <p><span>@lang('auth.Address'):</span>   {{ app()->getLocale() == 'ar' ? $setting->setting_site_address_ar :$setting->setting_site_address_en}} </p>
              </div>
              <div class="col-md-12 mb-3">
                <p><span>@lang('auth.mobile'):</span> <a href="tel://{{$setting->setting_sitetell1}}">{{$setting->setting_sitetell1}}</a></p>
              </div>
              <div class="col-md-12 mb-3">
                <p><span>@lang('auth.Email Address'):</span> <a href="mailto:info@yoursite.com">{{$setting->setting_site_email}}</a></p>
              </div> 

                      </div>
                  </div> --}}
        <div class="col-md-8 col-lg-5 ftco-animate contact-form" style="background-image:url('{{ asset('images/contacts.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <h2 class="text-4xl text-center">@lang('auth.Contact Information')</h2>
          <div class="overlay"></div>
          <form method="POST" action="{{route('contactUsForm')}}" class="contact-form">
            @csrf
              <div class="">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="@lang('auth.Name')" name="name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="@lang('auth.Email Address')" name="email">
                  </div>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="@lang('auth.mobile')" name="phone">
              </div>
            <div class="form-group">
              <label  class="" style="color: white" >@lang('auth.Type')</label>
              <select name="type" style="width: 100%;">
                <option value="شكوي">@lang('auth.complain')</option>
                <option value="مقترح">@lang('auth.proposal')</option>
                <option value="سبب اخر">@lang('auth.another reason')</option>
              </select>
            </div>
            <div class="form-group">
              <textarea  id="" cols="30" rows="7" class="form-control" placeholder="@lang('auth.message')" name="message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="@lang('auth.send message')" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


    <?php echo $setting->setting_googlemap; ?>

    <script>
         var map;
        mapWidth = document.getElementsByTagName("iframe")[0].getAttribute("width");
        map = document.getElementsByTagName("iframe")[0];
        map.setAttribute("width", '100%');
        map.setAttribute("height", '500');
    </script>
@endsection
