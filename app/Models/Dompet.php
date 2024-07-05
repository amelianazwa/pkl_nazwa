<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_pemasukan', 'id_pengeluaran', 'id_bank'];
    public $timestamps = true;


    public function pemasukan()
    {

        return $this->BelongsTo(Pemasukan::class, 'id_pemasukan');

    }
    public function pengeluaran()
    {

        return $this->BelongsTo(Bank::class, 'id_pengeluaran');

    }
    public function bank()
    {

        return $this->BelongsTo(User::class, 'id_bank');

    }
    
}
