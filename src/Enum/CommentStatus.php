<?php

namespace App\Enum;

enum CommentStatus: string
{
    case Pending = 'en attente';
    case Published ='publié';
    case Moderated = 'modéré';

    public function getLabel(): string
    {
        return match($this){
            self::Pending => 'En attente',
            self::Published => 'Publié',
            self::Moderated => 'Modéré'
        };
    }
}