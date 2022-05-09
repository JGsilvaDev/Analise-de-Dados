@extends('layouts.main')

@section('title','Health Info')


@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <header>    
         
        <div class="md-3" id="divPais">
            <label>
                <a href="\" id="img-home" target="_blank"><img src="img\events\home-regular-24 -white.png" height="25"  alt="Icone para home"></a>
                FILTROS               
                <select name="Regioes" >
                    <option value="-1" selected>Selecione uma Região</option>
                    @foreach ($regiao as $reg )
                        <option value="{{ $reg->id }}">{{ $reg->Nome }}</option>   
                    @endforeach 
                </select>

                <select name="Capitais" >
                    <option value="-1" selected>Selecione uma Capital</option>
                    @foreach ($capitais as $cap )
                        <option data-Regioes="{{ $cap->Estado }}" value="{{ $cap->id }}">{{ $cap->Nome_Capitais }}</option>
                    @endforeach
                </select>

                <button type="button" class="btn btn-outline-dark" id="botaoPesquisar"><i class='bx bx-search' style='color:#ffffff'></i></button>
            </label> 
        </div>
    </header>

    <head>
        <!--Outro codigo-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current');   // Don't need to specify chart libraries!
          google.charts.setOnLoadCallback(drawVisualization);
    
          function drawVisualization() {
            var wrapper = new google.visualization.ChartWrapper({
              chartType: 'ColumnChart',
              dataTable: [['', 'Exemplo 1', 'Exemplo 2', 'Exemplo 3', 'Exemplo 4', 'Exemplo 5', 'Exemplo 6'],
                          ['', 700, 300, 400, 500, 600, 800]],
              options: {'title': 'Exemplo 2'},
              containerId: 'vis_div'
            });
            wrapper.draw();
          }
        </script>
        <!--Fim do codigo-->
    
         <!--Load the AJAX API-->
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <script type="text/javascript">
          var data;
          var chart;
     
           // Load the Visualization API and the piechart package.
           google.charts.load('current', {'packages':['corechart']});
     
           // Set a callback to run when the Google Visualization API is loaded.
           google.charts.setOnLoadCallback(drawChart);
     
           // Callback that creates and populates a data table,
           // instantiates the pie chart, passes in the data and
           // draws it.
           function drawChart() {
     
             // Create our data table.
             data = new google.visualization.DataTable();
             data.addColumn('string', 'Topping');
             data.addColumn('number', 'Slices');
             data.addRows([
               ['Exemplo 1', 3],
               ['Exemplo 2', 1],
               ['Exemplo 3', 1],
               ['Exemplo 4', 1],
               ['Exemplo 5', 2]
             ]);
     
             // Set chart options
             var options = {'title':'Exemplo 1',
                            'width':400,
                            'height':300};
     
             // Instantiate and draw our chart, passing in some options.
             chart = new google.visualization.PieChart(document.getElementById('chart_div'));
             google.visualization.events.addListener(chart, 'select', selectHandler);
             chart.draw(data, options);
           }
     
           function selectHandler() {
             var selectedItem = chart.getSelection()[0];
             var value = data.getValue(selectedItem.row, 0);
             alert('The user selected ' + value);
           }
         </script>
       <!--Fim de um codigo-->

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TESTE</title>
    </head>

    <body>
    <div class="container" id="graficosExemplo">
        
            <!--Div that will hold the pie chart-->
            <h1><div id="chart_div" style="width:400; height:300"></div></h1>
        
            <!--Outro codigo-->
            <div id="vis_div"  style="width: 600px; height: 400px;"></div>

    </div>
    </body>
        <footer>
            <div id="footerImagens">
                <p>Para mais informações entre em contato com os desenvolvedores 
                    <a href="https://linkr.bio/HealthInfo" target="_blank"><img src="img\events\icon-flickr.png" height="25" alt="Icone para contato"></a> 
                </p>
            </div>
        </footer>
    

    <script  type="text/javascript">

        $("#botaoPesquisar").on('click',function(){
            $("#graficosExemplo").hide();
            //alert("Funcionou");
        });
        
        var capitais = $('select[name="Capitais"] option');  
        $('select[name="Regioes"]').on('change',function(){
            var regioes = this.value();
            var novoSelect = capitais.filter(function(){
                return $(this).data('Regioes') == regioes;
            });
            $('select[name="Capitais"]').html(novoSelect);
            alert("deu certo");
        });


        

    </script>
    
    
    
@endsection

