@extends('layouts.main')

@section('title','Health Info')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

<section id="welcome">
    <header>
        <p></p>        
    </header>

    <div id="imageLogo">
        <img src="img/events/logo3.png" alt="Logo do site, Health Info." height="250"  >  
    </div>
    
    <div id="search-container" class="col-md-12">
  
        <form action="/" method="GET">
        
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bx bx-search"></i></span>
                <input type="text" id="search" name="search" class="form-control"  placeholder="Tem alguma pergunta? Pergunte agora">
              </div>
        </form>
        <p></p>

    </div>

    <footer>
        <div id="footerImagens">
            <p>Para mais informações entre em contato com os desenvolvedores 
                <a href="https://linkr.bio/HealthInfo" target="_blank"><img src="img\events\icon-flickr.png" height="25" alt="Icone para contato"></a> 
            </p>
        </div>
    </footer>
</section>

    <script>
        var search = "{{ $search }}";

        if(search){
            Swal.fire({
                icon:'warning',
                title:'Não foi possivel encontar essa pesquisa: {{ $search }}!'
            }).then(function(e) {window.location='/'});
        }

        console.log(search);

    </script>    
@endsection
