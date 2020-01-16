@extends('app')
@section('title','Details')
@section('content')

    <main>
        <div class="row head">
            <div class="col-2">

            </div>
            <div class="col-10">
                <h2>Details für {{ $detailMahl->Name }}</h2>
            </div>
        </div>
        <div class="row head">
            <div class="col-2 card">
                <div class="card-body">
                    {{view('LoginForm')}}
                </div>
            </div>
            <div class="col-7">

                <img alt="{{$bildMahl->AltText}}" src="data:image/gif;base64,{{ base64_encode($bildMahl->Binärdaten) }}" width="205" height="206">
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            @if(Session::has('angemeldet'))
                                {{ Session::get('Rolle')}}-Preis
                            @else
                                Gast-Preis
                            @endif
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h3>

                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-outline-dark"><i class="fas fa-utensils"></i>Vorbestellen</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row head">
            <div class="col-2">
                @if(!Session::has('angemeldet'))
                    <p>Melden Sie sich jetzt an, um die wirklich viel günstigeren Preise für Mitarbeiter oder Studenten zu sehen.</p>
                @endif

            </div>
            <div class="col-8">
                <div class="tabbed">
                    <input checked="checked" id="tab1" type="radio" name="tabs" />
                    <input id="tab2" type="radio" name="tabs" />
                    <input id="tab3" type="radio" name="tabs" />
                    <input id="tab4" type="radio" name="tabs" />

                    <nav>
                        <label for="tab1">Beschreibung</label>
                        <label for="tab2">Zutaten</label>
                        <label for="tab3">Bewertung schreiben</label>
                        <label for="tab4">Kommentare</label>
                    </nav>

                    <figure>
                        <div class="tab1">
                            {{$detailMahl->Beschreibung}}
                        </div>
                        <div class="tab2">
                            <ul>
                                @foreach( $zutatMahl as $zut)
                                    <li>{{ $zut->Name }}</li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="tab3">
                            @if(Session::has('angemeldet') && Session::get('Rolle') == 'Student')
                                <form method="POST">
                                    @csrf
                                    <fieldset>
                                        <legend hidden>Hidden</legend>
                                        <label for="mahlzeit" hidden>Mahlzeit</label>
                                        <input type="hidden" id="mid" name="mid" value="{{$detailMahl->ID}}"/>
                                        <label for="benutzer" hidden>Benutzername</label>
                                        <input type="hidden" id="benutzer" name="benutzer" value="{{Session::get('BenID')}}">
                                    </fieldset>
                                    <fieldset>
                                        <legend hidden>Bewertung</legend>
                                        <label for="bewertung">Bewertung</label>
                                        <input required id="bewertung" type="number" min="1" max="10" name="bewertung">
                                        <br>
                                        <label for="bemerkung">Bemerkung</label>
                                        <textarea id="bemerkung" cols="15" rows="3" placeholder="Geben Sie eine Bemerkung ein, wenn sie möchten ..." name="bemerkung"></textarea>
                                    </fieldset>
                                    <button type="submit" class="btn btn-outline-dark">Bewertung absenden</button>
                                </form>
                            @else
                                <p>Melden Sie sich bitte an, um Kommentare zu verfassen</p>
                            @endif
                        </div>
                        <div class="tab4">
                            <p><b>Die letzten fünf Bewertungen für {{$detailMahl->Name}}</b> <small>Durchschnitt: {{$durchschnitt}}</small></p>
                            <ul>
                                @foreach($kommentare as $kom)
                                    <li>
                                        <b>{{$kom->Nutzername}}</b> <i>{{$kom->Bemerkung}}</i><br>
                                        <small>{{$kom->Zeitpunkt}}</small>
                                        @for ($i = 0; $i < intval($kom->Bewertung); $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </main>

@endsection
