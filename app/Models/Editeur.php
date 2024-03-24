<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'maisonedit',
        'siteweb',
        'email'
        ];
        public function livres()
        {
        return $this->hasMany(Livre::class);
        }
}