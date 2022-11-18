<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class SubCategory extends Model
{
    use HasFactory;
    use HasUuids;
    protected $guarded = [];
}
