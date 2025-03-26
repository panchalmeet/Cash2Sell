<?php
/**
 * Repository for roles
 *
 * PHP version 8.1
 *
 * @category General
 * @package  App\Http\Repositories\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Repositories\Seeder;

use App\Models\Role;
use App\Http\Services\LoggingService;

/**
 * This class use for perform roles related curd operations
 *
 * @category General
 * @package  App\Http\Repositories\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

class RolesSeederRepository
{
    /**
     *  DBindex seeder constructor.
     *
     * @param object LoggingService $loggingService inject service
     * @param object role           $role           inject model
     */
    public function __construct(
        protected LoggingService $loggingService,
        protected Role           $role,
    ) {
    }

    /**
     * For add new role
     *
     * @param array data $data role data array
     *
     * @author Meet Panchal
     *
     * @return never
     */
    public function create($data)
    {
        $this->role->create($data);
    }

    /**
     * Find role exists in database or not
     *
     * @param string $name role name search query
     *
     * @author Meet Panchal
     *
     * @return int
     */
    public function findRecord($name)
    {
        return $this->role::
            where('role_name', 'LIKE', $name)->first();
    }
}
