@extends('layouts.main')

@section('title','HDC Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Pesquisar</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar">
        </form>
        <p></p>

    </div>
    <div id="events-container" class="col-md-12">

       @if($search)
        <h2>Buscando por: {{ $search }} </h2>
       @endif
        <div id="cards-container" class="row">

            @if($search)
                <p>Não foi possivel encontrar nenhum evento com {{ $search }}!</p>
                <p><a button type="button" id="voltar" class="btn btn-dark" a href="/" >Voltar para página inicial</a></p>                                                                                            </p>
            @endif
        </div>
    </div>

@endsection
