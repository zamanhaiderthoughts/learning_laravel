<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    protected $fillable = [
        'title',
        'description',
        'company',
        'location',
        'salary',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
