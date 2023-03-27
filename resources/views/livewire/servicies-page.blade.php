<div >

        <div class="row d-md-flex" >
            <div class="col-lg-12  p-md-5">
                <div class="row" >
              <div class="col-md-12 nav-link-wrap mb-5">
                <div class="nav  nav-pills justify-content-center gap-2" id="v-pills-tab" role="tablist" aria-orientation="vertical"  style="{{app()->getLocale() == 'ar' ? 'direction: rtl;' : '' }}">

                    @foreach ($categories as $key => $item )
                    <div wire:key="{{ $item['id'] }}" >
                    <a type="button"  wire:click.prevent="changeSelectedProducts({{$item['id']}})" class="nav-link {{$_id==$item['id'] ? 'active' : ''}} "
                         >
                        {{ app()->getLocale() == 'ar' ? $item['department_title_ar'] :$item['department_title_en']}}
                    </a>
                    </div>
                    @endforeach

              </div>
              <div class="col-md-12 d-flex align-items-center">

                <div class="tab-content " id="v-pills-tabContent" style="margin-top: 4%;width: 100%;">

                  <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                      <div class="row" style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}}">
                        @foreach ($selected_products as  $key => $item)

                        <div class="col-lg-6 text-center" >
                            <div class="menu-wrap">
                              <div class="new-card d-flex align-items-center gap-2">
                                <a href="{{ Route('show.product',$item['id']) }}" class="image">
                                  <img src="{{ asset('articles/' . $item['articles_image']) }}" alt="">
                                </a>
                                <div class="details w-100">
                                  <div class="d-flex flex-column">
                                    <div class="title-price d-flex justify-content-between">
                                      <a href="{{ Route('show.product',$item['id']) }}">
                                        <h5>
                                          {{ app()->getLocale() == 'ar' ? $item['articles_title_ar'] :$item['articles_title_en']}}
                                        </h5>
                                      </a>
                                      <span class="price">{{$item['price']}} {{ __('site.AED') }}</span>
                                    </div>
                                  </div>
                                  <div class="description-button">
                                    <p class="desc">
                                        @if (app()->getLocale() == 'ar')
                                        <?php echo $item['articles_subject_ar'] ?>
                                        @else
                                        <?php echo $item['articles_subject_en'] ?>
                                        @endif

                                    </p>
                                    <a href="{{route('bookServicePage',[$item['id'],'service'])}}" class="btn btn-customed"> @lang('auth.Get Service Now')</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>


                        @endforeach

                      </div>
                  </div>




                </div>
              </div>
            </div>
          </div>
        </div>


</div>
</div>
