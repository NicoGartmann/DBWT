<?php
namespace App;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Produkte extends Model {
    protected $table = 'Mahlzeiten';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    /**
     * Zur Realisierung der 1:N Beziehung Mahlzeiten <-> Kategorien
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kategorie() {
        return $this->hasOne('App\Kategorien','ID', 'KatID');
    }
    /**
     * Zur Realisierung der N:M Beziehung Mahlzeiten <-> Bilder
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bilder() {
        return $this->belongsToMany('App\Bilder','hat_bilder','MID','BID');
        //->withPivot('Alt-Text','Titel','Binärdaten');
    }
    /**
     * Liefert $limit-Anzahl Mahlzeiten aus der DB
     * @param $limit
     * @return \Illuminate\Support\Collection
     */
    public static function limit($limit) {
        return  DB::table('Mahlzeiten')
            ->select('Mahlzeiten.ID as ID',
                'Mahlzeiten.Name as Name',
                'Mahlzeiten.Verfügbar as Verfügbar',
                'Bilder.Alt-Text as AltText',
                'Bilder.Binärdaten as Binärdaten' ,
                'Bilder.Titel as Titel')
            ->join('hat_bilder','hat_bilder.MID','Mahlzeiten.ID')
            ->join('Bilder','hat_bilder.BID','Bilder.ID')
            ->limit($limit)
            ->get();
    }
    /**
     * Filtert Mahlzeiten nach
     *  - Kategorie
     *  - Verfuegbar
     *  - Vegetarisch
     *  - Vegan
     * @param $filter
     * @return \Illuminate\Support\Collection
     */
    public static function filter($filter) {
        return DB::table('Mahlzeiten')
            ->select('Mahlzeiten.ID as ID',
                'Mahlzeiten.Name as Name',
                'Mahlzeiten.Verfügbar as Verfügbar',
                'Bilder.Alt-Text as AltText',
                'Bilder.Binärdaten as Binärdaten' ,
                'Bilder.Titel as Titel')
            ->join('hat_bilder','hat_bilder.MID','Mahlzeiten.ID')
            ->join('Bilder','hat_bilder.BID','Bilder.ID')
            ->where($filter)
            ->get();
    }
    /**
     * Liefert eine spezifische Mahlzeit
     * @param $mid
     * @return \Illuminate\Database\Query\Builder|mixed
     */
    public static function getMahlDataSpezif($mid) {
        return  DB::table('Mahlzeiten')
            ->select('ID','Name','Beschreibung')
            ->find($mid);
    }
    /**
     * Test zur Relation Mahlzeiten <-> Bilder
     */
    public static function get_data_relation() {
        $produkte = Produkte::find(1);
        foreach($produkte->bilder()->get() as $bild) {
            dd($bild);
        }
    }
    /**
     * Liefert einen zur spezifischen Mahlzeit zugehörigen Preis,
     * abhängig von der Rolle des angemeldeten Users
     * @param $mid
     * @return \Illuminate\Database\Query\Builder
     */
    public static function getPreisSpezif($mid) {
        $rolle = 'Preise.Gastpreis as Rolle';
        if(Session::has('Rolle')) {
            if(Session::get('Rolle') == 'Student') {
                $rolle = 'Preise.Studentenpreis as Rolle';
            } else if(Session::get('Rolle') == 'Mitarbeiter') {
                $rolle = 'Preise.MA-Preis as Rolle';
            }
        }
        return DB::table('Mahlzeiten')
            ->select($rolle)
            ->join('Preise','Preise.MID', 'Mahlzeiten.ID')
            ->where('Mahlzeiten.ID',$mid);
    }
    /**
     * Gibt alle Mahlzeiten und die dazugehörigen Bilder aus
     * @return \Illuminate\Support\Collection
     */
    public static function getData() {
        return DB::table('Mahlzeiten')
            ->select('Mahlzeiten.ID as ID',
                'Mahlzeiten.Name as Name',
                'Mahlzeiten.Verfügbar as Verfügbar',
                'Bilder.Alt-Text as AltText',
                'Bilder.Binärdaten as Binärdaten' ,
                'Bilder.Titel as Titel')
            ->join('hat_bilder','hat_bilder.MID','Mahlzeiten.ID')
            ->join('Bilder','hat_bilder.BID','Bilder.ID')
            ->get();
    }
}
