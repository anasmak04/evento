<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;



    protected $fillable = ['titre', 'description', 'date', 'lieu', 'category_id', 'places_Disponible', 'organizer_id', 'is_approved', 'auto_accept'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('is_approved');
    }

    protected $casts = [
        'date' => 'datetime',
    ];



}
