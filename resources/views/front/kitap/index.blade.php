@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route('index')}}">Anasayfa</a></li>
                    <li class="active">{{$data[0]['name']}}</li>
                </ol>
            </div>
        </div>
    </div>
    @if(session("status"))
        <div class="breadcrumbs" style="margin-top:5px;">
            <div class="container">
                <div class="breadcrumbs-main" style="padding:10px;">
        {{session("status")}}
                </div>
            </div>
        </div>
        @endif
    <!--end-breadcrumbs-->
    <!--start-single-->
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-12 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-3 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">

                                    <li data-thumb="{{asset(\App\Helper\mHelper::largeImage($data[0]['image']))}}">
                                        <div class="thumb-image"> <img src="{{asset(\App\Helper\mHelper::largeImage($data[0]['image']))}}" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- FlexSlider -->
                            <script src="{{asset('js/imagezoom.js')}}"></script>
                            <script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
                            <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />

                            <script>
                                // Can also be used with $(document).ready()
                                $(window).load(function() {
                                    $('.flexslider').flexslider({
                                        animation: "slide",
                                        controlNav: "thumbnails"
                                    });
                                });
                            </script>
                        </div>
                        <div class="col-md-9 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{$data[0]['name']}}</h2>
                                <div class="star-on">
                                    <div class="review">
                                        <a href="#"> 1 customer review </a>

                                    </div>
                                    <div class="clearfix"> </div>
                                </div>

                                <h5 class="item_price">{{$data[0]['fiyat']}} TL</h5>
                                <p>{{$data[0]['aciklama']}}</p>

                                <ul class="tag-men">
                                    <li><span>Kategori</span>
                                        <span class="women1">: {{\App\Kategoriler::getField($data[0]['kategoriid'],"name")}}</span></li>
                                    <li><span>Yazar</span>
                                        <span class="women1">: {{\App\Yazarlar::getField($data[0]['yazarid'],"name")}}</span></li>

                                    <li><span>Yayın Evi</span>
                                        <span class="women1">: {{\App\YayinEvi::getField($data[0]['yayineviid'],"name")}}</span></li>
                                </ul>

                                <a href="{{route('basket.add',['id'=>$data[0]['id']])}}" class="add-cart item_add">SEPETE EKLE</a>

                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="latestproducts">
                        <div class="product-one">
                            @foreach(\App\Kitaplar::inRandomOrder()->limit(3)->get() as $key => $value)
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="{{route('kitap.detay',['selflink'=>$value['selflink']])}}" class="mask"><img class="img-responsive zoom-img" style="width:200px;height:200px;" src="{{asset(\App\Helper\mHelper::largeImage($value['image']))}}" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3>{{$value['name']}}</h3>
                                        <p>{{\App\Yazarlar::getField($value['yazarid'],"name")}}</p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$value['fiyat']}} TL</span></h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    @endsection