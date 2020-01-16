<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Kommentare extends Model {
    protected $table = 'Kommentare';
    protected $primaryKey = 'ID';
    protected $fillable = ['Bemerkung', 'Bewertung', 'MID', 'Studischreibt'];
    public $timestamps = false;
    /**
     * Liefert die zu einer spezifischen Mahlzeit zugehörigen Kommentare
     * @param $mid
     * @return \Illuminate\Support\Collection
     */
    public static function getKommentSpezif($mid) {
        return DB::table('Kommentare')
            ->select('Kommentare.Bemerkung as Bemerkung',
                'Kommentare.Bewertung as Bewertung',
                'Kommentare.Zeitpunkt as Zeitpunkt',
                'Benutzer.Nutzername as Nutzername')
            ->join('Benutzer', 'Benutzer.Nummer', 'Kommentare.Studischreibt')
            ->where('MID',$mid)
            ->orderBy('Zeitpunkt','desc')
            ->limit(5)
            ->get();
    }
    /**
     * Liefert den Durchschnitt aller Bewertungen einer spezifischen Mahlzeit
     * @param $mid
     * @return double
     */
    public static function getDurchschnitt($mid) {
        return DB::table('Kommentare')
            ->where('MID',$mid)
            ->avg('Bewertung');
    }
}
