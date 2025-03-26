<?php
/**
 * Extented Controller For Admin
 *
 * PHP version 8.1
 *
 * @category BackendManagement
 * @package  App\Http\Controllers\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Helpers\Web\ResponseTrait;

/**
 * Define common trait and methods here
 *
 * PHP version 8.1
 *
 * @category BackendManagement
 * @package  App\Http\Controllers\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class Controller extends BaseController
{
    use ResponseTrait;
}
