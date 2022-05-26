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
        <div id="imageLogo">
            <img src="\img\events\novavLogo2.0.jpeg" alt="Logo do site, Health Info." height="100" >  
        </div>      
    </header>

    <div class="container" id="containerCards">
        <div class="row">
            <div class="card" id="card1" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Lixo<button class="btn btn-light float-end btn-sm" id="btnLixo">...</button></h5>
                    <p class="card-text">Esse card contem algo relacionado a lixo</p>
                </div>
                    <a href="/lixo" class="btn btn-dark">Acesse mais</a>
                    <p></p>
            </div>

            <div class="card" id="card2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Densidade de Moradia<button class="btn btn-light float-end btn-sm" id="btnMoradores">...</button></h5>
                    <p class="card-text">Esse card contem algo relacionado a densidade de moradores</p>
                </div>
                    <a href="/moradores" class="btn btn-dark">Acesse mais</a>
                    <p></p>
            </div>

            <div class="card" id="card3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Lixo</h5>
                    <p class="card-text">Esse card contem algo realcionado a lixo</p>     
                </div>
                    <a href="#" class="btn btn-dark">Acesse mais</a>
                    <p></p>
            </div>
        </div>
    </div>

    <div class="container" id="containerCards1">
        <div class="row">
            <div class="card" id="card4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Lixo</h5>
                    <p class="card-text">Esse card contem algo realcionado a lixo</p>
                </div>
                    <a href="/lixo" class="btn btn-dark">Acesse mais</a>
                    <p></p>
            </div>

            <div class="card" id="card5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Lixo</h5>
                    <p class="card-text">Esse card contem algo realcionado a lixo</p>
                </div>
                <a href="/lixo" class="btn btn-dark">Acesse mais</a>
                <p></p>
            </div>

            <div class="card" id="card6" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Lixo</h5>
                    <p class="card-text">Esse card contem algo realcionado a lixo</p>
                </div>
                    <a href="#" class="btn btn-dark">Acesse mais</a>
                    <p></p>
            </div>
        </div>
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

        $('#btnLixo').on('click',function(){
            Swal.fire({
                icon: 'info',
                confirmButtonText: 'Sair',
                title: 'Detalhes: ',
                text: 'Esse tema esta relacionado ao coeficiente e o percentual de lixo coletado'
                })
        })

        $('#btnMoradores').on('click',function(){
            Swal.fire({
                icon: 'info',
                confirmButtonText: 'Sair',
                title: 'Detalhes: ',
                text: 'Esse tema esta relacionado a densidade de moradores por domicilio'
                })
        })



    </script>
@endsection
