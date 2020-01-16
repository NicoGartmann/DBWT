<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Bilder extends Model {
    protected $table = 'Bilder';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    /**
     * Realisiert N:M Beziehung Bilder <-> Mahlzeiten
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany*
     */
    public function mahlzeiten() {
        return $this->belongsToMany('App\Produkte','hat_bilder', 'BID','MID');
    }
    /**
     * Liefert zu einer spezifischen Mahlzeit die zugehörigen Bilder
     * @param $mid
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public static function getBildData($mid) {
        return DB::table('Mahlzeiten')
            ->select('Bilder.Alt-Text as AltText',
                'Bilder.Titel as Titel',
                'Bilder.Binärdaten as Binärdaten')
            ->join('hat_bilder','hat_bilder.MID','Mahlzeiten.ID')
            ->join('Bilder','hat_bilder.BID','Bilder.ID')
            ->where('Mahlzeiten.ID',$mid)->first();
    }
}
