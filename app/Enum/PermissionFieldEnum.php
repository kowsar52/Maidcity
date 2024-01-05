<?php


declare(strict_types=1);

namespace App\Enum;

class PermissionFieldEnum extends AbstractEnum
{
    public const NAME = 'name';
    public const PARENT_TYPE = 'parent_type';
    public const CHILD_TYPE = 'child_type';
    public const PERMISSION_TYPE = 'permission_type';

    public static function getValues(): array
    {
        return [];
    }

    public static function getTranslationKeys(): array
    {
        return [

        ];
    }
}
