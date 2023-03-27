@extends('layouts.app')
@section('content')
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
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row" style="margin-top: 5%;">
        <div class="col-md-12 ftco-animate">
            <div class="cart-list">
                <table class="table">
                    <thead class="thead-primary">
                      <tr class="text-center">
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>@lang('auth.product')</th>
                        <th>@lang('auth.price')</th>
                        <th>@lang('auth.quantity')</th>
                        <th>@lang('auth.total')</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item )

                        <tr class="text-center">
                            <td class="product-remove">
                                <form method="POST" action="{{route('deleteFromCard')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                 <button type="submit" style="background: #c49b63 !important;padding: 5px;height: auto !important;"><span class="icon-close"></span></button>
                                </form>

                            </td>

                            <td class="image-prod"><div class="img" style="background-image:url('{{ asset('articles/' . $item->image) }}')"></div></td>

                            <td class="product-name">
                                <h3>{{app()->getLocale() == 'ar'?  $item['product_name_ar'] : $item['product_name_en']}}</h3>

                            </td>

                            <td class="price">{{$item['product_price']}}</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                 <input type="text" name="quantity" class="quantity form-control input-number" value="{{$item['qty']}}" min="1" max="100" readonly>
                              </div>
                          </td>

                            <td class="total">${{$item['price']}}</td>
                          </tr>

                        @endforeach



                    </tbody>
                  </table>
              </div>
        </div>
    </div>
    <div class="row justify-content-end" style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}}">
        <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
                <h3>@lang('auth.buy')</h3>
                {{-- <p class="d-flex">
                    <span>Subtotal</span>
                    <span>$20.60</span>
                </p>
                <p class="d-flex">
                    <span>Delivery</span>
                    <span>$0.00</span>
                </p>
                <p class="d-flex">
                    <span>Discount</span>
                    <span>$3.00</span>
                </p>
                <hr> --}}
                <form method="POST" action="{{route('buyCard')}}">
                     @csrf


                    <p class="d-flex total-price">
                        <span>@lang('auth.total')</span>
                        <span>${{$total}}</span>

                    </p>



            </div>
            <p class="text-center"><button type="submit" class="btn btn-primary py-3 px-4" style="color: white !important;">@lang('auth.buy')</button></p>
        </form>
        </div>
    </div>
    </div>
</section>
@endsection
