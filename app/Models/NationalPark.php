<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NationalPark extends Model
{
    protected $table = 'np';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;


    protected $fillable = ['id', 'nev'];

    public function settlements()
    {
        return $this->hasMany(Settlement::class, 'npid');
    }
}