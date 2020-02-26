<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'mata_kuliah';
    protected $guarded = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
