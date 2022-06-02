@extends('layouts.website')
@section('title', 'Início')
@section('a-home', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/home.css') }}">
<!-- end links -->


<!-- intro -->
<section id="intro" class="intro">
<div class="center">
    <h1>Permitir às pessoas e às empresas, em todo o mundo, a comunicação na palma da sua mão.</h1>
</div>
</section>
<!-- end intro -->
<section class="search">
    <div class="container">
        <div class="form">
            <form id="form">
                <div class="form-group">
                    <label for="company">Localize uma empresa aqui</label>
                    <input type="text" id="companyForm" name="company" class="form-control" placeholder="Encontre uma empresa">
                </div>
                <a target="_blank" id="link-send" href="" class="btn btn-secondary">Buscar Empresa <img src="assets/icon-map.svg" alt=""></a>
            </form>
        </div>
    </div>
</section>
<!-- Content -->
<section id="content" class="company">
    <div class="container">
        <div class="row">
            <div class="company-card">
                <div class="title">
                    <div class="img">
                        <img src="{{ URL::to('public/assets/website/img/buger.png') }}" alt="">
                    </div>
                    <div class="name">
                        <h3 ></h3>
                        <p><strong>Descrição</strong>: Burger King, muitas vezes abreviado como BK, é uma rede de restaurantes especializada em fast-food, fundada nos Estados Unidos por James McLamore e David Edgerton, que abriram a primeira unidade em Miami, Flórida. </p>
                    </div>
                </div>
                <hr>
                {{-- <div class="street">
                    <ul>
                        <li>
                            <p><img src="assets/icon-map.svg" alt="">Av. Benjamin Harris Hunicutt, S/N - Vila Rio de Janeiro, Guarulhos - SP, 07111-070</p>
                        </li>
                    </ul>
                    <ul>
                        <p><strong>Telefones</strong></p>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            +55 11 1234-5678
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            +55 11 1234-5678
                        </li>
                    </ul>
                    <ul>
                        <p><strong>Email</strong></p>
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            contato@mapslink.com
                        </li>
                    </ul>
                </div> --}}
                <div class="btn-area">
                    <a target="_blank" href="https://www.google.com/maps/place/Burger+King/@-23.4038966,-46.5879735,12z/data=!4m9!1m2!2m1!1sBurger+King!3m5!1s0x94cef51ee38d780b:0xc06bfcafcc54533b!8m2!3d-23.44062!4d-46.54192!15sCgtCdXJnZXIgS2luZyIDiAEBWg0iC2J1cmdlciBraW5nkgEUZmFzdF9mb29kX3Jlc3RhdXJhbnQ?hl=pt-BR" class="btn btn-primary">Visualizar no mapa</a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- end content -->

<script>
    function showMap(id) {
        if ($('#'+id).hasClass('map')) {
            $('#'+id).removeClass('map');
            $('#'+id).addClass('map-hide');
        } else {
            $('#'+id).removeClass('map-hide');
            $('#'+id).addClass('map');
        }
    }
    $('#companyForm').on('keypress',() => {
        var value = $('#companyForm').val();
        $("#link-send").attr("href", "https://www.google.com/maps/search/"+value);

    });
</script>

@endsection
