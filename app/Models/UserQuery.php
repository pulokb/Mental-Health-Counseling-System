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
 * @property integer $depression_q1
* @property integer $depression_q2
* @property integer $depression_q3
* @property integer $anxiety_q1
* @property integer $anxiety_q2
* @property integer $anxiety_q3
* @property integer $irritability_q1
* @property integer $irritability_q2
* @property integer $irritability_q3
* @property integer $emotional_q1
* @property integer $emotional_q2
* @property integer $emotional_q3
* @property integer $social_q1
* @property integer $social_q2
* @property integer $social_q3
* @property integer $fatigue_q1
* @property integer $fatigue_q2
* @property integer $fatigue_q3
* @property integer $concentrating_q1
* @property integer $concentrating_q2
* @property integer $concentrating_q3
* @property integer $sleep_q1
* @property integer $sleep_q2
* @property integer $sleep_q3
* @property integer $esteem_q1
* @property integer $esteem_q2
* @property integer $esteem_q3
* @property integer $panic_q1
* @property integer $panic_q2
* @property integer $panic_q3
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
        'depression_q1',
        'depression_q2',
        'depression_q3',
        'anxiety_q1',
        'anxiety_q2',
        'anxiety_q3',
        'irritability_q1',
        'irritability_q2',
        'irritability_q3',
        'emotional_q1',
        'emotional_q2',
        'emotional_q3',
        'social_q1',
        'social_q2',
        'social_q3',
        'fatigue_q1',
        'fatigue_q2',
        'fatigue_q3',
        'concentrating_q1',
        'concentrating_q2',
        'concentrating_q3',
        'sleep_q1',
        'sleep_q2',
        'sleep_q3',
        'esteem_q1',
        'esteem_q2',
        'esteem_q3',
        'panic_q1',
        'panic_q2',
        'panic_q3'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'depression_q1' => 'string',
        'depression_q2' => 'string',
        'depression_q3' => 'string',
        'anxiety_q1' => 'string',
        'anxiety_q2' => 'string',
        'anxiety_q3' => 'string',
        'irritability_q1' => 'string',
        'irritability_q2' => 'string',
        'irritability_q3' => 'string',
        'emotional_q1' => 'string',
        'emotional_q2' => 'string',
        'emotional_q3' => 'string',
        'social_q1' => 'string',
        'social_q2' => 'string',
        'social_q3' => 'string',
        'fatigue_q1' => 'string',
        'fatigue_q2' => 'string',
        'fatigue_q3' => 'string',
        'concentrating_q1' => 'string',
        'concentrating_q2' => 'string',
        'concentrating_q3' => 'string',
        'sleep_q1' => 'string',
        'sleep_q2' => 'string',
        'sleep_q3' => 'string',
        'esteem_q1' => 'string',
        'esteem_q2' => 'string',
        'esteem_q3' => 'string',
        'panic_q1' => 'string',
        'panic_q2' => 'string',
        'panic_q3' => 'string'


    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'nullable',
        'depression_q1' => 'nullable',
        'depression_q2' => 'nullable',
        'depression_q3' => 'nullable',
        'anxiety_q1' => 'nullable',
        'anxiety_q2' => 'nullable',
        'anxiety_q3' => 'nullable',
        'irritability_q1' => 'nullable',
        'irritability_q2' => 'nullable',
        'irritability_q3' => 'nullable',
        'emotional_q1' => 'nullable',
        'emotional_q2' => 'nullable',
        'emotional_q3' => 'nullable',
        'social_q1' => 'nullable',
        'social_q2' => 'nullable',
        'social_q3' => 'nullable',
        'fatigue_q1' => 'nullable',
        'fatigue_q2' => 'nullable',
        'fatigue_q3' => 'nullable',
        'concentrating_q1' => 'nullable',
        'concentrating_q2' => 'nullable',
        'concentrating_q3' => 'nullable',
        'sleep_q1' => 'nullable',
        'sleep_q2' => 'nullable',
        'sleep_q3' => 'nullable',
        'esteem_q1' => 'nullable',
        'esteem_q2' => 'nullable',
        'esteem_q3' => 'nullable',
        'panic_q1' => 'nullable',
        'panic_q2' => 'nullable',
        'panic_q3' => 'nullable',

    ];


}
