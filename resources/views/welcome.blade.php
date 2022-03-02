@extends('layouts.main')

@section('title','HDC Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Pesquisar</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">   
        </form>    
    </div>
    <div id="events-container" class="col-md-12">
       @if($search)
        <h2>Buscando por: {{ $search }} </h2> 
       @endif
        <div id="cards-container" class="row">
            @if(count($events) == 0 && $search)
                <p>Não foi possivel encontrar nenhum evento com {{ $search }}! <a href="/">Voltar a pagina principal</a></p>
            @elseif(count($events) == 0)
                <p>Não há eventos disponiveis</p>
            @endif
        </div>
    </div>

@endsection
