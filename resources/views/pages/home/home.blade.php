@extends('layouts.website')
@section('title', 'Início')
@section('a-home', 'active')
@section('content')

    <!-- links -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/home.css') }}">
    <!-- end links -->

    <!-- Intro -->
    <section class="intro" id="intro">
        <div class="welcome-title">
            <h1>Darus Tecnologia</h1>
            <h2>Plataforma Digital Empresarial</h2>
        </div>
        <div class="welcome-text">
            <p>{!! $website['short_about'] !!}</p>
        </div>
        <div class="search-area">
            <form action="{{ route('website-home-search') }}" method="POST">
                @csrf
                <input class="form-control" type="text" name="search" id="word" placeholder="Busque por qualquer palavra">
                <select name="uf" id="uf" class="form-control @error('uf') is-invalid @enderror">
                    <option value="">Selecione um Local</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP" id="none">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </section>
    <!-- End Intro -->

    <!-- Category -->
    <section class="category" id="category">
        <div class="container">
            <div class="title-area">
                <h3>Categoria</h3>
            </div>
            <div class="content">
                <div class="row">
                    @if(count($categories) >= 1)
                        @foreach ( $categories as $category)

                            <div class="col-md-3">
                                <div class="card-area">
                                    <div class="card-area-header">
                                        <p>{{ $category['name'] }}</p>
                                    </div>
                                    <div class="card-area-body">
                                        <ul>
                                            @foreach ($subcategories as $subcategory)
                                                @if($subcategory['category_id'] === $category['id'])
                                                    <li><a href="{{ url('/categoria/'.$category['url'].'/'.$subcategory['url']) }}" alt="{{ $subcategory['name'] }}" title="{{ $subcategory['name'] }}">{{ $subcategory['name'] }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4>Nada para mostrar</h4>
                    @endif
                </div>
                <div class="btn-area">
                    <a href="{{ route('website-category') }}" alt="Categorias" title="Categorias">Ver Mais</a>
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
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
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
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next2',
                    prevEl: '.swiper-button-prev2',
                },
            });
        }
    </script>

@endsection
