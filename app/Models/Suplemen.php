<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplemen extends Model
{
    protected $table = "suplemen";

    protected $fillable = ["no_kidung", "judul", "isi"];
}
