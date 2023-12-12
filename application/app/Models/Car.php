<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: cars
 *
 * === Columns ===
 * @property int $id
 * @property int $mark_id
 * @property int $model_id
 * @property string|null $year
 * @property int|null $mileage
 * @property string|null $color
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Car extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'mark_id',
        'model_id',
        'year',
        'color',
    ];
    public function getModel(): belongsTo
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function getMark(): belongsTo
    {
        return $this->belongsTo(CarMark::class, 'mark_id');
    }

}
