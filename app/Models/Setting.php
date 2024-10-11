<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

/**
 * Class Setting
 * @package App\Models
 * @version May 4, 2021, 3:35 pm +06
 *
 * @property string $name
 * @property string $value
 */
class Setting extends Model
{

    use HasFactory,LogsActivity;

    public $table = 'settings';




    public $fillable = [
        'name',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'value' => 'nullable|string|max:191'
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    

}
