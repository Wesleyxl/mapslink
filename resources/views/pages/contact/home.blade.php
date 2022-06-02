@extends('layouts.website')
@section('title', 'Contato')
@section('a-contact', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/contact.css') }}">
<!-- end links -->
<!-- intro -->
<section id="intro" class="intro">
    <div class="center">
        <h1>{{ $website['short_about'] }}</h1>
    </div>
    </section>

<!-- contact -->
<section id="contact" class="contact">
    <div class="container">
        <h1>Entre em contato</h1>
        <div class="form-area">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-area">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger  ">{{ session('error') }}</div>
                        @endif
                        <p>A <strong>GMapslink</strong> coloca à disposição de seus parceiros e clientes o Canal contato, onde interessados podem enviar elogios, denúncias, sugestões e reclamações de forma anônima ou não.</p>
                    </div>
                    <form method="POST" action="{{ route('website-contact-store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome:</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Digite seu nome" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Digite seu email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Assunto:</label>
                                    <input type="text" id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Assunto" value="{{ old('subject') }}">
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Mensagem</label>
                                    <textarea name="message" id="message" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder="Digite sua mensagem">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="btn-area">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="info-area">
                        <div class="title">
                            <p>Informações de contato</p>
                        </div>
                        <div class="info-tel">
                            @if($website['phone'])
                            <p>Telefones</p>
                            <ul>
                                <li>
                                    <a href="tel:+55{{ $website['phone_link'] }}" target="_blank">
                                        <i class="fa-solid fa-phone"></i>
                                        {{ $website['phone'] }}
                                    </a>
                                </li>
                            </ul>
                            @endif
                            <ul>
                                @if($website['cellphone'])
                                <p>Whatsapp</p>
                                <li>
                                    <a href="https://api.whatsapp.com/send?phone=55{{ $website['whats_link'] }}">
                                        <i class="fa-solid fa-phone"></i>
                                        {{ $website['cellphone'] }}
                                    </a>
                                </li>
                                @endif
                            </ul>
                            <ul>
                                <p>Email:</p>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-envelope"></i>
                                        {{ $website['email'] }}
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <p>Horários de funcionamento</p>
                                <li>
                                    <a href="#">{{ $website['office_hour'] }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact -->

@endsection
