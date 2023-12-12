<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Table: car_models
 *
 * === Columns ===
 * @property int $id
 * @property string $name
 * @property int $mark_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class CarModel extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'mark_id'
    ];

    public function getMark(): belongsTo
    {
        return $this->belongsTo(CarMark::class, 'mark_id');
    }
}
