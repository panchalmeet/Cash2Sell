<?php

/**
 * Forgot and Reset Password for Admin
 *
 * PHP version 8.1
 *
 * @category PasswordReset
 * @package  App\Http\Services\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Services\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Enum\UserRoleEnum;

/**
 * Perform reset password for admin
 *
 * PHP version 8.1
 *
 * @category PasswordReset
 * @package  App\Http\Services\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class PasswordResetService
{
    /**
     * Create a instance for User model.
     *
     * @return void
     */
    public function __construct(protected User $user)
    {
    }

    /**
     * Forgot admin Password
     *
     * @param array $request input data
     * @author Meet Panchal
     * @return string
     */
    public function forgotPassword(object $input): string
    {
        $status = Password::sendResetLink(
            $input->only('email')
        );
        return $status;
    }

    /**
     * Reset new password for admin
     *
     * @param array $request input data
     * @author Meet Panchal
     * @return string
     */
    public function resetPassword(object $input): string
    {
        $status = Password::reset(
            $input->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
        return $status;
    }
}
