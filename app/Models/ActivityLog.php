<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = [
        'admin_id',
        'action',
        'description',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
