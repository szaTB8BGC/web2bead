<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    protected $table = 'telepules';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;


    protected $fillable = ['id', 'nev', 'npid'];

    public function nationalPark()
    {
        return $this->belongsTo(NationalPark::class, 'npid');
    }

    public function trails()
    {
        return $this->hasMany(Trail::class, 'telepulesid');
    }
}