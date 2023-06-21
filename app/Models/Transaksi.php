<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $guarded = ['id_transaksi'];

    protected $with = ['buku', 'user'];

    public function buku() {
        return $this->belongsTo(DashboardBuku::class, 'id_buku');
    }
    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}
