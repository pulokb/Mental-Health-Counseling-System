<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserQuery
 * @package App\Models
 * @version December 28, 2023, 1:14 am +06
 *
 * @property integer $user_id
 * @property string $student_q1
 * @property string $student_q2
 * @property string $student_q3
 * @property string $student_q4
 * @property string $student_q5
 * @property string $family_q1
 * @property string $family_q2
 * @property string $family_q3
 * @property string $family_q4
 * @property string $family_q5
 * @property string $relationship_q1
 * @property string $relationship_q2
 * @property string $relationship_q3
 * @property string $relationship_q4
 * @property string $relationship_q5
 * @property string $job_q1
 * @property string $job_q2
 * @property string $job_q3
 * @property string $job_q4
 * @property string $job_q5
 * @property string $mental_health_q1
 * @property string $mental_health_q2
 * @property string $mental_health_q3
 * @property string $mental_health_q4
 * @property string $mental_health_q5
 *
 *
 *
 */
class UserQuery extends Model
{

    use HasFactory;

    public $table = 'user_queries';




    public $fillable = [
        'user_id',
        'student_q1',
        'student_q2',
        'student_q3',
        'student_q4',
        'student_q5',
        'family_q1',
        'family_q2',
        'family_q3',
        'family_q4',
        'family_q5',
        'relationship_q1',
        'relationship_q2',
        'relationship_q3',
        'relationship_q4',
        'relationship_q5',
        'job_q1',
        'job_q2',
        'job_q3',
        'job_q4',
        'job_q5',
        'mental_health_q1',
        'mental_health_q2',
        'mental_health_q3',
        'mental_health_q4',
        'mental_health_q5'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'student_q1' => 'string',
        'student_q2' => 'string',
        'student_q3' => 'string',
        'student_q4' => 'string',
        'student_q5' => 'string',
        'family_q1' => 'string',
        'family_q2' => 'string',
        'family_q3' => 'string',
        'family_q4' => 'string',
        'family_q5' => 'string',
        'relationship_q1' => 'string',
        'relationship_q2' => 'string',
        'relationship_q3' => 'string',
        'relationship_q4' => 'string',
        'relationship_q5' => 'string',
        'job_q1' => 'string',
        'job_q2' => 'string',
        'job_q3' => 'string',
        'job_q4' => 'string',
        'job_q5' => 'string',
        'mental_health_q1' => 'string',
        'mental_health_q2' => 'string',
        'mental_health_q3' => 'string',
        'mental_health_q4' => 'string',
        'mental_health_q5' => 'string'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'nullable',
        'student_q1' => 'nullable',
        'student_q2' => 'nullable',
        'student_q3' => 'nullable',
        'student_q4' => 'nullable',
        'student_q5' => 'nullable',
        'family_q1' => 'nullable',
        'family_q2' => 'nullable',
        'family_q3' => 'nullable',
        'family_q4' => 'nullable',
        'family_q5' => 'nullable',
        'relationship_q1' => 'nullable',
        'relationship_q2' => 'nullable',
        'relationship_q3' => 'nullable',
        'relationship_q4' => 'nullable',
        'relationship_q5' => 'nullable',
        'job_q1' => 'nullable',
        'job_q2' => 'nullable',
        'job_q3' => 'nullable',
        'job_q4' => 'nullable',
        'job_q5' => 'nullable',
        'mental_health_q1' => 'nullable',
        'mental_health_q2' => 'nullable',
        'mental_health_q3' => 'nullable',
        'mental_health_q4' => 'nullable',
        'mental_health_q5' => 'nullable',
    ];


}
