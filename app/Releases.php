<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Releases extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'RelName', 'RelMessage', 'RelDate', 'RelSrc', 'RelType', 'RelGeneral', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];
}
