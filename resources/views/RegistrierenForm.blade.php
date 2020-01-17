<form method="post">
    <fieldset>
        <legend>Ihre Benutzerdaten</legend>
        <div class="form-group">
            <label for="nickname">Nickname</label>
            <input type="text" class="form-control" id="nickname" name="nickname" required>
        </div>
        <div class="form-group">
            <label for="passwort1">Passwort</label>
            <input type="password" class="form-control" minlength="11" name="passwort1" id="passwort1" required>
        </div>
        <div class="form-group">
            <label for="passwort2">Passwort wiederholen</label>
            <input type="password" class="form-control" minlength="11" name="passwort2" id="passwort2" required>
        </div>
    </fieldset>
    <fieldset>
        <legend>Spezialisierung</legend>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="gast" id="gast">
            <label class="form-check-label" for="gast">Gast</label>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="arbeiter" name="arbeiter">
            <label class="form-check-label" for="arbeiter">Mitarbeiter</label>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="student" name="student">
            <label class="form-check-label" for="student">Student</label>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Registrierung fortsetzen</button>
</form>
