@if (count($subcategories) >= 1)
<table class="table table-striped">
    <thead>
        <tr>
            <th style="width: 82px"></th>
            <th style="width: 10px">#</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Criado em</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp
        @foreach ($subcategories as $subcategory)
        <tr>
            <td>
                <div class="table-icons">
                    <a class="btn btn-default" alt="Editar" title="Editar" href="{{ route('dashboard-subcategory-edit', ['id' => $subcategory['id']]) }}">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-md-{{ $subcategory['id'] }}">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </td>
            <td>{{ $i++ }}</td>
            <td>{{ $subcategory['name'] }}</td>
            <td>{{ $subcategory['category_name'] }}</td>
            <td>{{ $subcategory['created_at'] }}</td>
        </tr>
        <div class="modal fade" id="modal-md-{{ $subcategory['id'] }}">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger"><strong>Atenção!</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Quer mesmo apagar a subcategoria <strong>{{ $subcategory['name'] }}</strong>?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <a href="{{ route('dashboard-subcategory-destroy', ['id' => $subcategory['id']]) }}" class="btn btn-danger">Apagar</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        @endforeach
    </tbody>
</table>
<div class="link-area" style="margin: 15px 15px -15px 15px">
    {{ $subcategories->links('pagination::bootstrap-4') }}
</div>
@else
<h5 class="p-4 m-2">Não há subcategorias cadastrada</h5>
@endif
