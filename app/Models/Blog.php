<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'kategori_id', 'body', 'cover']; // Pastikan kolom ini sesuai dengan yang Anda inginkan

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id'); // Mengatur hubungan dengan model Kategori
    }
}

