<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Zutaten extends Model {
    protected $table = 'Zutaten';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    /**
     * Liefert die Zutaten einer spezifischen Mahlzeit
     * @param $mid
     * @return \Illuminate\Support\Collection
     */
    public static function getZutatDataSpezif($mid) {
        return DB::table('Mahlzeiten')
            ->select('Zutaten.Name as Name')
            ->join('enthält_zutaten','enthält_zutaten.MID','Mahlzeiten.ID')
            ->join('Zutaten','Zutaten.ID','enthält_zutaten.ZID')
            ->where('Mahlzeiten.ID',$mid)->get();
    }
    /**
     * Liefert alle Zutaten
     * @return \Illuminate\Support\Collection
     */
    public static function getAllData() {
        return DB::table('Zutaten')
            ->orderBy('Bio','desc')
            ->orderBy('Name')
            ->get();
    }
}
