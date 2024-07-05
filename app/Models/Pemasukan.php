<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'saldo_pemasukan', 'id_bank', 'keterangan'];
    public $timestamps = true;

   
    public function bank()
    {

        return $this->BelongsTo(Bank::class, 'id_bank');

    }
    public function dompet()
    {
        return $this->HasMany(Dompet::class);
    }
    // public function ()
    // {

    // }
}
