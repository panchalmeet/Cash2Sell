<?php
/**
 * Service for add roles data
 *
 * PHP version 8.1
 *
 * @category General
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Services\Seeder;

use App\Repositories\Seeder\RolesSeederRepository;
use App\Http\Services\LoggingService;

/**
 * For get and add records in roles table
 *
 * @category General
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

class RoleSeederService
{
    protected $allowLog;
    protected $isActiveLog;
    /**
     * Roles service constructor.
     *
     * @param RolesSeederRepository $roleSeederRepository Inject repo
     * @param LoggingService        $loggingService       Inject Service
     * @param string                $logPath              manage log path
     */
    public function __construct(
        protected RolesSeederRepository $roleSeederRepository,
        protected LoggingService $loggingService,
        protected $logPath = "logs/cash2sell/Seeder/RoleSeeder.log",
    ) {
        $this->allowLog = true;
        $this->isActiveLog = true;
    }
    
    /**
     * For add new roles
     *
     * @param array $data roles data array
     *
     * @author Meet Panchal
     *
     * @return never
     */
    public function add($data)
    {
        $this->roleSeederRepository->create(data:$data);
    }

    /**
     * Check roles exists or not
     *
     * @param string $name for filter condition
     *
     * @author Meet Panchal
     *
     * @return object|null
     */
    public function findRecord($name)
    {
        return $this->roleSeederRepository->findRecord($name);
    }
}
