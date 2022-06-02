@extends('layouts.dashboard')
@section('title', 'Dashboard - Website')
@section('ul-website', 'menu-open')
@section('li-website', 'active')
@section('a-website', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/css/layout.css') }}">
<!-- end links -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Website Configurações</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/adm">Home</a></li>
                    <li class="breadcrumb-item active">Website Configurações</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content company">
    <div class="container-fluid">
        <div class="card card-secondary">
            <div class="card-header">
                <h4>Configurações do website</h4>
            </div>
            <div class="card-body">
                <form  method="POST" enctype="multipart/form-data" action="{{ route('dashboard-website-update', ['id' => $website['id']]) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="(11) 1234-5678" value="{{ $website['phone'] }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cellphone">Celular</label>
                                <input type="text" id="cellphone" name="cellphone" class="form-control @error('cellphone') is-invalid @enderror" placeholder="(11) 91234-5678" value="{{ $website['cellphone'] }}">
                                @error('cellphone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="dite@seuemail.com.br" value="{{ $website['email'] }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">link Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="www.facebook.com/diteseufacebook" value="{{ $website['facebook'] }}">
                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram">link Instagram</label>
                                <input type="text" name="instagram" id="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="www.instagram.com/digiteseuintagram" value="{{ $website['instagram'] }}">
                                @error('instagram')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin">link Linkedin</label>
                                <input type="text" name="linkedin" id="linkedin" class="form-control @error('linkedin') is-invalid @enderror" placeholder="www.linkedin.com/digiteseulinkedin" value="{{ $website['linkedin'] }}">
                                @error('linkedin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Endereço</label>
                                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="seu Endereço" value="{{ $website['address'] }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="compose-textarea">Banner texto</label>
                                <div class="form-group">
                                    <textarea name="short_about" id="compose-textarea2" class="form-control">{{ $website['short_about'] }}</textarea>
                                </div>
                                @error('short_about')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="compose-textarea">Sobre a empresa</label>
                                <div class="form-group">
                                    <textarea name="about" id="compose-textarea" class="form-control" style="height: 300px">{{ $website['about'] }}</textarea>
                                </div>
                                @error('about')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="btn-area d-flex justify-content-between">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Voltar</a>
                        <button type="submit" class="btn btn-success">editar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <br><br>

</section>


@endsection
