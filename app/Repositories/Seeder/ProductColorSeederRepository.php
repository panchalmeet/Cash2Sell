<?php
/**
 * Create products colors by Seeder
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Repositories\Seeder;

use App\Models\ProductColor;

/**
 * Create product colors by Seeder
 *
 * PHP version 8.1
 *
 * @category Repositories
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class ProductColorSeederRepository
{
    /**
     * Constructor.
     *
     * @param ProductColor $productColorModel Inject Model
     */
    public function __construct(
        protected ProductColor $productColorModel
    ) {
    }

    /**
     * Create Product Color
     *
     * @param array $color request data
     *
     * @return object|null
     */
    public function createProductColor(array $color)
    {
        return $this->productColorModel->create($color);
    }
}
