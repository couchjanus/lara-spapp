<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class Category extends Model
{
    protected $fillable = ["name", "slug"];

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = $value;
    //     $this->attributes['slug'] = Str::slug($value);
    // }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public static function register(array $names) : Collection
    {
        $categoriesSaved = collect([]);

        $names = array_unique($names);
        $categoriesNames = static::getCategoriesToRegister($names);

        foreach ($categoriesNames as $name) {
            $categoriesSaved[] = static::create([
                "name" => $name,
                "slug" => Str::slug($name)
            ]);
        }

        return $categoriesSaved;
    }

    public static function getCategoriesToRegister(array $names) : array
    {
        $existingCategoriesNames = static::whereIn("name", $names)->pluck("name");

        return array_filter($names, function ($name) use ($existingCategoriesNames) {
           return ! $existingCategoriesNames->contains($name);
        });
    }

}
