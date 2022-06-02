@extends('layouts.dashboard')
@section('title', 'Dashboard - Subcategoria')
@section('ul-subcategory', 'menu-open')
@section('li-subcategory', 'active')
@section('a-subcategory', 'active')
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
                <h1 class="m-0">Subcategorias</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subcategoria</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content category">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Subcategorias</h3>

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
                    <div class="card-body p-0" id="content">
                        @if (count($subcategories) >= 1)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 82px"></th>
                                    <th style="width: 10px">#</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Criado em</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($subcategories as $subcategory)
                                <tr>
                                    <td>
                                        <div class="table-icons">
                                            <a class="btn btn-default" alt="Editar" title="Editar" href="{{ route('dashboard-subcategory-edit', ['id' => $subcategory['id']]) }}">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-md-{{ $subcategory['id'] }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $subcategory['name'] }}</td>
                                    <td>{{ $subcategory['category_name'] }}</td>
                                    <td>{{ $subcategory['created_at'] }}</td>
                                </tr>
                                <div class="modal fade" id="modal-md-{{ $subcategory['id'] }}">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-danger"><strong>Atenção!</strong></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Quer mesmo apagar a subcategoria <strong>{{ $subcategory['name'] }}</strong>?</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                <a href="{{ route('dashboard-subcategory-destroy', ['id' => $subcategory['id']]) }}" class="btn btn-danger">Apagar</a>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                        <div class="link-area" style="margin: 15px 15px -15px 15px">
                            {{ $subcategories->links('pagination::bootstrap-4') }}
                        </div>
                        @else
                        <h5 class="p-4 m-2">Não há subcategorias cadastrada</h5>
                        @endif
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
                <a href="{{ route('dashboard-subcategory-create') }}" class="btn btn-primary">Cadastrar outro</a>
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
                url: "{{ url('/adm/subcategoria/search/') }}",
                data: {data: search},
                success: function(retorno){
                    $('#content').html(retorno);
                }
            });
        }, 800)
    });
</script>
@endsection
