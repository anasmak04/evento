<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "organizer_id"];

    public function organizer() {
        return $this->belongsTo(Organizer::class);
    }
}
