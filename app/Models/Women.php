<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Women extends Model
{
    use HasFactory;
    protected $table = 'women';
    protected $fillable = ['name', 'price', 'description', 'image_url'];
}
