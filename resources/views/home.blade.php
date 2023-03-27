@extends('layouts.app1')
@section('content')

    <style>
        .one {
            /* width: 20%; */
            margin-right: 10px;
        }

        .two {
            width: 20%;
            /* margin-left: 10px; */
        }
       .parent{
        padding-bottom: 40.25%;
       }
        .iframe-container {
            position: relative;
            width: 80%;
            padding-bottom: 40.25%;
            height: 315;
        }

        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <style>
        .courses ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f1f1f1;
            border: 1px solid #555;
        }

        .courses li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        .courses li {
            /* text-align: center; */
            border-bottom: 1px solid #555;
        }

        .courses li:last-child {
            border-bottom: none;
        }

        .courses li a.active {
            background-color: #04AA6D;
            color: white;
        }

        .courses li a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        #img {
            /* opacity: 0.5; */
        }

        #img:hover {
            opacity: 1;
        }
    </style>




        <div class="parent" style="display: flex">



                <div class="iframe-container" >

                </div>



        </div>



    </div>
@endsection
