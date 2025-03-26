<?php
/**
 * Create Seeder for category
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
use App\Http\Services\Seeder\CategorySeederService;

/**
 * Create Seeder for Category
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  Database\Seeders
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class AddCategorySeeder extends Seeder
{
    /**
     * Constructor.
     *
     * @param CategorySeederService $categorySeederService Inject Service
     */
    public function __construct(
        protected CategorySeederService $categorySeederService
    ) {
    }

    public $categoryArr = [
        [
            'name' => 'Apple',
            'status' => 1
        ],
        [
            'name' => 'Redmi',
            'status' => 1
        ],
        [
            'name' => 'Nokia',
            'status' => 1
        ],
        [
            'name' => 'LG',
            'status' => 1
        ],
        [
            'name' => 'Oneplus',
            'status' => 1
        ],
        [
            'name' => 'Realme',
            'status' => 1
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $seederResponse = $this->categorySeederService->createCategory(
            $this->categoryArr
        );
        $this->command->info("Categories added successfully!");
        return true;
    }
}
