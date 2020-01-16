@extends('app')
@section('title','Zutaten')
@section('content')
    <main class="row ">
        <div class="col-12 zut">
            <table class="tblZut">
                <tr class="legend">
                    <th>Zutaten</th>
                    <th>Vegan?</th>
                    <th>Vegetarisch?</th>
                    <th>Glutenfrei?</th>
                </tr>
                @foreach($zutaten as $zutat)
                    <tr>
                        <td class="zutName"> <a href="http://www.google.com/search?q={{$zutat->Name}}" title="Suchen Sie nach {{$zutat->Name}} im Web">{{$zutat->Name}}</a>
                            @if($zutat->Bio)
                                <img src="../image/bio.png" alt="bio" width="20" height="15"/>
                            @endif
                        </td>
                        <td class="dat">
                            @if($zutat->Vegan)
                                <i class="far fa-check-circle"></i>
                            @else
                                <i class="far fa-circle"></i>
                            @endif
                        </td>
                        <td class="dat">
                            @if($zutat->Vegetarisch)
                                <i class="far fa-check-circle"></i>
                            @else
                                <i class="far fa-circle"></i>
                            @endif
                        </td>
                        <td class="dat">
                            @if($zutat->Glutenfrei)
                                <i class="far fa-check-circle"></i>
                            @else
                                <i class="far fa-circle"></i>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>

@endsection
