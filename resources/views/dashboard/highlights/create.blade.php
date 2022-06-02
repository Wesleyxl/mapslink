@extends('layouts.dashboard')
@section('title', 'Dashboard - Empresa')
@section('ul-company', 'menu-open')
@section('li-company', 'active')
@section('a-company', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/css/layout.css') }}">
<!-- end links -->

@if (session('success'))
<script>
    var click = 0;
    setInterval(() => {
        if (click == 0) {
            $("#modal-success").trigger('click');
            click = 1;
        }
    }, 0);
</script>
@endif
@if (session('warning'))
<script>
    var click = 0;
    setInterval(() => {
        if (click == 0) {
            $("#modal-warning").trigger('click');
            click = 1;
        }
    }, 0);
</script>
@endif
@if (session('error'))
<script>
    var click = 0;
    setInterval(() => {
        if (click == 0) {
            $("#modal-error").trigger('click');
            click = 1;
        }
    }, 0);
</script>
@endif

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Empresas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Empresas</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content company highlights">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Empresas</h3>

                        <div class="input-group search-area">
                            <input class="form-control" id="search" type="text" placeholder="Buscar">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body content p-0" id="content" >
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary m-3" href="{{ route('dashboard-highlight-create') }}">Editar Destaques</a>
                        </div>
                        <div class="row" style="padding: 15px">
                            @foreach ($highlights as $company)
                                <div class="col-md-3">
                                    <a href="{{ route('dashboard-highlight-destroy', ['id' => $company['id']] ) }}" class="btn btn-danger m-1"><i class="fa-solid fa-xmark"></i></a>
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

</section>
<!-- modal success -->
<button type="button" id="modal-success" style="opacity: 0" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel"><strong>Sucesso!</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ session('success') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- modal warning -->
<button type="button" id="modal-warning" style="opacity: 0" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalWarning">
    Launch demo modal
</button>
<div class="modal fade" id="exampleModalWarning" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="exampleModalLabel"><strong>Atenção!</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ session('warning') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- modal error -->
<button type="button" id="modal-error" style="opacity: 0" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalError">
    Launch demo modal
</button>
<div class="modal fade" id="exampleModalError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel"><strong>Error!</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ session('error') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<script>
    var timeout = null;
    $('body').on('keyup', '#search', function(e){
        var search = $('#search').val();
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ url('/adm/empresa/search/') }}",
                data: {data: search},
                success: function(retorno){
                    $('#content').html(retorno);
                }
            });
        }, 800)
    });
</script>
@endsection
