<?php

/**
 * Login services for the Admin
 *
 * PHP version 8.1
 *
 * @category LoginService
 * @package  App\Http\Services\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Services\Admin;

use Illuminate\Support\Facades\Auth;
use App\Enum\UserRoleEnum;

/**
 * Perform Admin Login authentication
 *
 * PHP version 8.1
 *
 * @category LoginService
 * @package  App\Http\Services\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

class LoginService
{
    /**
     * Check user creditials
     *
     * @param array $request input data
     *
     * @author Meet Panchal
     *
     * @return bool
     */
    public function authLogin(object $input, int $type = null): bool
    {
        if (empty($type)) {
            $type = UserRoleEnum::ADMIN->value;
        }
        Auth::logoutOtherDevices($input->only('password'));
        $credentials = $input->only('email', 'password');
        $credentials['role_id'] = $type;
        return Auth::attempt($credentials);
    }
}
