@extends('layouts.website')
@section('title', 'Empresas')
@section('a-company', 'active')
@section('content')

   <!-- links -->
   <link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/company.css') }}">
   <!-- end links -->

   <!-- Banner -->
   <section class="banner">
       <div class="container">
           <div class="title">
               <h1>Empresas</h1>
               <p><a href="/">Início</a> - Empresas</p>
           </div>
       </div>
   </section>
   <!-- Banner -->

   <!-- Category -->
   <section class="company">
       <div class="container-fluid">
           <div class="title">
               <h1>Empresas</h1>
           </div>
           <div class="row">
               <div class="col-md-3">
                   <aside>
                       <div class="card-area">
                           <div class="card-title">
                               <p>Faça sua busca</p>
                               {{-- <div class="input-area">
                                   <input type="text" name="search" id="search" class="form-control">
                                   <button><i class="fa-solid fa-magnifying-glass"></i></button>
                               </div> --}}
                           </div>
                           <div class="card-content">
                               <p>Categorias</p>
                               <div class="list">
                                   <ul>
                                       @foreach ($categories as $category)
                                           <li><span><a href="/categoria/{{ $category['url'] }}">{{ $category['name'] }}</a></span></li>
                                           @foreach ($subcategories as $subcategory)
                                               @if($subcategory['category_id'] === $category['id'])
                                                   <li><a href="/categoria/{{ $category['url'] }}/{{ $subcategory['url'] }}">{{ $subcategory['name'] }}</a></li>
                                               @endif
                                           @endforeach
                                           <div class="line"></div>
                                       @endforeach
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </aside>
               </div>
               <div class="col-md-8">
                    @foreach ($companies as $company)
                        <div class="company-card">
                            <div class="star">
                                @if($company['stars'] <= 10)
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @elseif($company['stars'] > 10 && $company['stars'] <= 20)
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @elseif($company['stars'] > 20 && $company['stars'] <= 30)
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @elseif($company['stars'] > 30 && $company['stars'] <= 40)
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @else
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                @endif
                            </div>
                            <div class="title">
                                <div class="img">
                                    @if($company['img'] != null)
                                        <img src="{{ URL::to($company['img']) }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
                                    @else
                                        <img src="{{ URL::to('/public/assets/website/img/no-image.webp') }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
                                    @endif
                                </div>
                                <div class="name">
                                    <p>{{ $company['name'] }}</p>
                                </div>
                            </div>
                            <div class="text-area">
                                <p><strong>Descrição</strong>: {{ $company['description'] }}</p>
                            </div>
                            <hr>
                            <div class="street">
                                <p><i class="fa-solid fa-location-dot"></i> {{ $company['street'] }}, {{ $company['number'] }} - {{ $company['neighborhood'] }}, {{ $company['city'] }} - {{ $company['uf'] }}, {{ $company['cep'] }}</p>
                            </div>
                            <div class="btn-area">
                                <a href="{{ url('/categoria/'.$company['category'].'/'.$company['subcategory'].'/empresa/'.$company['url']) }}">Visualizar</a>
                            </div>
                        </div>
                    @endforeach
               </div>
           </div>
       </div>
   </section>
   <!-- End Category -->

   <!-- Highlights -->
   <section class="highlights" id="highlights">
       <div class="container" style="position: relative;">
           <div class="title-area">
               <h4>Empresas em Destaque</h4>
           </div>
           <div class="content">
               <div style="top: 50%; left: -35px;" class="swiper-button-prev2" tabindex="0" role="button" aria-label="Previous slide"><i class="fas fa-chevron-left"></i></div>
               <div class="swiper-containers">
                   <div class="swiper-wrapper">
                       @foreach ($highlights as $company)
                           <div class="swiper-slide">
                               <div class="card-highlights">
                                   <div class="card-highlights-header">
                                       <div class="top">
                                           <div class="star">
                                               @if($company['stars'] <= 10)
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                               @elseif($company['stars'] > 10 && $company['stars'] <= 20)
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                               @elseif($company['stars'] > 20 && $company['stars'] <= 30)
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                               @elseif($company['stars'] > 30 && $company['stars'] <= 40)
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-regular fa-star"></i>
                                               @else
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                                   <i class="fa-solid fa-star"></i>
                                               @endif
                                           </div>
                                           <div class="button">
                                               <p>Destaque</p>
                                           </div>
                                       </div>
                                           <div class="link">
                                            <a href="{{ url('/categoria/'.$company['category'].'/'.$company['subcategory'].'/empresa/'.$company['url']) }}">Saiba +</a>
                                           </div>
                                           @if($company['img'] != null)
                                               <img src="{{ URL::to($company['img']) }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
                                           @else
                                               <img src="{{ URL::to('/public/assets/website/img/no-image.webp') }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
                                           @endif
                                   </div>
                                   <div class="card-highlights-body">
                                       <div class="title">
                                           <p>{{ $company['name'] }}</p>
                                       </div>
                                       <div class="text">
                                           <p>{{ $company['street'] }}, {{ $company['number'] }} - {{ $company['neighborhood'] }}, {{ $company['city'] }} - {{ $company['uf'] }}, {{ $company['cep'] }}</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       @endforeach
                   </div>
               </div>
               <div style="top: 50%; right: -35px;" class="swiper-button-next2" tabindex="0" role="button" aria-label="Next slide"><i class="fas fa-chevron-right"></i></div>
           </div>
       </div>
   </section>
   <!-- End Highlights -->
   <link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/swiper.css') }}">
   <script src="{{ URL::to('/public/assets/website/js/swiper.js') }}"></script>
   <script>

       var documentation = window.innerWidth;

       if (documentation <= 700){
           var swiper = new Swiper(".swiper-containers", {
               slidesPerView: 1,
               spaceBetween: 30,
               loop: true,
               navigation: {
                   nextEl: '.swiper-button-next2',
                   prevEl: '.swiper-button-prev2',
               },
           });
       } else {
           var swiper = new Swiper(".swiper-containers", {
               slidesPerView: 4,
               spaceBetween: 30,
               loop: true,
               navigation: {
                   nextEl: '.swiper-button-next2',
                   prevEl: '.swiper-button-prev2',
               },
           });
       }
   </script>


@endsection
