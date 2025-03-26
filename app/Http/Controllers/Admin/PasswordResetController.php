<?php
/**
 * Admin forgot password
 *
 * PHP version 8.1
 *
 * @category Controller
 * @package  App\Http\Controllers\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Services\Admin\PasswordResetService;
use App\Http\Requests\Admin\PasswordResetRequest;
use App\Http\Requests\Admin\ForgotPassRequest;
use Exception as Exception;
use App\Models\User;
use App\Enum\UserRoleEnum;
use Illuminate\Support\Facades\Password;

/**
 * Manager Reset Password Functionality
 *
 * PHP version 8.1
 *
 * @category Authentication
 * @package  App\Http\Controllers\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class PasswordResetController extends Controller
{
    /**
     * Password reset services
     *
     * @param PasswordResetService $passwordResetService
     */
    public function __construct(protected PasswordResetService $passwordResetService)
    {
    }

    /**
     * Manager forgot password View
     *
     * @author Meet Panchal
     *
     * @return response()
     */
    public function index(): object
    {
        return view('admin.auth.reset-password');
    }

    /**
     * Send rassword reset link for manager
     *
     * @param ForgotPassRequest $request
     *
     * @author Meet Panchal
     *
     * @return object
     */
    public function forgotPassword(ForgotPassRequest $request): object
    {
        try {
            $user = User::where('email', $request->get('email'))->where('role_id', UserRoleEnum::ADMIN->value)->first();
            if (!$user) {
                return $this->error('admin.password.request', 'EMAIL_INVALID');
            }
            $status = $this->passwordResetService->forgotPassword($request);
            return $status === Password::RESET_LINK_SENT
                        ? back()->with(['success' => __($status)])
                        : back()->withError(__($status));
        } catch (Exception $e) {
            return $this->error('admin.password.request', 'ERROR');
        }
    }

    /**
     * Manager reset password view
     *
     * @param token
     *
     * @author Meet Panchal
     *
     * @return response()
     */
    public function resetForm($token): object
    {
        return view('admin.auth.reset-password', compact('token'));
    }

    /**
     * Manager Reset Password View
     *
     * @author Meet Panchal
     *
     * @return object
     */
    public function resetPassword(PasswordResetRequest $request): object
    {
        try {
            $status = $this->passwordResetService->resetPassword($request);
            $redirect = 'login';
            return $status === Password::PASSWORD_RESET
                    ? redirect()->route($redirect)->with('success', __($status))
                    : back()->withError(__($status));
        } catch (Exception $e) {
            return $this->error('admin.password.reset', 'ERROR', $request->token);
        }
    }

    /**
     * Contractor reset password success view
     *
     * @author Meet Panchal
     *
     * @return response()
     */
    public function resetPasswordSuccess(): object
    {
        return view('admin.auth.reset-password-success');
    }
}
