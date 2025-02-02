<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $fillable = [
        'courier_type',
        'regions',
        'working_hours',
    ];

    protected $casts = [
        'regions' => 'array',
        'working_hours' => 'array',
    ];

    /**
     * Проверка, доступен ли курьер для работы в заданном регионе и в указанное время
     */
    public function isAvailableForRegionAndTime($region, $time)
    {
        if (! in_array($region, $this->regions)) {
            return false;
        }

        foreach ($this->working_hours as $hours) {
            if ($this->isTimeWithinWorkingHours($hours, $time)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Проверка, попадает ли время в рабочие часы курьера
     */
    private function isTimeWithinWorkingHours($workingHours, $time)
    {
        [$start, $end] = explode('-', $workingHours);

        return $time >= $start && $time <= $end;
    }
}
