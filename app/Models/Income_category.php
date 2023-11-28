<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income_category extends Model
{
    use HasFactory;
    protected $table = 'income_categories';
    protected $guarded = ['id'];
}
