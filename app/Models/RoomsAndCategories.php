<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsAndCategories extends Model
{
    protected $table = 'rooms_and_categories';
    protected $fillable = ['room_id', 'categories_id'];
    use HasFactory;
}
