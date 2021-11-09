<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paper extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paper';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'paperID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['paperID', 'papername', 'quantity'];

    
}
