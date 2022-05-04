@extends('layouts.main')

@section('title','Health Info')

@section('content')

    <header>    
        <div class="md-3" id="divPais">
            <label>FILTROS 
                <select name="Paises">
                    <option value="-1" selected>Selecione um Pais</option>
                    <option value="1">Brasil</option>
                </select>

                <select name="Regioes">
                    <option value="-1" selected>Selecione uma Região</option>
                    <option value="1">SP</option>
                </select>

                <select name="Capitais">
                    <option value="-1" selected>Selecione uma Capital</option>
                    <option value="1">São Paulo</option>
                </select>
            </label> 
        </div>
    </header>
        
    
    <div id="events-container" class="col-md-12">
        <div id="cards-container" class="row">
            <p><a button type="button" id="voltar" class="btn btn-dark" a href="/" >Voltar para página inicial</a></p>
        </div>
    </div>

    <footer>

    </footer>
    
    
@endsection

