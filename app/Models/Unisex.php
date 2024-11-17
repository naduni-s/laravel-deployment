<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unisex extends Model
{
    use HasFactory;
    protected $table = 'unisex';
    protected $fillable = ['name', 'price', 'description', 'image_url'];
}
