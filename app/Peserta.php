<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';

    protected $fillable = [
        'nama',
        'email',
        'tempatlahir',
        'tanggallahir',
        'jenkel',
        'alamat',
        'nohp',
        'ukuranbaju',
        'goldarah',
        'sosmed_fb',
        'sosmed_twitter',
        'sosmed_ig',
        'ikutserta',
        'ikutmks',
        'merk_hp',
        'tipe_hp'
    ];
}
