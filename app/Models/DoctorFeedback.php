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
 * @property integer $overall_result
 * @property integer $status
 * @property integer $educational
 * @property integer $family
 * @property integer $relationship
 * @property integer $job
 * @property integer $general
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
        'overall_result',    // New field
        'status',
        'educational',       // New field
        'family',            // New field
        'relationship',      // New field
        'job',               // New field
        'general',           // New field
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
        'overall_result' => 'integer',// New cast
        'status'=>'string',
        'educational' => 'integer',   // New cast
        'family' => 'integer',        // New cast
        'relationship' => 'integer',  // New cast
        'job' => 'integer',           // New cast
        'general' => 'integer',       // New cast
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
        'overall_result' => 'integer',      // New rule
        'status'=>'string',
        'educational' => 'integer',         // New rule
        'family' => 'integer',              // New rule
        'relationship' => 'integer',        // New rule
        'job' => 'integer',                 // New rule
        'general' => 'integer',             // New rule
        'message' => 'nullable|string',              // New rule
        'symptoms' => 'nullable|string',
        'suggestions' => 'nullable|string',
        'note' => 'nullable|string'
    ];
}
