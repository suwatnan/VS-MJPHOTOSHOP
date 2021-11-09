<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timess extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'timess';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'timeID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['timeID', 'duration'];

    
}
