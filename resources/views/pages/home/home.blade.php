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
    <h1>{{ $website['short_about'] }}</h1>
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
        @if(count($companies) >= 1)
            @foreach ($companies as $company)
            <div class="row">
                <div class="company-card">
                    <div class="title">
                        <div class="img">
                            <img src="{{ URL::to($company['img']) }}" alt="">
                        </div>
                        <div class="name">
                            <h3>{{ $company['name'] }}</h3>
                            <p><strong>Descrição: </strong> {{ $company['description'] }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="btn-area">
                        <a target="_blank" href="{{ $company['map'] }}" class="btn btn-primary">Visualizar no mapa</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="row">
            <div class="company-card">
                <P>Não há empresas cadastradas</P>
            </div>
        @endif
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
    $('#companyForm').on('keyup',() => {
        var value = $('#companyForm').val();
        $("#link-send").attr("href", "https://www.google.com/maps/search/"+value);

    });
</script>

@endsection
