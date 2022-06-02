@extends('layouts.website')
@section('title', 'Início')
@section('a-home', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/home.css') }}">
<!-- end links -->


<!-- intro -->
<section id="intro" class="intro" style="background: url({{ URL::to('public/assets/website/img/banner.webp') }});background-repeat: no-repeat;
background-size: cover;
background-position: center center;"></section>
<!-- end intro -->
<section class="search">
    <div class="container">
        <div class="form">
            <form action="">
                <div class="form-group">
                    <label for="company">Localize uma empresa aqui</label>
                    <input type="text" id="company" name="company" class="form-control" placeholder="Encontre uma empresa">
                </div>
                <button type="submit" class="btn btn-secondary">Buscar Empresa <img src="assets/icon-map.svg" alt=""></button>
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
                        <img src="{{ URL::to('public/assets/website/img/google-maps-smartphone.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <h3 >Wa Desenvolvimentos</h3>
                        <p><strong>Descrição</strong>: Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, similique nulla? Hic velit corrupti eveniet cum officiis pariatur in animi esse quae quasi sunt nihil, architecto tempora itaque, atque possimus.</p>
                    </div>
                </div>
                <hr>
                <div class="street">
                    <ul>
                        <li>
                            <p><img src="assets/icon-map.svg" alt=""> rua sebastião, 13 - Recreio S. Jorge, Guarulhos - São Paulo, 12344-567</p>
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
                </div>
                <div class="btn-area">
                    <button onclick="showMap('map-'+1)" type="button" class="btn btn-primary">Visualizar no mapa</button>
                </div>
                <div class="map-area">
                    <div class="map-hide" id="map-1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29280.45892453592!2d-46.515337500463865!3d-23.458395165135716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef55b5f1876d9%3A0xdeede4c5517cc50b!2sPra%C3%A7a%20Presidente%20Get%C3%BAlio%20Vargas!5e0!3m2!1spt-BR!2sbr!4v1654181154574!5m2!1spt-BR!2sbr" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
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
</script>

@endsection
