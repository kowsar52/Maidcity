<?php

declare(strict_types=1);

namespace App\Enum;
class CacheEnum extends AbstractEnum
{
    public const CURRENT_USER_PERMISSION = 'current_user_permissions';
    public const CHECK_PERMISSION = 'check_permission';

    public static function getValues(): array
    {
        return array(
            self::CURRENT_USER_PERMISSION
        );
    }

    public static function getTranslationKeys(): array
    {
        return array();
    }

    public static function get_expiry_time(): string
    {
        return '3600';
    }
}
