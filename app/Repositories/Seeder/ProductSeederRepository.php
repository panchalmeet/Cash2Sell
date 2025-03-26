<?php
/**
 * Create product by Seeder
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Repositories\Seeder;

use App\Models\Product;

/**
 * Create product by Seeder
 *
 * PHP version 8.1
 *
 * @category Repositories
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class ProductSeederRepository
{
    /**
     * Constructor.
     *
     * @param Product $productModel Inject Model
     */
    public function __construct(
        protected Product $productModel
    ) {
    }

    /**
     * Check product exists or not
     *
     * @param string $product product
     *
     * @return object|null
     */
    public function checkProductExists(string $product): object|null
    {
        return $this->productModel
            ->where("name", $product)
            ->first();
    }

    /**
     * Create Product
     *
     * @param array $product request data
     *
     * @return object|null
     */
    public function createProduct(array $product)
    {
        return $this->productModel->create($product);
    }
}
