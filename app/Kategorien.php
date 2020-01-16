<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Kategorien extends Model {
    protected $table = 'Kategorien';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    /**
     * Realisiert 1:N Beziehung Mahlzeiten <-> Kategorien
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mahlzeit() {
        return $this->belongsTo('App\Produkte','ID');
    }
    /**
     * Liefert Oberkategorien
     * @return mixed
     */
    public static function getOberKat() {
        return Kategorien::select('ID','Bezeichnung')->where('KID',NULL)->get();
    }
    /**
     * Liefert Unterkategorien zu einer spezifischen Oberkategorie
     * @param $oberkat
     * @return mixed
     */
    public static function getUnterKat($oberkat) {
        return Kategorien::select('ID','Bezeichnung')->where('KID',$oberkat)->get();
    }
    /**
     * Fasst alle Daten aus Kategorien in einem Array zusammen
     * @return array
     */
    public static function getData() {
        $kategorien = array();
        $kategorien['oberkat'] = self::getOberkat();
        foreach($kategorien['oberkat'] as $oberkat) {
            $oberkat['unterkat'] = self::getUnterKat($oberkat['ID']);
        }
        return $kategorien;
    }
}
