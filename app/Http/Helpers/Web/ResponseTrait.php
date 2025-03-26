<?php
/**
 * Handler for Success/Fail Response of Web
 *
 * PHP version 8.1
 *
 * @category Flash message
 * @package  App\Http\Helpers\Web
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Helpers\Web;

/**
 * Handle success, error response
 *
 * @category Flash message
 * @package  App\Http\Helpers\Web
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
trait ResponseTrait
{

    /**
     * Purpose Response - Success
     *
     * @param string $message  response message
     *
     * @author Meet Panchal
     * @return object
     */
    public function success(string $route = '/', string $message = 'SUCCESS', string $param = null): object
    {
        if (!empty($param)) {
            return redirect()
            ->route($route, $param)
            ->with('success', trans('message.'.$message, [], 'en'));
        }
        return redirect()
            ->route($route)
            ->with('success', trans('message.'.$message, [], 'en'));
    }

    /**
     * Purpose Response - Error
     *
     * @param string    $message  response message
     *
     * @param array|mix $dataErr  response data
     *
     * @author Meet Panchal
     * @return object
     */
    public function error(string $route = '/', string $message = 'ERROR', string $param = null): object
    {
        if (!empty($param)) {
            return redirect()
                ->route($route, $param)
                ->with('error', trans('error.'.$message, [], 'en'));
        }
        return redirect()
            ->route($route)
            ->with('error', trans('error.'.$message, [], 'en'));
    }
}
