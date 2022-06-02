@extends('layouts.dashboard')
@section('title', 'Dashboard - Usuário')
@section('ul-user', 'menu-open')
@section('li-user', 'active')
@section('a-user', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/css/layout.css') }}">
<!-- end links -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuário</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/adm">Home</a></li>
                    <li class="breadcrumb-item active">Usuário</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container" style="max-width: 700px">
        <div class="card card-secondary">
            <div class="card-header">
                <h4>Configurações de usuário</h4>
            </div>
            <div class="card-body">
                <form  method="POST" enctype="multipart/form-data" action="{{ route('dashboard-user-store') }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <p>Configurações de conta</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user['name'] }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user['email'] }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Nome da Empresa</label>
                                        <input type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror" value="{{ $user['company'] }}">
                                        @error('company')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Digite sua senha">
                                        <span class="text-danger">***Se não for alterar a senha, mantenha esse campo em branco</span>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-primary" href="{{ route('dashboard') }}">Voltar</a>
                                        <button type="submit" class="btn btn-success">Editar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>

</section>


@endsection
