<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    protected $table = 'ut';
    protected $primaryKey = 'azon';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;


    protected $fillable = [
        'azon',
        'nev',
        'hossz',
        'allomas',
        'ido',
        'vezetes',
        'telepulesid'
    ];

    public function settlement()
    {
        return $this->belongsTo(Settlement::class, 'telepulesid');
    }
}