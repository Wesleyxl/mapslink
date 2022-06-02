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
               <p><a href="/">Início</a> - {{ $categoryFind['name'] }} - {{ $subcategoryFind['name'] }} - {{ $company['name'] }}</p>
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
                                   <ul id="listCategory">
                                       @foreach ($categories as $category)
                                           <li><span id="category-{{ $category['id'] }}">{{ $category['name'] }}</span></li>
                                           @foreach ($subcategories as $subcategory)
                                               @if($subcategory['category_id'] === $category['id'])
                                                   <li><a id="subcategory-{{ $subcategory['id'] }}" href="/categoria/{{ $category['url'] }}/{{ $subcategory['url'] }}">{{ $subcategory['name'] }}</a></li>
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
                    <div class="card-company company-show">
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
                            <h2>{{ $company['name'] }}</h2>
                        </div>
                        <div class="img-area">
                            @if($company['img'] != null)
                                <img src="{{ URL::to($company['img']) }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
                            @else
                                <img src="{{ URL::to('/public/assets/website/img/no-image.webp') }}" alt="{{ $company['name'] }}" title="{{ $company['name'] }}">
                            @endif
                        </div>
                        <div class="description">
                            <p><strong>Descrição: </strong>{{ $company['description'] }}</p>
                        </div>
                        <div style="clear:both"></div>
                        <div class="links">
                            <ul>
                                <li><i class="fa-solid fa-phone"></i> {{ $company['phone'] }}</li>
                                <li><i class="fa-solid fa-mobile-screen"></i> {{ $company['cellphone'] }}</li>
                                <li><i class="fa-regular fa-envelope"></i> {{ $company['email'] }}</li>
                                <li><i class="fa-solid fa-location-dot"></i> {{ $company['street'].', '.$company['number'].", ". $company['neighborhood'].' - '.$company['city'].' - '.$company['uf'] }}</li>
                                <li><i class="fa-solid fa-link"></i> {{ $company['website'] }}</li>
                            </ul>
                        </div>
                        <div class="btn-area">
                            <h6>Avaliar</h6>
                            <div class="div" id="buttons">
                                <button id="button-positive" class="btn btn-light">+ <i class="fa-solid fa-star"></i></button>
                                <button id="button-negative" class="btn btn-light">- <i class="fa-solid fa-star"></i></button>
                            </div>
                        </div>
                        <div class="time">
                            <p><strong>Horário de funcionamento</strong></p>
                            <ul>
                                <li>
                                    <strong>Segunda-Feira:
                                    @if($company['monday-is-open'])
                                        </strong> das {{ $company['monday-from'] }}hs até {{ $company['monday-to'] }}hrs - Almoço das {{ $company['monday-lunch-from'] }}hrs até {{ $company['monday-lunch-to'] }}hrs -
                                        @if($company['monday-from'] <= $currentTime && $company['monday-to'] >= $currentTime)
                                            <strong class="text-success">Aberto </strong>
                                        @else
                                            <strong class="text-danger">Fechado </strong>
                                        @endif
                                    @else
                                        <strong class="text-danger">Fechado</strong>
                                    @endif
                                </li>
                                <li>
                                    <strong>Terça-Feira:
                                    @if($company['tuesday-is-open'])
                                        </strong> das {{ $company['tuesday-from'] }}hs até {{ $company['tuesday-to'] }}hrs - Almoço das {{ $company['tuesday-lunch-from'] }}hrs até {{ $company['tuesday-lunch-to'] }}hrs -
                                        @if($company['tuesday-from'] <= $currentTime && $company['tuesday-to'] >= $currentTime)
                                            <strong class="text-success">Aberto </strong>
                                        @else
                                            <strong class="text-danger">Fechado </strong>
                                        @endif
                                    @else
                                        <strong class="text-danger">Fechado</strong>
                                    @endif
                                </li>
                                <li>
                                    <strong>Quarta-Feira:
                                    @if($company['wednesday-is-open'])
                                        </strong> das {{ $company['wednesday-from'] }}hs até {{ $company['wednesday-to'] }}hrs - Almoço das {{ $company['wednesday-lunch-from'] }}hrs até {{ $company['wednesday-lunch-to'] }}hrs -
                                        @if($company['wednesday-from'] <= $currentTime && $company['wednesday-to'] >= $currentTime)
                                            <strong class="text-success">Aberto </strong>
                                        @else
                                            <strong class="text-danger">Fechado </strong>
                                        @endif
                                    @else
                                        <strong class="text-danger">Fechado</strong>
                                    @endif
                                </li>
                                <li>
                                    <strong>Quinta-Feira:
                                    @if($company['thursday-is-open'])
                                        </strong> das {{ $company['thursday-from'] }}hs até {{ $company['thursday-to'] }}hrs - Almoço das {{ $company['thursday-lunch-from'] }}hrs até {{ $company['thursday-lunch-to'] }}hrs -
                                        @if($company['thursday-from'] <= $currentTime && $company['thursday-to'] >= $currentTime)
                                            <strong class="text-success">Aberto </strong>
                                        @else
                                            <strong class="text-danger">Fechado </strong>
                                        @endif
                                    @else
                                        <strong class="text-danger">Fechado</strong>
                                    @endif
                                </li>
                                <li>
                                    <strong>Sexta-Feira:
                                    @if($company['friday-is-open'])
                                        </strong> das {{ $company['friday-from'] }}hs até {{ $company['friday-to'] }}hrs - Almoço das {{ $company['friday-lunch-from'] }}hrs até {{ $company['friday-lunch-to'] }}hrs -
                                        @if($company['friday-from'] <= $currentTime && $company['friday-to'] >= $currentTime)
                                            <strong class="text-success">Aberto </strong>
                                        @else
                                            <strong class="text-danger">Fechado </strong>
                                        @endif
                                    @else
                                        <strong class="text-danger">Fechado</strong>
                                    @endif
                                </li>
                                <li>
                                    <strong>Sábado:
                                    @if($company['saturnday-is-open'])
                                        </strong> das {{ $company['saturnday-from'] }}hs até {{ $company['saturnday-to'] }}hrs - Almoço das {{ $company['saturnday-lunch-from'] }}hrs até {{ $company['saturnday-lunch-to'] }}hrs -
                                        @if($company['saturnday-from'] <= $currentTime && $company['saturnday-to'] >= $currentTime)
                                            <strong class="text-success">Aberto </strong>
                                        @else
                                            <strong class="text-danger">Fechado </strong>
                                        @endif
                                    @else
                                        <strong class="text-danger">Fechado</strong>
                                    @endif
                                </li>
                                <li>
                                    <strong>Domingo:
                                    @if($company['sunday-is-open'])
                                        </strong> das {{ $company['sunday-from'] }}hs até {{ $company['sunday-to'] }}hrs - Almoço das {{ $company['sunday-lunch-from'] }}hrs até {{ $company['sunday-lunch-to'] }}hrs -
                                        @if($company['sunday-from'] <= $currentTime && $company['sunday-to'] >= $currentTime)
                                            <strong class="text-success">Aberto </strong>
                                        @else
                                            <strong class="text-danger">Fechado </strong>
                                        @endif
                                    @else
                                        <strong class="text-danger">Fechado</strong>
                                    @endif
                                </li>
                                <li>
                                    <strong>Feriado:
                                    @if($company['holiday-is-open'])
                                        </strong> das {{ $company['holiday-from'] }}hs até {{ $company['holiday-to'] }}hrs - Almoço das {{ $company['holiday-lunch-from'] }}hrs até {{ $company['holiday-lunch-to'] }}hrs -
                                        @if($company['holiday-from'] <= $currentTime && $company['holiday-to'] >= $currentTime)
                                            <strong class="text-success">Aberto </strong>
                                        @else
                                            <strong class="text-danger">Fechado </strong>
                                        @endif
                                    @else
                                        <strong class="text-danger">Fechado</strong>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="mapa-area">
                            <p><strong>Mapa: </strong></p>
                            {!! $company['map'] !!}
                        </div>
                    </div>
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

        var categoryActive = '{{ $categoryFind["id"] }}';
        var subcategoryActive = '{{ $subcategoryFind["id"] }}';

        $(`#category-${categoryActive}`).addClass('active');
        $(`#subcategory-${subcategoryActive}`).addClass('active');

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

    $('body').on('click', '#button-positive', function(e){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: "{{ url('/avaliar/empresa/positive/'.$company['id']) }}",
            success: function(retorno){
                $('#buttons').html("<p>Avaliado</p>");
            }
        });
    });

    $('body').on('click', '#button-negative', function(e){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: "{{ url('/avaliar/empresa/negative/'.$company['id']) }}",
            success: function(retorno){
                $('#content').html("<p>Avaliado</p>");
            }
        });
    });

   </script>


@endsection
