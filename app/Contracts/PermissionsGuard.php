<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 07/06/2015
 * Time: 12:46
 */

namespace App\Contracts;


interface PermissionsGuard {

    /**
     * Test if the current user has the provided permission
     * @param string $permissionKey The string key of the permission to test
     * @return bool
     */
    public function userCan($permissionKey);

}