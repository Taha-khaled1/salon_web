<div class="col-lg-8 col-md-8 mb-8 mb-md-8 one">
    <div class="container">
        <table class="table table-striped" class="table table-striped"
        style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}};"
        >
            <thead>
                <tr>

                    <th>
                        @lang('auth.service')
                    </th>
                    <th>    @lang('auth.status')
                    </th>
                    <th>   @lang('auth.price')
                    </th>
                    <th>   @lang('auth.control')
                    </th>

                </tr>

            </thead>
            <tbody>

                @foreach ($orders as $item)
                    <tr>
                        <td>{{ $item->service_name }} </td>
                        <td>{{ $item->status }} </td>
                        <td>{{ $item->service_price }} </td>
                        <td>
                            <button type="button" class="btn btn-warning" style="font-size: large" data-toggle="modal"
                                data-target="#exampleModal" onclick="get_details({{$item->id}})">
                                @lang('auth.more')
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="height: 100%;">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" >
                        <h5 style="color: black">  @lang('auth.details')</h5>
                        <textarea id="details" style="width: 100%;height: 250px;"></textarea>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
    <script>
       async function get_details(id)
        {
            var apiUrl = window.location.origin + '/api/details/' +id;
            const res = await fetch(apiUrl);
            obj = await res.json();
            //console.log(obj['service_description']);
            document.getElementById('details').innerHTML=obj['service_description'];

           // details
           // selectService.value = obj;
        }
    </script>

</div>
