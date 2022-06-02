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
            <p>A <strong>DARDUS TECNOLOGIA</strong> foi criado para valorizar o comércio e serviços locais de todas as regiões do Brasil, dar mais destaque aos serviços prestados pelos nossos clientes e comerciantes que contribuem para o desenvolvimento social dos bairros.</p>
        </div>
        <div class="search-area">
            <form action="">
                <input class="form-control" type="text" name="word" id="word" placeholder="Busque por qualquer palavra">
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
                    @for ( $i= 0;  $i< 10; $i++)
                    <div class="col-md-3">
                        <div class="card-area">
                            <div class="card-area-header">
                                <a href="/categorias" alt="Administração" title="Administração">Administração (47)</a>
                            </div>
                            <div class="card-area-body">
                                <ul>
                                    <li><a href="#" alt="Financeiro" title="Financeiro">Financeiro (8)</a></li>
                                    <li><a href="#" alt="Auditoria" title="Auditoria">Auditoria (10)</a></li>
                                    <li><a href="#" alt="Consultoria" title="Consultoria">Consultoria (10)</a></li>
                                    <li><a href="#" alt="Logística" title="Logística">Logística (12)</a></li>
                                    <li><a href="#" alt="Recursos Humanos" title="Recursos Humanos">Recursos humanos (7)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                <div class="btn-area">
                    <a href="/categorias" alt="Categorias" title="Categorias">Ver Mais</a>
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
                        @for ($i = 0; $i < 10; $i++)
                        <div class="swiper-slide">
                            <div class="card-highlights">
                                <div class="card-highlights-header">
                                    <div class="top">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                        <div class="button">
                                            <p>Destaque</p>
                                        </div>
                                    </div>
                                        <div class="link">
                                            <a href="#">Saiba +</a>
                                        </div>
                                        <img src="{{ URL::to('/public/assets/website/img/home/highlights-img.png') }}" alt="">
                                </div>
                                <div class="card-highlights-body">
                                    <div class="title">
                                        <p>Acw Distribuidora De Material Elétrico Ltda</p>
                                    </div>
                                    <div class="text">
                                        <p> Av. Papa João Paulo I, 2722 - Cidade Parque Sao Luiz, Guarulhos - SP, 07170-385</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
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
