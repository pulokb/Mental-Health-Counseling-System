<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Notification
 * @package App\Models
 * @version March 25, 2022, 2:30 pm +06
 *
 * @property string $title
 * @property string $description
 * @property string $link
 * @property boolean $read_status
 * @property integer $user_id
 */
class Notification extends Model
{

    use HasFactory;

    public $table = 'notifications';
    



    public $fillable = [
        'title',
        'description',
        'link',
        'read_status',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'link' => 'string',
        'read_status' => 'boolean',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:191',
        'description' => 'nullable',
        'link' => 'nullable'
    ];

    
}
