<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
        'tipe_hp',
        'nomorPeserta',
        'nomorRegistrasi',
        'ktp',
        'bpjs',
        'riwayat'
    ];
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
