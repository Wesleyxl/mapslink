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
                @csrf
                <div class="form-group">
                    <label for="company">Localize uma empresa aqui</label>
                    <input type="text" id="companyForm" name="search" class="form-control" placeholder="Encontre uma empresa">
                </div>
                <button type="button" id="btn-form" class="btn btn-secondary">Buscar Empresa</button>
                {{-- <a target="_blank" id="link-send" href="#" class="btn btn-secondary">Buscar Empresa <img src="assets/icon-map.svg" alt=""></a> --}}
            </form>
        </div>
    </div>
</section>
<!-- Content -->
<section id="content" class="company">

</section>
<!-- end content -->

<script>


    $('#btn-form').on('click', () => {
        var search = $('#companyForm').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "Post",
            url: "{{ url('/buscar/empresas') }}",
            data: {data: search},
            success: function(retorno){
                $('#content').html(retorno);
            }
        });
    })

</script>

@endsection
