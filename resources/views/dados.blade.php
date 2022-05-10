@extends('layouts.main')

@section('title', 'Health Info')


@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <header>

        <div class="md-3" id="divPais">
            <label>
                FILTROS
                <a class="float-start" href="\" id="img-home">
                    <img src="img/events/icons-home.svg" height="30" alt="Icone para home">
                </a>
            </label>
            <label>
                <select name="Regioes" size="1" width="180" tabindex="1">
                    <option value="-1" selected>Selecione uma Região</option>
                    @foreach ($regiao as $reg)
                        <option value="{{ $reg->Regiao }}">{{ $reg->Nome }}</option>
                    @endforeach
                    <option value="Distrito Federal">Distrito Federal</option>
                </select>

                <select name="Capitais" size="1" width="195" tabindex="1">
                    <option value="-1" selected>Selecione uma Capital</option>
                    @foreach ($capitais as $cap)
                        <option data-Regioes="{{ $cap->Estado }}" value="{{ $cap->Nome_Capitais }}">
                            {{ $cap->Nome_Capitais }}</option>
                    @endforeach
                </select>

                <select name="TipoTabela">
                    <option value="-1" selected>Selecione um tipo de dado a ser filtrado</option>
                    @foreach ($dados as $dado)
                        <option value="{{ $dado->id }}">{{ $dado->nome_tabelas }}</option>
                    @endforeach
                </select>

                <button type="button" class="btn btn-outline-dark" id="botaoPesquisar"><i class='bx bx-search'
                        style='color:#ffffff'></i></button>
            </label>
        </div>
    </header>




    
    <head>
    
    <!-- Chart's container -->
    <div id="chart" style="height: 300px;"></div>
    <!-- Charting library -->
    
               
    </body>
    
        <footer>
            <div id="footerImagens">
                <p>Para mais informações entre em contato com os desenvolvedores
                    <a href="https://linkr.bio/HealthInfo" target="_blank"><img src="img\events\icon-flickr.png" height="25"
                            alt="Icone para contato"></a>
                </p>
            </div>
        </footer>


        <script type="text/javascript">
            
            $("#botaoPesquisar").on('click', function() {
                $("#chart").hide();
                //alert("Funcionou");
            });

            var capitais = $('select[name="Capitais"] option');
            $('select[name="Regioes"]').on('change', function() {
                var regioes = this.value;
                var novoSelect = capitais.filter(function() {
                    return $(this).data('regioes') == regioes;
                });
                $('select[name="Capitais"]').html(novoSelect);
            });

        </script>
        
        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
        <!-- Your application script -->
        <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('sample_chart')",
        });
        </script>



    @endsection
