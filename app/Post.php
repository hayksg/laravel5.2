<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'content'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    //public function addComment($userId, $content)
    public function addComment(Comment $comment)
    {
        /*
        Comment::create([
            'post_id' => $this->id,
            'user_id' => $userId,
            'content' => $content,
        ]);
        */
        
        /*
        $this->comments()->create([
            'post_id' => $this->id,
            'user_id' => $userId,
            'content' => $content,
        ]);
        */
        
        $this->comments()->save($comment);
    }
    
    public function scopeFilter($query, $filters)
    {
        
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', '=', Carbon::parse($month)->month);
        }
        
        if ($year = $filters['year']) {
            $query->whereYear('created_at', '=', $year);
        }       
        
    }
    
    public static function archives()
    {
        return static::selectRaw('year(created_at)  year, monthname(created_at) as month, count(*) published')
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(created_at) asc')
                    ->get()
                    ->toArray();
    }
}
