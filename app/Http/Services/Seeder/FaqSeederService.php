<?php
/**
 * FaqSeederService
 *
 * PHP version 8.1
 *
 * @category FaqSeederService
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Services\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Seeder\FaqsSeederRepository;
use App\Enum\StatusEnum;
use Carbon\Carbon;

/**
 * FaqSeeder Services
 *
 * PHP version 8.1
 *
 * @category FaqSeederService
 * @package  App\Http\Services\Seeder
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class FaqSeederService
{
    /**
     * Create a instance for User model.
     *
     * @param FaqsSeederRepository $faqsSeederRepo inject repo
     *
     * @return void
     */
    public function __construct(
        protected FaqsSeederRepository $faqsSeederRepo
    ) {
    }

    /**
     * Create Faqs
     *
     * @param array $faqArr faqs data
     * @author Meet Panchal
     * @return bool
     */
    public function createFaqs(array $faqArr): bool
    {
        $checkUser = [];
        foreach ($faqArr as $item) {
            
            $checkFaq = $this->faqsSeederRepo->checkFaqsExists(
                $item['question']
            );
            if (empty($checkFaq)) {
                $item['created_by'] = 1;
                $this->faqsSeederRepo->createFaq($item);
            }
        }
        return true;
    }
}
