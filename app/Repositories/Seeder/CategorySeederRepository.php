<?php
/**
 * Create category by Seeder
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Repositories\Seeder;

use App\Models\Category;

/**
 * Create category by Seeder
 *
 * PHP version 8.1
 *
 * @category Repositories
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class CategorySeederRepository
{
    /**
     * Constructor.
     *
     * @param Category $categoryModel Inject Model
     */
    public function __construct(
        protected Category $categoryModel
    ) {
    }

    /**
     * Check category exists or not
     *
     * @param string $category category
     *
     * @return object|null
     */
    public function checkCategoryExists(string $category): object|null
    {
        return $this->categoryModel
            ->where("name", $category)
            ->first();
    }

    /**
     * Create Category
     *
     * @param array $category request data
     *
     * @return object|null
     */
    public function createCategory(array $category)
    {
        return $this->categoryModel->create($category);
    }
}
