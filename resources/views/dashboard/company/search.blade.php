@if (count($companies) >= 1)
<table class="table table-striped">
    <thead>
        <tr>
            <th style="width: 82px"></th>
            <th style="width: 10px">#</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Views</th>
            <th>Nota</th>
            <th>Criado em</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp
        @foreach ($companies as $company)
        <tr>
            <td>
                <div class="table-icons">
                    <a class="btn btn-default" alt="Editar" title="Editar" href="{{ route('dashboard-company-edit', ['id' => $company['id']]) }}">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-md-{{ $company['id'] }}">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </td>
            <td>{{ $i++ }}</td>
            <td>#{{ $company['code'] }}</td>
            <td>{{ $company['name'] }}</td>
            <td>{{ $company['category_name'] }}</td>
            <td>{{ $company['views'] }}</td>
            <td>{{ $company['stars'] }}</td>
            <td>{{ $company['created_at'] }}</td>
        </tr>
        <div class="modal fade" id="modal-md-{{ $company['id'] }}">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger"><strong>Atenção!</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Quer mesmo apagar a empresa <strong>{{ $company['name'] }}</strong>?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <a href="{{ route('dashboard-company-destroy', ['id' => $company['id']]) }}" class="btn btn-danger">Apagar</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        @endforeach
    </tbody>
</table>
@else
<h5 class="p-4 m-2">Não há empresas cadastrada de acordo com sua busca</h5>
@endif
