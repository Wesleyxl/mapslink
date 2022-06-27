<div class="container">
    @if(count($companies) >= 1)
        @foreach ($companies as $company)
        <div class="row">
            <div class="company-card">
                <div class="title">
                    <div class="img">
                        <img src="{{ URL::to($company['img']) }}" alt="">
                    </div>
                    <div class="name">
                        <h3>{{ $company['name'] }}</h3>
                        <p><strong>Descrição: </strong> {{ $company['description'] }}</p>
                    </div>
                </div>
                <hr>
                <div class="btn-area">
                    <a target="_blank" href="{{ $company['map'] }}" class="btn btn-primary">Visualizar no mapa</a>
                </div>
            </div>
        </div>
        @endforeach
    @else
    <div class="row">
        <div class="company-card">
            <P>Nenhuma empresa encontrada</P>
        </div>
    @endif
</div>
