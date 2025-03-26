<?php
/**
 * ColorSeederService
 *
 * PHP version 8.1
 *
 * @category ColorSeederService
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Services\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Seeder\ColorsSeederRepository;
use App\Enum\StatusEnum;
use Carbon\Carbon;

/**
 * FaqSeeder Services
 *
 * PHP version 8.1
 *
 * @category ColorSeederService
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class ColorSeederService
{
    /**
     * Create a instance for User model.
     *
     * @param ColorsSeederRepository $colorSeederRepo inject repo
     *
     * @return void
     */
    public function __construct(
        protected ColorsSeederRepository $colorSeederRepo
    ) {
    }

    /**
     * Create Faqs
     *
     * @param array $colorsArr colors data
     * @author Meet Panchal
     * @return bool
     */
    public function createColors(array $colorsArr): bool
    {
        foreach ($colorsArr as $item) {
            
            $checkColor = $this->colorSeederRepo->checkColorExists(
                $item['name']
            );
            if (empty($checkColor)) {
                $this->colorSeederRepo->createColor($item);
            }
        }
        return true;
    }
}
