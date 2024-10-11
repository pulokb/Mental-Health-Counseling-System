<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Language
 * @package App\Models
 * @version March 3, 2022, 11:23 am +06
 *
 * @property string $name
 * @property string $code
 * @property boolean $status
 */
class Language extends Model
{

    use HasFactory;

    public $table = 'languages';




    public $fillable = [
        'name',
        'code',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
    ];


}
