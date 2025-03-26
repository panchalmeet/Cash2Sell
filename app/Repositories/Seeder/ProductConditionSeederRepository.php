<?php
/**
 * Create products conditions by Seeder
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Repositories\Seeder;

use App\Models\ProductCondition;

/**
 * Create product condition by Seeder
 *
 * PHP version 8.1
 *
 * @category Repositories
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class ProductConditionSeederRepository
{
    /**
     * Constructor.
     *
     * @param ProductCondition $productConditionModel Inject Model
     */
    public function __construct(
        protected ProductCondition $productConditionModel
    ) {
    }

    /**
     * Create product condition
     *
     * @param array $product request data
     *
     * @return object|null
     */
    public function createProductCondition(array $product)
    {
        return $this->productConditionModel->create($product);
    }
}
