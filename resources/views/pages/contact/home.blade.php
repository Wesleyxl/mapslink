@extends('layouts.website')
@section('title', 'Contato')
@section('a-contact', 'active')
@section('content')

    <!-- links -->
    <link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/contact.css') }}">
    <!-- end links -->


   <!-- Banner -->
   <section class="banner">
        <div class="container">
            <div class="title">
                <h1>Contato</h1>
                <p><a href="/">Início</a> - Contato</p>
            </div>
        </div>
    </section>
    <!-- Banner -->

    <!-- Contact -->
    <section class="contact">
        <div class="container">
            <div class="title">
                <h1>Contato</h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
             <p><p>A <strong>Darus Tecnologia</strong> coloca à disposição de seus parceiros e clientes o Canal contato, onde interessados podem enviar elogios, denúncias, sugestões e reclamações de forma anônima ou não.</p></p>
            <div class="form-area">
                <form action="{{ route('website-contact-store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Digite seu nome" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Digite seu email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="label">Motivo</label>
                            <select name="label" id="label" class="form-control @error('label') is-invalid @enderror">
                                <option value="">Selecione o motivo</option>
                                <option value="service">Serviço</option>
                                <option value="compliment">Elogio</option>
                                <option value="complaint">Reclamação</option>
                                <option value="other">Outros</option>
                            </select>
                            @error('label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject">Assunto</label>
                                <input type="text" id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Assunto" value="{{ old('subject') }}">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-grop">
                                <label for="message">Mensagem</label>
                                <textarea name="message" id="message" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder="Digite a sua mensagem">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="btn-area">
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end Contact -->

@endsection
