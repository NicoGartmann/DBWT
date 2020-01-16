<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/default.css')}}" />
    <script src="https://kit.fontawesome.com/7eb821db1b.js" crossorigin="anonymous"></script>
</head>
<body class="container">
<header class="row head">
    <div class="col-3">
        <h1>e-Mensa</h1>
    </div>

    <nav class="col-6 navBar">
        <ul class="nav navnavnav">
            <li class="nav-item"><a class="nav-link" href="/start">Start</a> </li>
            <li class="nav-item"><a class="nav-link" href="/produkte">Mahlzeiten</a> </li>
            <li class="nav-item"><a class="nav-link active" href="#">Bestellung</a></li>
            <li class="nav-item"><a class="nav-link active" href="https://www.fh-aachen.de/" target="_blank">FH-Aachen</a></li>
        </ul>
    </nav>

    <div class="col-3">
        <form class="input" action="http://www.google.de/search" method="get">
            <input type="text" hidden value="www.fh-aachen.de" name="as_sitesearch" />
            <div class="form-group sub">
                <input type="text" name="q" class="form-control-sm" placeholder="Suche">
                <button type="submit" class="btn btn-outline-dark but"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
</header>

@yield('content')


<footer class="row head">
    <div class="col-3">
        <p>&copy; DBWT - <?php echo date('M d Y'); ?></p>
    </div>
    <nav class="col-7 foot">
        <ul class="nav lefted">
            <li class="nav-item"><a class="nav-link" href="/login">Login</a> </li>
            <li class="nav-item"><a class="nav-link" href="/registrieren">Registrieren</a> </li>
            <li class="nav-item"><a class="nav-link active" href="/zutaten">Zutatenliste</a></li>
            <li class="nav-item"><a class="nav-link active" href="/impressum">Impressum</a></li>
        </ul>
    </nav>
</footer>
</body>
</html>
