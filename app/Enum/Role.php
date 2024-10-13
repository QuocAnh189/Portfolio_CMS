<?php

namespace App\Enum;

enum Role: string
{
    case Admin = 'admin';
    case User = 'user';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
