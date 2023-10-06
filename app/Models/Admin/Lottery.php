<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lottery extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'ticket_no',
        'ticket_price',
        'start_date',
        'end_date',
        'user_id',
        'files',
        'files_mime',
        'files_size',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}