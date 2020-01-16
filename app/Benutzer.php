<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Benutzer extends Model {
    protected $table = 'Benutzer';
    protected $primaryKey = 'Nummer';
    protected $fillable = ['E-Mail', 'Nutzername', 'Hash', 'Vorname', 'Nachname', 'Geburtsdatum'];
    public $timestamps = false;
}
