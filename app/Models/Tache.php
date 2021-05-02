<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = [ //Tableau fillable sert à définir les champs sur lequel peut agir l'utilisateur
        'title',
        'description',
        'status',
        'project_id'
    ];

    protected $fillable = [
        'title',
        'description',
        'status'
    ];

    public static function getStatuses():array {

        return [
            'Todo', 'Done'
        ];
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
