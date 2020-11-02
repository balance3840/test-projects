<?php


namespace App\Enums;


/**
 * Class PermissionsEnum
 * @package App\Enums
 */
class PermissionsEnum
{
    const ADMIN_PERMISSIONS = ['CREATE_USER', 'LIST_USERS', 'DELETE_USERS'];
    const GUEST_PERMISSIONS = ['CREATE_USER'];
    const SUPER_ADMIN_PERMISSIONS = ['*'];
    const ROLES_PERMISSIONS = [
        RolesEnum::ADMIN => self::ADMIN_PERMISSIONS,
        RolesEnum::GUEST => self::GUEST_PERMISSIONS,
        RolesEnum::SUPER_ADMIN => self::SUPER_ADMIN_PERMISSIONS
    ];

    /**
     * @param string $role The user role
     * @return string[]
     */
    public static function getRolePermissions(string $role) {
        return self::ROLES_PERMISSIONS[$role];
    }

}