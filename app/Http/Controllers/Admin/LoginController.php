<?php
/**
 * Admin login controller
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
use Illuminate\Support\Facades\Auth;
use App\Http\Services\LoggingService;
use App\Http\Services\Admin\LoginService;
use App\Http\Requests\Admin\LoginRequest;
use Carbon\Carbon;
use Exception as Exception;
use App\Models\User;
use App\Enum\UserRoleEnum;

/**
 * Class LoginController
 *
 * PHP version 8.1
 *
 * @category Controller
 * @package  App\Http\Controllers\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class LoginController extends Controller
{
    protected $allowLog;
    protected $isActiveLog;

    /**
     * Admin login constructor.
     *
     * @param LoginService      $loginService   Inject service
     * @param LoggingService    $loggingService Inject service
     * @param string            $logPath        manage log path
     */
    public function __construct(
        protected LoginService $loginService,
    ) {
        $this->allowLog = true;
        $this->isActiveLog = true;
    }

    /**
     * Admin User Login View
     * @return object
     */
    public function loginView(): object
    {
        return view('admin.auth.login');
    }

    /**
     * Manage Admin login functionality
     *
     * @param Request $request input data
     *
     * @author Meet Panchal
     *
     * @return object
     */
    public function login(LoginRequest $request): object
    {
        try {
            $isLogin = $this->loginService->authLogin($request, UserRoleEnum::ADMIN->value);

            if ($isLogin) {
                return $this->success('admin.dashboard', 'LOGIN_SUCCESS');
            } else {
                return $this->error('admin.login', 'LOGIN_ERROR');
            }
        } catch (Exception $e) {

            if (method_exists('getStatusCode', $e) && $e->getStatusCode()==404) {
                return abort(404, 'Page not found.');
            }
            return $this->error('admin.login', 'ERROR');
        }
    }
}
