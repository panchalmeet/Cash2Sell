<?php
/**
 * CategorySeederService
 *
 * PHP version 8.1
 *
 * @category CategorySeederService
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Services\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Seeder\CategorySeederRepository;
use App\Enum\StatusEnum;

/**
 * CategorySeeder Services
 *
 * PHP version 8.1
 *
 * @category CategorySeederService
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class CategorySeederService
{
    /**
     * Create a instance for User model.
     *
     * @param CategorySeederRepository $categorySeederRepo inject repo
     *
     * @return void
     */
    public function __construct(
        protected CategorySeederRepository $categorySeederRepo
    ) {
    }

    /**
     * Create category
     *
     * @param array $categoryArr category data
     * @author Meet Panchal
     * @return bool
     */
    public function createCategory(array $categoryArr): bool
    {
        foreach ($categoryArr as $item) {
            
            $checkCategory = $this->categorySeederRepo->checkCategoryExists(
                $item['name']
            );
            if (empty($checkCategory)) {
                $item['created_by'] = 1;
                $this->categorySeederRepo->createCategory($item);
            }
        }
        return true;
    }
}
