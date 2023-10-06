<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table = 'categories';

    protected $fillable = [
        'category_name',
        'created_at',
        'updated_at',
    ];
}