<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partita extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'partitas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded  = ['id'];
    protected $fillable = [
        'casa',
        'trasferta',
        'campo',
        'data_partita',
        'torneo_id',
        'punti_casa',
        'punti_trasferta',
        'terminata'
    ];
    protected $hidden = [
    ];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function openResult($crud = false)
    {
        return '<a href="http://fcriviera.test/public/partite/1" class="btn btn-sm btn-link" target="_blank" data-toggle="tooltip" title="Gestisci risultato partita."><i class="la la-pencil"></i>Risultato</a>';
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
