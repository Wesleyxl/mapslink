@extends('layouts.dashboard')
@section('title', 'Dashboard - Contato')
@section('ul-contact', 'menu-open')
@section('li-contact', 'active')
@section('a-contact', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/css/layout.css') }}">
<!-- end links -->

@if (session('success'))
<script>
    var click = 0;
    setInterval(() => {
        if (click == 0) {
            $("#modal-success").trigger('click');
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
                <h1>Emails</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/adm">Home</a></li>
                    <li class="breadcrumb-item active">Emails</li>
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
                {{-- <a href="{{ route('dashboard-email-create') }}" class="btn btn-primary btn-block mb-3">Enviar</a> --}}

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
                                <a href="{{ route('dashboard-email') }}" class="nav-link" style="color: #007bff;">
                                    <i class="fas fa-inbox"></i> Caixa de entrada
                                    <span class="badge bg-primary float-right">{{ count($unreads) }}</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('dashboard-email-send') }}" class="nav-link">
                                    <i class="far fa-envelope"></i> enviados
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('dashboard-email-sketch') }}" class="nav-link">
                                    <i class="far fa-file-alt"></i> rascunhos
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('dashboard-email-trash') }}" class="nav-link">
                                    <i class="far fa-trash-alt"></i> lixeira
                                </a>
                            </li> --}}
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
                        <h3 class="card-title">Caixa de entrada</h3>

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

                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @if(count($unreads) > 0)
                                    @foreach ($unreads as $unread)
                                    <tr>
                                        <td>
                                            <div class="icheck-primary">
                                                <input type="checkbox" value="" id="check{{ $unread['id'] }}">
                                                <label for="check{{ $unread['id'] }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            @if($unread['label'] == 'service')
                                            <i class="fa-solid fa-circle text-success"></i>
                                            @elseif ($unread['label'] == 'compliment')
                                            <i class="fa-solid fa-circle text-primary"></i>
                                            @elseif ($unread['label'] == 'complaint')
                                            <i class="fa-solid fa-circle text-danger"></i>
                                            @else
                                            <i class="fa-solid fa-circle text-secondary"></i>
                                            @endif
                                            <i class="fas fa-star text-warning" style="margin-left: 5px"></i>
                                        </td>
                                        <td class="mailbox-name"><a href="{{ route('dashboard-email-show', ['id' => $unread['id']]) }}">{{ $unread['from'] }}</a></td>
                                        <td class="mailbox-subject"><b>Assunto</b> - {{ $unread['subject'] }}...
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">5 mins ago</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if (count($emails) > 0)
                                    @foreach ($emails as $email)
                                    <tr>
                                        <td>
                                            <div class="icheck-primary">
                                                <input type="checkbox" value="" id="check{{ $email['id'] }}">
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
                                        <td class="mailbox-name"><a href="{{ route('dashboard-email-show', ['id' => $email['id']]) }}">{{ $email['from'] }}</a></td>
                                        <td class="mailbox-subject"><b>Assunto</b> - {{ $email['subject'] }}...
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">5 mins ago</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    {{-- <th>Nenhum email foi encontrado</th> --}}
                                    @endif
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->

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

<!-- modal success -->
<button type="button" id="modal-success" style="opacity: 0" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel"><strong>Sucesso!</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ session('success') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

@endsection
