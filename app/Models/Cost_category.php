<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost_category extends Model
{
    use HasFactory;
    protected $table = 'cost_categories';
    protected $guarded = ['id'];
}
