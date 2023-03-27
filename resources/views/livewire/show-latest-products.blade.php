<div>

    <div class="row d-md-flex">
        <div class="col-lg-12  p-md-5">
            <div class="row">
          <div class="col-md-12 nav-link-wrap mb-5">
            <div class="nav  nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                @foreach ($categories as $key => $item )
                <div  >
                <button type="button"  onclick="changeSelectedProducts({{$item['id']}})" class="nav-link active"
                     >
                    {{$item['department_title_en']}}
                </button>
                </div>
                @endforeach

          </div>
          <div class="col-md-12 d-flex align-items-center">

            <div class="tab-content " id="v-pills-tabContent" style="margin-top: 4%;width: 100%;">

              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                  <div class="row">
                    @foreach ($selected_products as  $key => $item)

                    <div class="col-md-4 text-center" >
                        <div class="menu-wrap">
                            <a href="#" class="menu-img img mb-4" style="background-image:url('{{ asset('articles/' . $item['articles_image']) }}')"></a>
                            <div class="text">
                                <h3><a href="#">{{$item['articles_title_en']}}</a></h3>
                                <p style="width: 100%">
                                    <?php echo $item['articles_subject_en'] ?>
                                </p>
                                <p class="price"><span>${{$item['price']}}</span></p>
                                <p><a href="#" class="btn btn-primary btn-outline-primary">Get Service Now</a></p>
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

<script>

   async function changeSelectedProducts(id)
    {
        //console.log(id);
        var apiUrl = window.location.origin +'/api/getSelectedProducts/'+id;

            const res = await fetch(apiUrl);
            let products = await res.json();

            console.log(products);
            for(var i=0; i<=products.length ; i++)
            {
                console.log(products[i]['articles_title_en']);
            }
    }

</script>

