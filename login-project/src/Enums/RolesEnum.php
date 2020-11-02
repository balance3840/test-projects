<?php
namespace App\Enums;

/**
 * Class RolesEnum
 * @package App\Enums
 */
class RolesEnum {
    const ADMIN = 'ADMIN';
    const GUEST = 'GUEST';
    const SUPER_ADMIN = 'SUPER_ADMIN';

    /**
     * @return string[]
     */
    public static function getRoles(): array {
        return [self::ADMIN, self::GUEST, self::SUPER_ADMIN];
    }

}