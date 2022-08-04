@extends('front.layouts.master')
@section('title',$data['articles']->title)
@section('style')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 50%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')

    <div class="col-md-9 mx-auto furkan">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($data['images'] as $image)
                    <div class="swiper-slide"><img src="{{$image->path}}" alt=""></div>
                @endforeach

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <br>

        {!! $data['articles']->content !!}
    </div>
    @include('front.widgets.categoryWidget')
    <span class="text-danger">Okunma Sayısı : <b>{{$data['articles']->hit}}</b></span>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
