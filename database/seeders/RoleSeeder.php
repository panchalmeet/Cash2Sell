<?php
/**
 * Create Seeder for roles table
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  Database\Seeders
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Services\Seeder\RoleSeederService;

/**
 * Create Seeder for role table
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  Database\Seeders
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class RoleSeeder extends Seeder
{
    /**
     * Constructor.
     *
     * @param RoleSeederService $roleSeederService inject Service
     */
    public function __construct(
        protected RoleSeederService $roleSeederService,
    ) {
    }

    public $roles = [
        [ 
            'role_name' => 'ADMIN',
            'status' => 1,
            'created_by' => 1
        ],
        [ 
            'role_name' => 'DEALER',
            'status' => 1,
            'created_by' => 1
        ]
    ];

    /**
     * Create new role
     *
     * @author Meet Panchal
     *
     * @return never
     */
    public function run()
    {
        foreach ($this->roles as $value) {
            $checkRole = $this->roleSeederService->findRecord($value['role_name']);
            if (!empty($checkRole)) {
                continue;
            }
            $this->roleSeederService->add(data:$value);
        }
    }
}
