<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class printphotodetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'printphotodetail';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'printphotodetailID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['printphotodetailID', 'imageFileName', 'sizeimageID', 'formatprintID', 'productID', 'note', 'paperID', 'totalprice', 'printphotoID'];

    
}
