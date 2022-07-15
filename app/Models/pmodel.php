<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pmodel extends Model
{
    use HasFactory;
    protected $primaryKey = 'nip';
    protected $table = 'tbpegawai';
    protected $fillable = [
        'nip', 'nama', 'ttglahir', 'agama', 'jkelamin', 'cover_img'
    ];
}
