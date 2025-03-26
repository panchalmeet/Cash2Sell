<?php

/**
 * Dashboard
 *
 * PHP version 8.1
 *
 * @category Authentication
 * @package  App\Http\Controllers\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Admin\Controller;
use Carbon\Carbon;

/**
 * Dashboard
 *
 * PHP version 8.1
 *
 * @category Authentication
 * @package  App\Http\Controllers
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

class DashboardController extends Controller
{
    /**
     * Construct
     */
    public function __construct(
        protected $allowLog = true,
        protected $isActiveLog = 1
    ) {
    }

    /**
     * Show the dashboard page.
     *
     * @author Meet Panchal
     * @return object
     */
    public function dashboard(): object
    {
        return view('admin.dashboard.index');
    }

    /**
     * Logout user from Admin.
     *
     * @author Meet Panchal
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout(): object
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
