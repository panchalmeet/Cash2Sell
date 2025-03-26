<?php
/**
 * Create products storage by Seeder
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Repositories\Seeder;

use App\Models\ProductStorage;

/**
 * Create product storage by Seeder
 *
 * PHP version 8.1
 *
 * @category Repositories
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class ProductStorageSeederRepository
{
    /**
     * Constructor.
     *
     * @param ProductStorage $productStorageModel Inject Model
     */
    public function __construct(
        protected ProductStorage $productStorageModel
    ) {
    }

    /**
     * Create product storage
     *
     * @param array $product request data
     *
     * @return object|null
     */
    public function createProductStorage(array $product)
    {
        return $this->productStorageModel->create($product);
    }
}
