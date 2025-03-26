<?php
/**
 * ProductSeederService
 *
 * PHP version 8.1
 *
 * @category ProductSeederService
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Services\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Seeder\ProductSeederRepository;
use App\Repositories\Seeder\ProductColorSeederRepository;
use App\Repositories\Seeder\ProductConditionSeederRepository;
use App\Repositories\Seeder\ProductStorageSeederRepository;

/**
 * Product seeder Services
 *
 * PHP version 8.1
 *
 * @category ProductSeederService
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class ProductSeederService
{
    /**
     * Create a instance for User model.
     *
     * @param ProductSeederRepository          $productSeederRepo          inject repo
     * @param ProductColorSeederRepository     $productColorSeederRepo     inject repo
     * @param ProductConditionSeederRepository $productConditionSeederRepo inject repo
     * @param ProductStorageSeederRepository   $productStorageSeederRepo   inject repo
     *
     * @return void
     */
    public function __construct(
        protected ProductSeederRepository          $productSeederRepo,
        protected ProductColorSeederRepository     $productColorSeederRepo,
        protected ProductConditionSeederRepository $productConditionSeederRepo,
        protected ProductStorageSeederRepository   $productStorageSeederRepo
    ) {
    }

    /**
     * Create Products
     *
     * @param array $productsArr product data
     * @author Meet Panchal
     * @return bool
     */
    public function createProducts(array $productsArr): bool
    {
        foreach ($productsArr as $item) {
            
            $checkProduct = $this->productSeederRepo->checkProductExists(
                $item['name']
            );
            if (empty($checkProduct)) {
                $color     = $item['color']; unset($item['color']);
                $condition = $item['condition']; unset($item['condition']);
                $storage   = $item['storage']; unset($item['storage']);

                $product = $this->productSeederRepo->createProduct($item);
                
                if ($product->exists()) {
                    // Add product color
                    foreach ($color as $colorVal) {
                        $productColor = [];
                        $productColor['product_id'] = $product->id;
                        $productColor['color_id']   = $colorVal;
                        $this->productColorSeederRepo->createProductColor($productColor);
                    }

                    // Add product condition
                    foreach ($condition as $conditionVal) {
                        $productCondition = [];
                        $productCondition['product_id']  = $product->id;
                        $productCondition['condition']   = $conditionVal;
                        $this->productConditionSeederRepo->createProductCondition($productCondition);
                    }

                    // Add product storage
                    foreach ($storage as $storageVal) {
                        $productStorage = [];
                        $productStorage['product_id']  = $product->id;
                        $productStorage['storage']     = $storageVal;
                        $this->productStorageSeederRepo->createProductStorage($productStorage);
                    }
                }
            }
        }
        return true;
    }
}
