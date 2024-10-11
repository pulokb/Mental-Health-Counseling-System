<?php

namespace App\Models;

use App\Notifications\ResetPasswordQueue;
use App\Notifications\VerifyEmailQueue;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

/**
 * Class User
 *
 * @package App\Models
 * @version February 5, 2021, 7:07 pm +06
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $address
 * @property string $image
 * @property int $id
 * @property bool $status
 * @property string|null $provider
 * @property string|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin Model
 */
class User extends Authenticatable //implements MustVerifyEmail
{

    use Notifiable , HasFactory,HasRoles, LogsActivity;
    public $table = 'users';




    public $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'image',
        'age',
        'gender',
        'occupation',
        'status' //default 1
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'image' => 'string',
        'age' => 'string',
        'gender' => 'string',
        'occupation' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'phone' => 'nullable|string|max:191',
        'address' => 'nullable|string|max:191',
        'age' => 'nullable|string|max:191',
        'gender' => 'nullable|string|max:191',
        'occupation' => 'nullable|string|max:191',
        'image' => 'nullable|image||max:10000',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public static function getpermissionGroups()
    {
        $permission_groups = DB::table('permissions')
            ->select('group_name as name')
            ->groupBy('group_name')
            ->get();
        return $permission_groups;
    }

    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public static function roleIsNotUser(){
        $roles = Role::whereNotIn('name', ['user'])->pluck('name');
        return User::role($roles)->get();
    }

    public function login_activity()
    {
        return $this->hasOne(LoginActivity::class);
    }

    //override for sending the verification email using queue
    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new VerifyEmailQueue());
    // }

    // // override for sending the reset password using queue
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new ResetPasswordQueue($token));
    // }

}
