@extends('layouts.app')
@section('content')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
        <script>

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    events: [
                        @foreach ($my_offeries as $offer)
                                @php
                                    $number_of_day=1;
                                    $days=count($offer->days);
                                @endphp
                            @for ($i=\Carbon\Carbon::parse($offer->start_at); $i<=\Carbon\Carbon::parse($offer->end_at);$i->addDay() )
                               
                                {
                                title: '{{ app()->getLocale()=="ar" ? $offer->days[$number_of_day-1]->day_details_ar : $offer->days[$number_of_day-1]->day_details_en}}',
                                start: '{{ date_format($i,"Y-m-d") }}'
                                },

                                @php
                                    $number_of_day==$days ? $number_of_day=1 :$number_of_day=$number_of_day+1
                                @endphp

                            @endfor
                           
                        @endforeach
                        {
                        title: 'medhat mmmm mandas sahj kasdlkas kjdasl, ',
                        start: '2023-03-23'
                        },
                        {
                        title: 'medhat mmmm mandas sahj kasdlkas kjdasl, ',
                        start: '2023-03-23'
                        },
                        {
                        title: 'medhat mmmm mandas sahj kasdlkas kjdasl, ',
                        start: '2023-03-23'
                        },
                    ],
                    initialView: 'dayGridMonth',
                    // dateClick: function() {
                    //     alert('a day has been clicked!');
                    // }
                });
                calendar.render();
                calendar.on('dateClick', function(info) {
                    console.log('clicked on ' + info.dateStr);
                });

            });

        </script>
    </head>
    <style>
        footer {
            margin-top: 55px !important;
        }
    </style>
    @if (App::getLocale() == 'ar')
        <style>
            .two {
                margin: 27px;
                margin-top: 10%;
                height: fit-content;
                background: #0e0e12;
                padding: 44px 26px 44px 26px;
                border-radius: 16px;
            }

            #button {
                text-decoration: none;
                border-radius: 12px;
                width: 100%;
                margin-bottom: 5px;
                margin-top: 5px;
                font-size: medium
            }

            .one {
                /* width: 67%; */
                margin-top: 27px;
                /* margin-right: 28px; */
                /* border: 1px solid black; */
                background: #0e0e12;
                border-radius: 13.5px;
                margin-top: 10%;

            }

            .three {
                /* width: 100%; */
                margin-top: 27px;
                margin-right: 12px;
                /* border-top: 1px solid; */
                margin-bottom: 25px;

            }

            .text_user {
                padding-top: 25px;
                padding-bottom: 25px;
                padding-right: 15px;
                color: #fff;
                text-align: start;
                /* border-bottom: 1px solid #4682B4; */
            }

            .span1 {
                color: #4682B4;
            }

            .span2 {
                margin-top: 29px;
                /* float: left; */
                color: #4682B4;
                /* margin-left: 11px; */
            }

            .span2 input:hover {
                /* background-color: #555; */
                background: #ffc107;
                border-color: #ffc107;
            }

            .span3 {
                margin-top: 29px;
                color: white;
                background: #5AAC4E;
                border-color: #5AAC4E;
                padding: 5px;
            }

            .span3:hover {
                opacity: 0.9;
            }

            .span4 {
                border-radius: 0px;
                margin-right: 8px;
                height: 35px;
                margin-top: 3px;
                background: #5AAC4E;
                border-color: #5AAC4E;
            }

            .span4:hover {
                opacity: 0.9;
            }
        </style>
    @else
        <style>
            #button {
                text-decoration: none;
                border-radius: 12px;
                width: 100%;
                margin-bottom: 5px;
                margin-top: 5px;
                font-size: medium
            }

            .two {
                margin: 27px;
                height: fit-content;
                background: #0e0e12;
                padding: 44px 26px 44px 26px;
                border-radius: 16px;
                margin-top: 13%;

            }

            .one {
                /* width: 67%; */
                margin-top: 27px;
                /* margin-left: 28px; */
                /* margin-right: 86px; */
                /* border: 1px solid black; */
                background: #0e0e12;
                border-radius: 13.5px;
                margin-top: 13%;
            }

            .three {
                /* width: 100%; */
                margin-top: 27px;
                margin-left: 12px;
                /* border-top: 1px solid #4682B4; */
                margin-bottom: 25px;
                /* margin-right: 86px; */
                /* border: 1px solid #4682B4; */
            }

            .dropdown-item {
                padding-top: 25px;
                /* color:#4682B4; */
                padding-bottom: 25px;
                border-bottom: 1px solid black;
            }

            .text_user {
                padding-top: 25px;
                padding-bottom: 25px;
                padding-left: 15px;
                color: #fff;
                /* border-bottom: 1px solid #4682B4; */
            }

            .span1 {
                color: #4682B4;
            }

            .span2 {
                margin-top: 29px;
                /* float: right; */
                color: #4682B4;
                /* margin-right: 11px; */
                text-align: center;
            }

            .span2 input:hover {
                /* background-color: #555; */
                background: #ffc107;
                border-color: #ffc107;
            }

            .span3 {
                margin-top: 29px;
                color: white;
                background: #5AAC4E;
                border-color: #5AAC4E;
                padding: 5px;
            }

            .span3:hover {
                opacity: 0.9;
            }

            .span4 {
                border-radius: 0px;
                margin-left: 8px;
                height: 35px;
                margin-top: 3px;
                background: #5AAC4E;
                border-color: #5AAC4E;
            }

            .span4:hover {
                opacity: 0.9;
            }
        </style>
    @endif
    <style>
        .one input{
            background:transparent;
            border:none;
            border-bottom: 1px solid #292929;
            color: #777;
            transition:.5s;
        }
        .one input:focus{
            outline:none;
            border-bottom: 1px solid #c49b63;
        }
        .span2 input,
        input.span3{
            cursor: pointer;
            background: transparent;
            border: 1px solid #c49b63;
            border-radius: 10px;
            font-size: 26px;
            padding: 5px 15px;
            color:#f0f0f0;
            transition:.5s;
        }
        .span2 input:hover,
        input.span3:hover{
            background:#c49b63;
            border: 1px solid #c49b63;
        }
    </style>
    @livewireStyles


    {{-- user panel  --}}


    <div class="container" style="{{ App::getLocale() == 'ar' ? 'direction: rtl' : '' }}">
        <div class="row">
            <div class="col-lg-3 col-md-3 mb-5 mb-md-5 two" style="">
                <div class="">
                    <a class="btn btn-dark btn-customed" id="button" href="{{route('manageProductsOrders')}}"> @lang('auth.manage products') </a> <br>

                    <a class="btn btn-dark btn-customed" id="button" href="{{ route('manageOrders') }}"> @lang('auth.manage orders') </a> <br>

                    <a class="btn btn-dark btn-customed" id="button" href="{{ url('home') }}"> @lang('auth.personal profile') </a>
                    <a class="btn btn-dark btn-customed" id="button" href="{{ route('getfullcalender') }}">{{ __('site.calendar') }} </a>
                </div>
            </div>

            @yield('content1')

        </div>
    </div>

    </div>
    </div>

    @livewireScripts
@endsection
