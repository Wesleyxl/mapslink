@extends('layouts.dashboard')
@section('title', 'Dashboard - Contato')
@section('ul-contact', 'menu-open')
@section('li-contact', 'active')
@section('a-contact-create', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/css/layout.css') }}">
<style>
    body {
        overflow-y: hidden;
    }
</style>
<!-- end links -->

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
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Enviar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/adm">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard-email') }}">Emails</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard-email-sketch') }}">rascunhos</a></li>
                    <li class="breadcrumb-item active">Ler rascunho</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content email">
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
                            <li class="nav-item active">
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
                                <a href="{{ route('dashboard-email-sketch') }}" class="nav-link"  style="color: #007bff;">
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
                        <h3 class="card-title">Rótulos</h3>

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
                        <h3 class="card-title">Rascunho</h3>
                    </div>
                    <!-- /.card-header -->
                    <form method="POST" action="{{ route('dashboard-email-store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <select name="from" id="from" class="form-control @error('from') is-invalid @enderror">
                                    <option value="">Selecione um email</option>
                                    <option value="wesley@gmail.com">wesley@gamil.com</option>
                                </select>
                                @error('from')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="to" name="to" class="form-control @error('to') is-invalid @enderror" placeholder="Para:" value="{{ $email['to'] }}">
                                @error('to')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Assunto:" value="{{ $email['subject'] }}">
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="compose-textarea" class="form-control" style="height: 300px">{{ $email['message'] }}</textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Editar rascunho</button>
                                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button>
                            </div>
                            <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i> Cancelar</button>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
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
    var email = '{{ $email["from"] }}'
    $("#from > option").each(function () {
        if (this.value === email) {
            $(this).prop("selected", true);
        }
    });
</script>
@endsection
