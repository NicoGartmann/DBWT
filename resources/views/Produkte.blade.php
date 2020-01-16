@extends('app')
@section('title','Produkte')
@section('content')
    <main>
        <div class="row head">
            <div class="col-3">

            </div>
            <div class="col-9">
                <h2>Verfügbare Speisen</h2>
            </div>
        </div>
        <div class="row head">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <form action="/produkte" method="get">
                            <fieldset class="form-group">
                                <legend>Speiseliste filtern</legend>
                                <label for="kategorie-dropdown">Kategorien</label>
                                <select class="form-control" name="kat" id="kategorie-dropdown">
                                    @foreach($kategorien['oberkat'] as $ober)
                                        <optgroup label="{{$ober['Bezeichnung']}}">
                                            @foreach($ober['unterkat'] as $unterkat)
                                                @if($filter['KatID'] == $unterkat['ID'])
                                                    <option value="{{$unterkat['ID']}}" selected>{{$unterkat['Bezeichnung']}}</option>
                                                @else
                                                    <option value="{{$unterkat['ID']}}">{{$unterkat['Bezeichnung']}}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="checks">
                                <div class="form-check">
                                    @if(isset($filter['Verfügbar']))
                                        <input class="form-check-input" type="checkbox" name="avail" value="1" id="avail" checked>
                                        <label class="form-check-label" for="avail">nur verfügbare</label>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="avail" value="1" id="avail">
                                        <label class="form-check-label" for="avail">nur verfügbare</label>
                                    @endif
                                </div>
                                <div class="form-check">
                                    @if(isset($filter['Vegetarisch']))
                                        <input class="form-check-input" type="checkbox" name="veggie" value="1" id="vegetarisch" checked>
                                        <label class="form-check-label" for="vegetarisch">nur vegetarische</label>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="veggie" value="1" id="vegetarisch">
                                        <label class="form-check-label" for="vegetarisch">nur vegetarische</label>
                                    @endif
                                </div>
                                <div class="form-check">
                                    @if(isset($filter['Vegan']))
                                        <input class="form-check-input" type="checkbox" name="vegan" value="1" id="vegan" checked>
                                        <label class="form-check-label" for="vegan">nur vegane</label>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="vegan" value="1" id="vegan">
                                        <label class="form-check-label" for="vegan">nur vegane</label>
                                    @endif
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-outline-dark">Speisen filtern</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="row pics">
                    @if(!$mahlzeiten->isEmpty())
                        @foreach($mahlzeiten as $mahlzeit)
                            <div class="col-3">
                                @if($mahlzeit->Verfügbar)
                                    <div class="card">
                                        @else
                                            <div class="card noAvail">
                                                @endif
                                                <img alt="{{$mahlzeit->AltText}}" src="data:image/gif;base64,{{base64_encode($mahlzeit->Binärdaten)}}" width="183" height="183">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$mahlzeit->Name}}</h5>
                                                    @if($mahlzeit->Verfügbar)
                                                        <a href = "{{route('detail',['mid'=>$mahlzeit->ID])}}" class="btn btn-primary">Details</a>
                                                    @else
                                                        <a href="#" class ="btn btn-primary">Details</a>
                                                    @endif
                                                </div>
                                            </div>
                                    </div>
                                    @endforeach
                            </div>
                            @else
                                <div class="col-12">
                                    <p>Leider ergab Ihre Suche keine Treffer,<br>versuchen Sie es mit neuen Filter-Optionen erneut.</p>
                                </div>
                            @endif
                </div>
            </div>
        </div>
    </main>

@endsection
