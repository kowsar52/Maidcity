<?php

declare(strict_types=1);

namespace App\Enum;

class PermissionTypeEnum extends AbstractEnum
{
    public const GENERIC = 'generic';
    public const CUSTOM = 'custom';

    public static function getValues(): array
    {
        return [
            self::GENERIC,
            self::CUSTOM
        ];
    }

    public static function getTranslationKeys(): array
    {
        return [
        ];
    }
}
