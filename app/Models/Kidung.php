<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kidung extends Model
{
    protected $fillable = ["no_kidung", "judul", "isi"];

    protected $table = 'kidung';
}
