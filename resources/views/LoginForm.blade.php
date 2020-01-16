@if(!Session::has('angemeldet'))
    <form method="post">
        @csrf
        <fieldset>
            <legend>Login</legend>
            <div class="form-group">
                <input type="text" class="form-control" id="user" placeholder="Benutzer" maxlength="49" name="ben" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Passwort" name="pas" required>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-outline-dark">Anmelden</button>
    </form>
@else
    <p>Hallo <b>{{Session::get('Nutzername')}}</b>. Sie sind angemeldet als <b>{{Session::get('Rolle')}}</b></p>
    <form method="post">
        @csrf
        <input type="hidden" name="abmelden" value="1">
        <button type="submit" class="btn btn-outline-dark">Abmelden</button>
    </form>
@endif
