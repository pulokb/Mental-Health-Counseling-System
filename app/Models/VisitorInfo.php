<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class VisitorInfo extends Model
{
    use HasFactory,LogsActivity;
    protected $fillable=['user_agent','ip_address','count','status'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
