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
              'تم الحجز بنجاح!',
              'success'
          )
      </script>
  @else
      <script>
          var pop = document.getElementById('popMessage');
          Swal.fire(
              'Good job!',
              'Order Booked Successfully!',
              'success'
          )
      </script>
  @endif
@endif

{{-- best sellers --}}
<section class="ftco-menu">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 5%;">
            <div class="col-md-7 heading-section text-center ftco-animate" >

              <h2 class="mb-4">@lang('auth.bestseller')</h2>

            </div>
          </div>

<livewire:servicies-page  :bestSeller='1' />

<div class="row justify-content-center" style="margin-top: 5%;">
    <div class="col-md-7 heading-section text-center ftco-animate" >

      <h2 class="mb-4">@lang('auth.Servicies List')</h2>

    </div>
</div>

<livewire:servicies-page   />


    </div>
</section>


{{-- servicies list --}}


@endsection
