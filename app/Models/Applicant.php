<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'department_id',
        'resume',
        'transcript',
        'status'
    ];

    public function department()
{
    return $this->belongsTo(Department::class);
}
}
