<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            // Create default statuses
            $user->statuses()->createMany([
                [
                    'title' => 'Planned',
                    'slug' => 'planned',
                    'order' => 1
                ],
                [
                    'title' => 'Todo',
                    'slug' => 'todo',
                    'order' => 2
                ],
                [
                    'title' => 'In Progress',
                    'slug' => 'in-progress',
                    'order' => 3
                ],
                [
                    'title' => 'Done',
                    'slug' => 'done',
                    'order' => 4
                ],
                [
                    'title' => 'Assistance required',
                    'slug' => 'assist-req',
                    'order' => 5
                ],
                [
                    'title' => 'Rejected',
                    'slug' => 'rejected',
                    'order' => 6
                ]
            ]);
        });
    }

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('order');
    }

    public function statuses()
    {
        return $this->hasMany(Status::class)->orderBy('order');
    }
}
