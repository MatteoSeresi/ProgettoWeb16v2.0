<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $primaryKey = 'id';
    
    // id non modificabile da un HTTP Request (Mass Assignment)
    protected $guarded = ['id'];

    public $timestamps = false;

    public function getAzienda()
    {
        return Company::select()->get();
    }

    public function getAziendaID()
    {
        return Company::select('id')->get();
    }

    public function getAziendaByID($idAzienda)
    {
        return Company::where('id', $idAzienda)->first();
    }

    public function offerte()
    {
        return $this->hasMany(Offer::class, 'ID_Azienda', 'id');
    }
}
