<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Property extends Model
{

    use Favoriteable;

    protected $fillable = [
        'title',    'price',        'featured',     'purpose',  'type',         'image',
        'slug',     'bedroom',      'bathroom',     'city',     'city_slug',    'address',
        'area',     'agent_id',     'description',  'video',    'floor_plan',
        'location_latitude',        'location_longitude',       'nearby',       'cuisine',
        'douche',

    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    // public function likes()
    // {
    //     return $this->belongsTo(Like::class);
    // }

    public function gallery()
    {
        return $this->hasMany(PropertyImageGallery::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'property_id');
    }

    public function favorite_to_users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }


}
