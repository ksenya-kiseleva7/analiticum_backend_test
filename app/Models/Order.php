<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // Поля, доступные для массового присваивания
    protected $fillable = [
        'weight',
        'region',
        'delivery_hours',
        'courier_id',
        'assigned_at',
        'completed_at'
    ];

    // Касты для удобства работы с датами и массивами
    protected $casts = [
        'delivery_hours' => 'array',   // delivery_hours будет храниться как массив
        'assigned_at' => 'datetime',   // преобразуем в дату
        'completed_at' => 'datetime',  // преобразуем в дату
    ];

}
