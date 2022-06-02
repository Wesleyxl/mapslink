@extends('layouts.dashboard')
@section('title', 'Dashboard - Empresa')
@section('ul-company', 'menu-open')
@section('li-company', 'active')
@section('a-company', 'active')
@section('content')

<!-- links -->
<link rel="stylesheet" href="{{ URL::to('/public/assets/dashboard/css/layout.css') }}">
<!-- end links -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <a href="{{ route('dashboard-company') }}" class="breadcrumb-item">Empresas</a>
                    <li class="breadcrumb-item active">editar</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content company">
    <div class="container-fluid">
        <div class="card card-secondary">
            <div class="card-header">
                <h4>Preencha todos os campos corretamente</h4>
            </div>
            <div class="card-body">
                <form  method="POST" enctype="multipart/form-data" action="{{ route('dashboard-company-update', ['id' => $company['id']]) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome da empresa</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nome da empresa" value="{{ $company['name'] }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email da empresa</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email@empresa.com" value="{{ $company['email'] }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" id="website" name="website" class="form-control @error('website') is-invalid @enderror" placeholder="www.website.com.br" value="{{ $company['website'] }}">
                                @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="(11) 1234-5678" onkeypress="$(this).mask('(00) 0000-0000')" value="{{ $company['phone'] }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cel">Celular</label>
                                <input type="text" name="cellphone" id="cellphone" class="form-control @error('cellphone') is-invalid @enderror" placeholder="(11) 91234-5678" onkeypress="$(this).mask('(00) 00000-0000')" value="{{ $company['cellphone'] }}">
                                @error('cellphone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">Código de identificação</label>
                                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" placeholder="Ex: 1558" value="{{ $company['code'] }}">
                                @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descrição da empresa" rows="5">{{ $company['description'] }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="map">Mapa</label>
                                <textarea name="map" id="map" rows="5" class="form-control @error('map') is-invalid @enderror" placeholder="Cole o mapa aqui">{{ $company['map'] }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" id="cep" class="form-control @error('cep') is-invalid @enderror" placeholder="Digite um CEP" onkeypress="$(this).mask('00000-000')" value="{{ $company['cep'] }}">
                                @error('cep')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="uf">Estado</label>
                                <select name="uf" id="uf" class="form-control @error('uf') is-invalid @enderror">
                                    <option value="">Selecione um Estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP" id="none">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                                @error('uf')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">Cidade</label>
                                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="Digite uma cidade" value="{{ $company['city'] }}">
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="neighborhood">Bairro</label>
                                <input type="text" name="neighborhood" id="neighborhood" class="form-control @error('neighborhood') is-invalid @enderror" placeholder="Digite o bairro" value="{{ $company['neighborhood'] }}">
                                @error('neighborhood')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="street">Logradouro</label>
                                <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror" placeholder="Digite o endereço" value="{{ $company['street'] }}">
                                @error('street')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="number">Numero:</label>
                                <input type="number" id="number" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="000" value="{{ $company['number'] }}">
                                @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group d-flex flex-column">
                                <label for="search-cep">Buscar CEP</label>
                                <button type="button" class="btn btn-secondary" style="max-width: 100px" id="search-cep">
                                    Buscar
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row" style="margin: 10px 0 40px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="img">Selecione uma image</label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-area">
                                <img src="{{ URL::to($company['img']) }}" name="img" alt="preview" id="preview">
                            </div>
                        </div>
                    </div>


                    <div class="btn-area d-flex justify-content-between">
                        <a href="{{ route('dashboard-company') }}" class="btn btn-primary">Voltar</a>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>

</section>

<script>
    var UF = '{{ $company["uf"] }}'
    $("#uf > option").each(function () {
        if (this.value === UF) {
            $(this).prop("selected", true);
        }
    });

    // search cep
    $("#search-cep").click(function () {
        var cep = $("#cep")
        .val()
        .replace(/[^0-9]/, "");
        // console.log(cep);

        if (cep) {
            var url = "https://viacep.com.br/ws/" + cep + "/json/";
            $.ajax({
                url: url,
                dataType: "jsonp",
                crossDomain: true,
                contentType: "application/json",
                success: function (json) {
                    if (json.logradouro) {
                        $("input[name=street]").val(json.logradouro);
                        $("input[name=neighborhood]").val(json.bairro);
                        $("input[name=city]").val(json.localidade);

                        $("#uf > option").each(function () {
                            if (this.value === json.uf) {
                                $(this).prop("selected", true);
                            }
                        });
                    }
                },
            });
        }
    });


    function readImage() {
        if (this.files && this.files[0]) {
            var file = new FileReader();
            file.onload = function(e) {
                document.getElementById("preview").src = e.target.result;
            };
            file.readAsDataURL(this.files[0]);
        }
    }
    document.getElementById("img").addEventListener("change", readImage, false);
</script>

@endsection
