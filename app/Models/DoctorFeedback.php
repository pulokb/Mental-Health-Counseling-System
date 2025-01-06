<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DoctorFeedback
 * @package App\Models
 * @version December 28, 2023, 2:11 am +06
 *
 *
 * @property integer $user_id
 * @property integer $admin_id
 * @property string $user_name
 * @property integer $age
 * @property string $gender
 * @property string $occupation
 * @property string $address
 * @property integer $overall_result
 * @property integer $status
 * @property integer $depression
 * @property integer $anxiety
 * @property integer $irritability
 * @property integer $emotional
 * @property integer $social
 * @property integer $fatigue
 * @property integer $concentrating
 * @property integer $sleep
 * @property integer $esteem
 * @property integer $panic
 * @property string $message
 * @property string $symptoms
 * @property string $suggestions
 * @property string $note
 */
class DoctorFeedback extends Model
{
    use HasFactory;

    public $table = 'doctor_feedbacks';

    public $fillable = [
        'user_id',
        'user_name',         // New field
        'age',               // New field
        'gender',            // New field
        'occupation',        // New field
        'address',        // New field
        'overall_result',    // New field
        'status',
        'depression',       // New field
        'anxiety',            // New field
        'irritability',      // New field
        'emotional',               // New field
        'social',               // New field
        'fatigue',               // New field
        'concentrating',               // New field
        'sleep',               // New field
        'esteem',               // New field
        'panic',               // New field
        'message',           // New field (nullable)
        'symptoms',
        'suggestions',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'user_name' => 'string',      // New cast
        'age' => 'integer',           // New cast
        'gender' => 'string',         // New cast
        'occupation' => 'string',     // New cast
        'address' => 'string',     // New cast
        'overall_result' => 'integer',// New cast
        'status'=>'string',
        'depression' => 'integer',   // New cast
        'anxiety' => 'integer',        // New cast
        'irritability' => 'integer',  // New cast
        'emotional' => 'integer',           // New cast
        'social' => 'integer',       // New cast
        'fatigue' => 'integer',       // New cast
        'concentrating' => 'integer',       // New cast
        'sleep' => 'integer',       // New cast
        'esteem' => 'integer',       // New cast
        'panic' => 'integer',       // New cast
        'message' => 'string',        // New cast (nullable)
        'symptoms' => 'string',
        'suggestions' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'nullable',
        'user_name' => 'string|max:255',    // New rule
        'age' => 'integer',                 // New rule
        'gender' => 'string|max:20',        // New rule
        'occupation' => 'string|max:255',   // New rule
        'address' => 'string|max:255',   // New rule
        'overall_result' => 'integer',      // New rule
        'status'=>'string',
        'depression' => 'integer',         // New rule
        'anxiety' => 'integer',              // New rule
        'irritability' => 'integer',        // New rule
        'emotional' => 'integer',                 // New rule
        'social' => 'integer',             // New rule
        'fatigue' => 'integer',             // New rule
        'concentrating' => 'integer',             // New rule
        'sleep' => 'integer',             // New rule
        'esteem' => 'integer',             // New rule
        'panic' => 'integer',             // New rule
        'message' => 'nullable|string',              // New rule
        'symptoms' => 'nullable|string',
        'suggestions' => 'nullable|string',
        'note' => 'nullable|string'
    ];
}
