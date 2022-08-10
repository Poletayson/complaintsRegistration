<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = ['fk_polyclinics', 'fk_reasons', 'fk_clients', 'note'];

    /**
     * Получить соответствующую поликлинику
     */
    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class, 'fk_polyclinics');
    }

    /**
     * Получить повод обращения
     */
    public function reason()
    {
        return $this->belongsTo(Reason::class, 'fk_reasons');
    }

    /**
     * Получить клиента
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'fk_clients');
    }
}
