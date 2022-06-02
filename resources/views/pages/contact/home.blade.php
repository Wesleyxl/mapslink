@extends('layouts.website')
@section('title', 'Contato')
@section('a-contact', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/website/css/contact.css') }}">
<!-- end links -->
<section class="banner" style="background: url({{ URL::to('public/assets/website/img/banner.webp') }}); margin-top: 100px;
width: 100%;
height: 500px;
background-repeat: no-repeat;
background-size: contain;
background-position: center center;"></section>

<!-- contact -->
<section id="contact" class="contact">
    <div class="container">
        <h1>Entre em contato</h1>
        <div class="form-area">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-area">
                        <p>A <strong>GMapslink</strong> coloca à disposição de seus parceiros e clientes o Canal contato, onde interessados podem enviar elogios, denúncias, sugestões e reclamações de forma anônima ou não.</p>
                    </div>
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome:</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Digite seu nome">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Assunto:</label>
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Assunto">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="label">Motivo:</label>
                                    <select name="label" id="labl" class="form-control">
                                        <option value="">Selecione o motivo</option>
                                        <option value="">Reclamação</option>
                                        <option value="">Elogio</option>
                                        <option value="">Sugestão</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Mensagem</label>
                                    <textarea name="message" id="message" rows="5" class="form-control" placeholder="Digite sua mensagem"></textarea>
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
                            <p>Telefones</p>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-phone"></i>
                                        +55 11 1234-5678
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-phone"></i>
                                        +55 11 1234-5678
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <p>Whatsapp</p>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        +55 11 91234-5678
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <p>Email:</p>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-envelope"></i>
                                        contato@mapslink.com
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <p>Horários de funcionamento</p>
                                <li>
                                    <a href="#">Seg à Sexta - 09:00 até 18:00</a>
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
