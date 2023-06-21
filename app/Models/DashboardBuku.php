<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardBuku extends Model
{
    use HasFactory;

    protected $guarded = ['id_buku'];
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    public function scopeFilter($query, $filters) {
        if($filters ?? false) {
            return $query->where('judul_buku', 'like','%'.$filters.'%');
        }
    }

    public function transaksi() {
        return $this->hasMany(DashboardBuku::class, 'id_buku');
    }
}
