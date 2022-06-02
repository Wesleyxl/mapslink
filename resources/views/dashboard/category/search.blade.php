@if (count($categories) >= 1)
<table class="table table-striped">
    <thead>
        <tr>
            <th style="width: 82px"></th>
            <th style="width: 10px">#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Criado em</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp
        @foreach ($categories as $category)
        <tr>
            <td>
                <div class="table-icons">
                    <a class="btn btn-default" alt="Editar" title="Editar" href="{{ route('dashboard-category-edit', ['id' => $category['id']]) }}">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-md-{{ $category['id'] }}">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </td>
            <td>{{ $i++ }}</td>
            <td>{{ $category['name'] }}</td>
            <td>{{ $category['description'] }}</td>
            <td>{{ $category['created_at'] }}</td>
        </tr>
        <div class="modal fade" id="modal-md-{{ $category['id'] }}">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger"><strong>Atenção!</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Quer mesmo apagar a categoria <strong>{{ $category['name'] }}</strong>?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <a href="{{ route('dashboard-category-destroy', ['id' => $category['id']]) }}" class="btn btn-danger">Apagar</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        @endforeach
    </tbody>
    {{ $categories->links() }}
</table>
@else
<h5 class="p-4 m-2">Não há categorias cadastrada</h5>
@endif
