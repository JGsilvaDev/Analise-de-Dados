@extends('layouts.main')

@section('title','HDC Events')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <header>
        <p></p>
    </header>

    <div id="search-container" class="col-md-12">
        <h1>Nome do produto</h1>
        <form action="/" method="GET">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bx bx-search"></i></span>
                <input type="text" id="search" name="search" class="form-control"  placeholder="Tem alguma pergunta? Pergunte agora">
              </div>

            <p><a button type="button" id="pesquisar" class="btn btn-dark">Procurar</a></p>
        </form>
        <p></p>

    </div>
    <div id="events-container" class="col-md-12">

       @if($search)
        <h2>Buscando por: {{ $search }} </h2>
       @endif
        <div id="cards-container" class="row">

            @if($search)
                <p>Não foi possivel essa pesquisa com {{ $search }}!</p>
                <p><a button type="button" id="voltar" class="btn btn-dark" a href="/" >Voltar para página inicial</a></p>                                                                                            </p>
            @endif

        </div>
    </div>

    <footer>
         <p>Para mais informações entre em contato com noiz</p>  
    </footer>

    <script>

        let botaoAbrirModal = document.getElementById('pesquisar');

        let search1 =  $('#search').val();
        
            botaoAbrirModal.addEventListener('click', e => {   

                if(search1){
                    $("#modalPesquisar").dialog({
                        autoOpen: true,
                        resizable: false,
                        width: 700,
                        height: 600,
                        modal: true,
                        buttons: {
                            "Selecionar":function(){

                                var check = $("#formCheckBox").submit();

                                window.location.href = `/${search1}?filtro1=`+$check+`&filtro2=ertf`;

                            },
                            "Voltar":function(){
                                $(this).dialog("close");
                                
                                
                            }
                            
                        }
                    })

                }else{
                    console.log("NAo funciona");
                }

                        
                }) 
              

    </script>

    
       
        <div id="modalPesquisar" title="Filtros" style="display:none">
            <form action="/dados" method="get" id="formCheckBox">
            @csrf
                <label>Informe como quer filtrar os dados: </label>
                    <label>
                        <div class="form-row">
                            <input type="checkbox" name="filtro[]" id="pais" value="Pais"> País 
                        </div>
                    </label>

                    <label>
                        <div class="form-row">
                            <input type="checkbox" name="filtro[]" id="estado" value="Estado"> Estado 
                        </div>
                    </label>

                    <label>
                        <div class="form-row">
                            <input type="checkbox" name="filtro[]" id="cidade" value="Cidade"> Cidade 
                        </div>
                    </label> 
            </form>

            <div class="mt-3" id="divPais">
                <label>Infome qual pais irá selecionar: </label>
                <select name="Paises">
                    <option value="-1" selected>Selecione um Pais</option>
                    <option value="1">Brasil</option>
                  </select>
            </div>

            <div class="mt-3" id="divEstado">
                <label>Infome qual estado irá selecionar: </label>
                <select name="Paises">
                    <option value="-1" selected>Selecione um Estado</option>
                    <option value="1">SP</option>
                  </select>
            </div>

            <div class="mt-3" id="divCidade">
                <label>Infome qual cidade irá selecionar: </label>
                <select name="Paises">
                    <option value="-1" selected>Selecione uma cidade</option>
                    <option value="1">Pinda</option>
                  </select>
            </div>


        </div>
    

    <script>
        $("#divPais").hide();
        $("#divEstado").hide();
        $("#divCidade").hide();

        $('#pais').change(function() {
            if ($("#pais").is(':checked')) {
                $('#estado').attr('disabled', true)
                $('#cidade').attr('disabled', true)
                $("#divPais").show();
            } else {
                $('#estado').removeAttr('disabled')
                $('#cidade').removeAttr('disabled')
                $("#divPais").hide();
            }
            
        });

        $('#estado').change(function() {
            if ($("#estado").is(':checked')) {
                $('#pais').attr('disabled', true)
                $('#cidade').attr('disabled', true)
                $("#divEstado").show();
            } else {
                $('#pais').removeAttr('disabled')
                $('#cidade').removeAttr('disabled')
                $("#divEstado").hide();
            }
        });

        $('#cidade').change(function() {
            if ($("#cidade").is(':checked')) {
                $('#pais').attr('disabled', true)
                $('#estado').attr('disabled', true)
                $("#divCidade").show();
            } else {
                $('#pais').removeAttr('disabled')
                $('#estado').removeAttr('disabled')
                $("#divCidade").hide();
            }
        });
    </script>

@endsection

    
