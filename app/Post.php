<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = ["title", "content", "slug", "user_id", "category_id", "cover_path", "online"];

    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * Relationship between a post with its creator
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    /**
     * Relationship between a post with a category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getDescriptionAttribute()
    {
        return substr($this->content, 0, 70) . "...";
    }

    public function getCoverAttribute()
    {
        $parts = explode("/", $this->cover_path);

        return end($parts);
    }

}
