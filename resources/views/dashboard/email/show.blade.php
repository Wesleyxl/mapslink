@extends('layouts.dashboard')
@section('title', 'Dashboard - Contato')
@section('ul-contact', 'menu-open')
@section('li-contact', 'active')
@section('a-contact', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/css/layout.css') }}">
<style>
    body {
        overflow-y: hidden;
    }
</style>
<!-- end links -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Compose</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/adm">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard-email') }}">Emails</a></li>
                    <li class="breadcrumb-item active">Ler</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container" style="max-width: 1300px">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('dashboard-email') }}" class="btn btn-primary btn-block mb-3">Voltar para caixa de entrada</a>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pastas</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard-email') }}" class="nav-link">
                                    <i class="fas fa-inbox"></i> Caixa de entrada
                                    <span class="badge bg-primary float-right">{{ $unread }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard-email-send') }}" class="nav-link">
                                    <i class="far fa-envelope"></i> enviados
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard-email-sketch') }}" class="nav-link">
                                    <i class="far fa-file-alt"></i> rascunhos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard-email-trash') }}" class="nav-link">
                                    <i class="far fa-trash-alt"></i> lixeira
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Labels</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard-email-filter', ['filter' => 'service']) }}" class="nav-link">
                                    <i class="fa-solid fa-circle text-success"></i>
                                    Atendimento
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard-email-filter', ['filter' => 'compliment']) }}" class="nav-link">
                                    <i class="fa-solid fa-circle text-primary"></i>
                                    Elogio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard-email-filter', ['filter' => 'complaint']) }}" class="nav-link">
                                    <i class="fa-solid fa-circle text-danger"></i>
                                    Reclamação
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard-email-filter', ['filter' => 'other']) }}" class="nav-link">
                                    <i class="fa-solid fa-circle text-secondary"></i>
                                    Outros
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Ler email</h3>

                        <div class="card-tools">
                            <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <h5>{{ $email['subject'] }}</h5>
                            <h6>From: {{ $email['from'] }}
                                <span class="mailbox-read-time float-right">{{ $email['created_at'] }}</span></h6>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            {!! $email['message'] !!}
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer -->
                    <div class="card-footer">
                        <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection
