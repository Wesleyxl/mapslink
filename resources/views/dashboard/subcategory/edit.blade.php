@extends('layouts.dashboard')
@section('title', 'Dashboard - Empresa')
@section('ul-category', 'menu-open')
@section('li-category', 'active')
@section('a-category-create', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/css/layout.css') }}">
<!-- end links -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <a href="{{ route('dashboard-category') }}" class="breadcrumb-item">Categoria</a>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content category">
    <div class="container-fluid">
        <div class="card card-secondary">
            <div class="card-header">
                <h4>Preencha todos os campos corretamente</h4>
            </div>
            <div class="card-body">
                <form  method="POST" enctype="multipart/form-data" action="{{ route('dashboard-subcategory-update', ['id' => $subcategory['id']]) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nome da Subcategoria*</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nome da subcategoria" value="{{ $subcategory['name'] }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category">Categoria*</label>
                                @if(count($categories) >= 1)
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                        <option value="">Selecione uma categoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" readonly>
                                        <option value="" readonly>Não há categorias cadastradas</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descrição da subcategory" rows="5">{{ $subcategory['description'] }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="btn-area d-flex justify-content-between">
                        <a href="{{ route('dashboard-subcategory') }}" class="btn btn-primary">Voltar</a>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>

</section>

    <script>
        var category_id = '{{ $subcategory["category_id"] }}'
        $("#category > option").each(function () {
            if (this.value === category_id) {
                $(this).prop("selected", true);
            }
        });
    </script>

@endsection
