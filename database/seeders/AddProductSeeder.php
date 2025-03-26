<?php
/**
 * Create Seeder for Products
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
use App\Http\Services\Seeder\ProductSeederService;
use App\Enum\StatusEnum;

/**
 * Create Seeder for Products
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  Database\Seeders
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class AddProductSeeder extends Seeder
{
    /**
     * Constructor.
     *
     * @param ProductSeederService $productService Inject Service
     */
    public function __construct(
        protected ProductSeederService $productService
    ) {
    }

    // Product details
    public $productArr = [
        [
            'category_id' => 1,
            'name' => 'Redmi note 12 pro',
            'price' => '30000',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 
            'status' => 1,
            'created_by' => 1,
            'condition' => [
                'Fair',
                'Good',
                'Superb',
            ],
            'storage' => [
                '6/64 GB',
                '6/128 GB',
                '6/256 GB',
            ],
            'color' => [
                1,
                2,
                3,
            ],
        ],
        [
            'category_id' => 2,
            'name' => 'Redmi note 5 pro',
            'price' => '12000',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 
            'status' => 1,
            'created_by' => 1,
            'condition' => [
                'Fair',
                'Good',
                'Superb',
            ],
            'storage' => [
                '6/64 GB',
                '6/128 GB',
                '6/256 GB',
            ],
            'color' => [
                4,
                6,
                7,
            ],
        ],
        [
            'category_id' => 3,
            'name' => 'Vivo V11 Pro ',
            'price' => '22000',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 
            'status' => 1,
            'created_by' => 1,
            'condition' => [
                'Fair',
                'Good',
                'Superb',
            ],
            'storage' => [
                '6/64 GB',
                '6/128 GB',
                '6/256 GB',
            ],
            'color' => [
                4,
                6,
                7,
            ],
        ],
        [
            'category_id' => 2,
            'name' => 'Vivo Y83 Pro',
            'price' => '29000',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 
            'status' => 1,
            'created_by' => 1,
            'condition' => [
                'Fair',
                'Good',
                'Superb',
            ],
            'storage' => [
                '6/64 GB',
                '6/128 GB',
                '6/256 GB',
            ],
            'color' => [
                2,
                5,
                7,
            ],
        ],
        [
            'category_id' => 2,
            'name' => 'Vivo V11 Pro',
            'price' => '31000',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 
            'status' => 1,
            'created_by' => 1,
            'condition' => [
                'Fair',
                'Good',
                'Superb',
            ],
            'storage' => [
                '6/64 GB',
                '6/128 GB',
                '6/256 GB',
            ],
            'color' => [
                1,
                2,
                7,
            ],
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $seederResponse = $this->productService->createProducts(
            $this->productArr
        );
        $this->command->info("Products added successfully!");
        return true;
    }
}
