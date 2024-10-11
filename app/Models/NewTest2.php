<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class NewTest2
 * @package App\Models
 * @version December 28, 2023, 12:19 am +06
 *
 * @property string $name
 */
class NewTest2 extends Model
{

    use HasFactory;

    public $table = 'new_test2s';
    



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
