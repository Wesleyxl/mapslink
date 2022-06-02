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
                <h1 class="m-0">Cadastrar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <a href="{{ route('dashboard-category') }}" class="breadcrumb-item">Categoria</a>
                    <li class="breadcrumb-item active">Cadastro</li>
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
                <small class="text-danger">OBS: Os campos com * são campos obrigatórios</small>
                <form  method="POST" enctype="multipart/form-data" action="{{ route('dashboard-category-store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nome da categoria*</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nome da categoria" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descrição da category" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="btn-area d-flex justify-content-between">
                        <a href="{{ route('dashboard-category') }}" class="btn btn-primary">Voltar</a>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>

</section>

@endsection
