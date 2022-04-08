@extends('layouts.main')

@section('title','HDC Events')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <div id="search-container" class="col-md-12">
        <h1>Pesquisar</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar">
            <p><a button type="button" id="pesquisar" class="btn btn-dark">Pesquisar</a></p>
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

    <script>

        let botaoAbrirModal = document.getElementById('pesquisar');

                botaoAbrirModal.addEventListener('click', e => {   

                    $("#modalPesquisar").dialog({
                        autoOpen: true,
                        resizable: false,
                        width: 700,
                        height: 600,
                        modal: true,
                        buttons: {
                            "Selecionar":function(){
                                let search1 =  $('#search').val();

                                window.location.href = `/${search1}?filtro1=abcd&filtro2=ertf`;
                                
                            },
                            "Voltar":function(){
                                $(this).dialog("close");   
                            }
                            
                        }
                    })
                } 
                
                )

    </script>

    <div id="modalPesquisar" title="Filtros" style="display:none">
        <label for="filtro">Informe como quer filtrar os dados: </label>
            <select name="" id="selectFiltro" style="width:100%;margin-top:2px;margin-bottom:8px">
                <option value="-1" id="filtro"> -- Escolha uma opção --</option>
                <option value="1" id="filtroPais">Pais</option>
                <option value="2" id="filtroEstado">Estado</option>
                <option value="3" id="filtroCidade">Cidade</option>
            </select>    
    </div>


@endsection

    
