<?php
/**
 * Create Faqs by Seeder
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Repositories\Seeder;

use App\Models\Faq;

/**
 * Create Faqs by Seeder
 *
 * PHP version 8.1
 *
 * @category Repositories
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class FaqsSeederRepository
{
    /**
     * Constructor.
     *
     * @param Faq $faqModel Inject Model
     */
    public function __construct(
        protected Faq $faqModel
    ) {
    }

    /**
     * Check faq exists or not
     *
     * @param string $question question data
     *
     * @return object|null
     */
    public function checkFaqsExists(string $question): object|null
    {
        return $checkFaqsDb = $this->faqModel
            ->where("question", $question)
            ->first();
    }

    /**
     * Create Faqs
     *
     * @param array $faq request data
     *
     * @return object|null
     */
    public function createFaq(array $faq)
    {
        return $this->faqModel->create($faq);
    }
}
