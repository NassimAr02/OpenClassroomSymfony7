<?php

namespace App\Enum;

enum BookStatus: string
{
    case Available = 'available';
    case Borrowed ='borrowed';
    case Unvailable = 'unavailable';

    public function getLabel(): string
    {
        return match($this){
            self::Available => 'Disponible',
            self::Borrowed => 'Emprunté',
            self::Unvailable => 'Indisponible'
        };
    }
}