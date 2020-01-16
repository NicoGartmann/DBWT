@extends('app')
@section('title','Start')
@section('content')
    <main>
        <div class="row">
            <div class="col-12 rand">
                <img src="../image/mensa1.gif" class="img-fluid" alt="Mensa Bild" id="Foto">
            </div>
        </div>

        <div class="row head">
            <div class="col-3">
                <p>Der Dienst e-Mensa ist noch beta. Sie können bereits <a href="/produkte">Mahlzeiten</a> durchstöbern, aber noch nicht bestellen.</p>
            </div>
            <div class="col-7">
                <h2>Leckere Gerichte vorbestellen</h2>
                <p>... und gemeinsam mit Kommilitonen und Freunden genießen.</p>
            </div>
            <div class="col-2">
                <div class="row but">
                    <div class="col-12">
                        <a href="/registrieren" id="registrieren" type="submit" class="btn btn-outline-dark"><i class="far fa-hand-point-right"></i>Registrieren </a>
                    </div>
                </div>
                <div class="row but">
                    <div class="col-12">
                        <a href="/login" id="anmelden" type="submit" class="btn btn-outline-dark"><i class="fas fa-sign-in-alt"></i> Anmelden</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p class="left">Registrieren Sie sich <a href="/registrieren">hier</a>, um über die Veröffentlichung des Dienstes per Mail informiert zu werden.</p>
            </div>
            <div class="col-9">
                <img src="../image/mensa2.jpg" class="img-fluid bot" alt="Essen" id="Foto2">
            </div>
        </div>
    </main>
@endsection
