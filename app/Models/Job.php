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
    ];

    public function employer() {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function tags() {
         return $this->belongsToMany(Tag::class,'job_tag', 'tag_listing_id');
    }
}
