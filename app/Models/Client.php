<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['phone_number', 'surname', 'name', 'patronymic'];

    /**
     * Получить все обращения этого клиента
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'fk_clients')->orderBy('created_at', 'desc');
    }
}
