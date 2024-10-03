<?php

namespace App\Enum;

enum Status: string
{
    case Active = 'active';
    case Inactive = 'inactive';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
