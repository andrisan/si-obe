<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function students()
    {
        return $this->belongsToMany(CourseClass::class, 'join_classes', 'student_user_id',
            'course_class_id');
    }

    public function studentGrade()
    {
        return $this->hasMany(StudentGrade::class, 'student_user_id');
    }

    public function studentData()
    {
        return $this->hasOne(StudentData::class, 'id');
    }

    public function courseClass()
    {
        return $this->belongsToMany(
            CourseClass::class,
            'join_classes',
            'student_user_id',
            'course_class_id'
        );
    }
}
