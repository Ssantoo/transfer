<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslationLang extends Model
{
    use HasFactory;

    protected $fillable = ['language', 'content'];
}
