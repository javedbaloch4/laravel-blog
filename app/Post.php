<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['title','body', 'user_id'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body) {
        $this->comments()->create(compact('body'));
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function archives() {
        return static::SelectRaw(' year(created_at) year , monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function tags() {
        return $this->belongsToMany(Tag ::class);
    }

    public function scopeFilter($query, $filters) {
        if ( isset($filters['month']) ) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

        if ( isset($filters['year']) ) {
            $query->whereYear('updated_at', $filters['year']);
        }
    }

}
