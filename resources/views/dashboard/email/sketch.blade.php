@extends('layouts.dashboard')
@section('title', 'Dashboard - Contato')
@section('ul-contact', 'menu-open')
@section('li-contact', 'active')
@section('a-contact', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/css/layout.css') }}">
<!-- end links -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Rascunhos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/adm">Home</a></li>
                    <li class="breadcrumb-item"><a href="/adm/email">Emails</a></li>
                    <li class="breadcrumb-item active">Rascunhos</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content email-area">
    <div class="container" style="max-width: 1300px">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('dashboard-email-create') }}" class="btn btn-primary btn-block mb-3">Enviar</a>

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
                                <a href="{{ route('dashboard-email-sketch') }}" class="nav-link" style="color: #007bff;">
                                    <i class="far fa-file-alt"></i> rascunhos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
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
                        <h3 class="card-title">Rótulos</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
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
                                    <i class="fa-solid fa-circle text-warning"></i>
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
                        <h3 class="card-title">Rascunhos</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-controls">
                            @if(count($emails) > 0)
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-share"></i>
                                </button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <div class="float-right">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.float-right -->
                            @endif
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @if(count($emails) > 0)
                                        @foreach ($emails as $email)
                                        <tr>
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="{{ $email['oi'] }}" id="check{{ $email['id'] }}">
                                                    <label for="check{{ $email['id'] }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                @if($email['label'] == 'service')
                                                    <i class="fa-solid fa-circle text-success"></i>
                                                @elseif ($email['label'] == 'compliment')
                                                    <i class="fa-solid fa-circle text-primary"></i>
                                                @elseif ($email['label'] == 'complaint')
                                                    <i class="fa-solid fa-circle text-danger"></i>
                                                @else
                                                    <i class="fa-solid fa-circle text-secondary"></i>
                                                @endif
                                            </td>
                                            <td class="mailbox-name"><a href="{{ route('dashboard-email-edit', ['id' => $email['id']]) }}">{{ $email['from'] }}</a></td>
                                            <td class="mailbox-subject"><b>Assunto</b> - {{ $email['subject'] }}...
                                            </td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date">5 mins ago</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer p-0">
                        <div class="mailbox-controls">
                            @if(count($emails))
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                    <i class="far fa-square"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                                <div class="float-right">
                                    1-50/200
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->

@endsection
