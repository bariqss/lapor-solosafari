<?php
namespace App\Enums;


enum UserRole:string
{
    case ADMIN = 'admin';
    case OPERATOR = 'operator';
    case PETUGAS = 'petugas';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'admin',
            self::OPERATOR => 'operator',
            self::OPERATOR => 'petugas',
            self::USER => 'user',
        };
    }
}
