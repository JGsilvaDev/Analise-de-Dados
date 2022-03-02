@extends('layouts.main')

@section('title',' $event->title ')

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }} </p>
                <p class="events-participantes"><ion-ioc name="people-outline"></ion-ioc> {{ count($event->users) }} Participantes</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }}</p>
                @if (!$hasUserJoined)
                <form action="/events/join/{{ $event->id }}" method="POST">
                    @csrf
                    <a href="/events/join/{{ $event->id }}" 
                       class="btn btn-primary" 
                       id="event-submit"
                       onclick="event.preventDefault();
                       this.closest('form').submit();">
                       Confirmar Presença
                    </a>
                </form>
                @else
                    <p class="already-joined-msg">Você já está participando deste evento</p>
                @endif
                <h3>O evento conta com:</h3>
                <ul id="itens-list">
                    @foreach($event->itens as $iten)
                        <li><ion-icon name="play-outline"><span>{{ $iten }}</span></ion-icon></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento:</h3>
                <p clas="event-description">{{ $event->description }}</p>

            </div>
        </div>
    </div>



@endsection
