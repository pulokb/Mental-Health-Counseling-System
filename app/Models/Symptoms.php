<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Symptoms
 * @package App\Models
 * @version December 29, 2023, 2:16 am +06
 *
 * @property string $title
 * @property string $details
 * @property string $image
 * @property string $note
 */
class Symptoms extends Model
{

    use HasFactory;

    public $table = 'symptoms';




    public $fillable = [
        'title',
        'details',
        'image',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'details' => 'string',
        'image' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'details' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        'note' => 'required'
    ];


}
