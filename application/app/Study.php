<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        ''
    ];

    protected $fillable =[

        'name','description', 'description_short','invite_code','start_date','end_date', 'num_of_pages'
    ];
}
