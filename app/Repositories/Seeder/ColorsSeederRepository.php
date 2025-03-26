<?php
/**
 * Create Colors by Seeder
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Repositories\Seeder;

use App\Models\ColorMaster;

/**
 * Create Colors by Seeder
 *
 * PHP version 8.1
 *
 * @category Repositories
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class ColorsSeederRepository
{
    /**
     * Constructor.
     *
     * @param ColorMaster $colorModel Inject Model
     */
    public function __construct(
        protected ColorMaster $colorModel
    ) {
    }

    /**
     * Check color exists or not
     *
     * @param string $color color
     *
     * @return object|null
     */
    public function checkColorExists(string $color): object|null
    {
        return $this->colorModel
            ->where("name", $color)
            ->first();
    }

    /**
     * Create Color
     *
     * @param array $color request data
     *
     * @return object|null
     */
    public function createColor(array $color)
    {
        return $this->colorModel->create($color);
    }
}
