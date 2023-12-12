<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: car_marks
*
* === Columns ===
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
*/
class CarMark extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function getSelectVariant(){
        $variants = self::query()->get();
        $options = [];
        foreach ($variants as $value) {
            $options[$value->id] = $value->name;
        }
        return $options;
    }

}
