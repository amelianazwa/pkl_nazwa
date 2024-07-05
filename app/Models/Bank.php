<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'jenis_bank', 'no_rekening', 'total_saldo'];
    public $timestamps = true;


    public function pemasukan()
    {
        return $this->HasMany(Pemasukan::class);
    }
    public function pengeluaran()
    {
        return $this->HasMany(Pengeluaran::class);
    }
    public function dompet()
    {
        return $this->HasMany(Dompet::class);
    }
}
