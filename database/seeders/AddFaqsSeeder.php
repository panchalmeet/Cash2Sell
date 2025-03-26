<?php
/**
 * Create Seeder for Faqs
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
use App\Http\Services\Seeder\FaqSeederService;
use App\Enum\StatusEnum;

/**
 * Create Seeder for Faqs
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  Database\Seeders
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class AddFaqsSeeder extends Seeder
{
    /**
     * Constructor.
     *
     * @param FaqSeederService $faqSeederService inject Repository
     */
    public function __construct(
        protected FaqSeederService $faqSeederService,
    ) {
    }

    public $faqArr = [
        [
            'question' => 'How To Sell Your Old Mobile Phone In 3 Steps?',
            'answer'   => 'When it comes to selling your old mobile phone in a super easy and convenient fashion, you can trust none but Cashify. Here are three hassle-free ways. On the Cashify website or app, under the Sell phone category, choose the brand name and model. Add a few details related to the phone to get the exact value. Schedule a doorstep pickup for your phone as per your preferred date and time slot. Receive instant cash at your doorstep once the pickup is complete. ', 
        ],
        [
            'question' => 'How to delete your Cashify IOS Account?',
            'answer'   => 'To delete your account please go through the following steps – Open the Cashify App and tap on the profile icon at the bottom right Select “My Account” then tap on “Delete My Account” Confirm the “Deletion Request” through OTP sent on your registered mobile number Account will be deleted successfully within 15 days In case of any pending order(s), please cancel them first to proceed. ', 
        ],
        [
            'question' => 'My mobile phone is not listed on the website. What to do now?',
            'answer'   => 'In such cases, please contact us by email at store@cashify.in. We shall respond to you within one business day and try to rectify the issue as soon as possible.', 
        ],
        [
            'question' => 'What more can we sell on Cashify except selling old phones?',
            'answer'   => 'Cashify lets you sell old phones, tablets, laptops, gaming consoles, DSLRs, earbuds, desktops, TV, smart speakers and more.', 
        ],
        [
            'question' => 'Will you take Dead mobiles too?',
            'answer'   => 'Yes,  we take broken and dead mobiles if you are selling mobile phone on Cashify. However, it might affect the overall quote of the phone.', 
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $seederResponse = $this->faqSeederService->createFaqs(
            $this->faqArr
        );
        $this->command->info("Faqs added successfully");
        return true;
    }
}
