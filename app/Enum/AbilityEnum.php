<?php


declare(strict_types=1);

namespace App\Enum;

class AbilityEnum extends AbstractEnum
{
    public const LIST = 'list';
    public const CREATE = 'create';
    public const VIEW = 'view';
    public const UPDATE = 'update';
    public const DELETE = 'delete';
    public const PRINT = 'print';
    public const ALL = 'all';

    public static function getValues(): array
    {
        return [
            self::LIST,
            self::CREATE,
            self::UPDATE,
            self::VIEW,
            self::DELETE,
            self::PRINT
        ];
    }

    public static function getTranslationKeys(): array
    {
        return [

        ];
    }
}
