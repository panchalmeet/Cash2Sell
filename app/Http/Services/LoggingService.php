<?php
/**
 * This service used to  store error, info and warning logs
 *
 * PHP version 8.1
 *
 * @category LogManagement
 * @package  App\Http\Services
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Services;

use Illuminate\Support\Facades\Log;

/**
 * Service for log of particular file path and particular log for daily basis
 *
 * PHP version 8.1
 *
 * @category LogManagement
 * @package  App\Http\Services
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class LoggingService
{
    protected $allowAllLog;
    /**
     * Create a constructure for use property.
     *
     * @param string $channel  log channel name
     * @param string $timezone store log timezone
     *
     * @return never
     */
    public function __construct(
        protected $channel = "cash2sell",
        protected $timezone = "Timezone:UTC"
    ) {
        $this->allowAllLog = env('ALL_LOG_ALLOW');
    }

    /**
     * For store info log
     *
     * @param string  $filePath    log storage path
     * @param string  $message     log storage path
     * @param boolean $allowAllLog for disable log
     *
     * @author Meet Panchal
     * @return never
     */
    public function infoLog(
        string $filePath = "",
        string $message = "",
        $allowAllLog = true
    ) {
        if ($this->allowAllLog && $allowAllLog) {
            $logMessage = $this->timezone;
            $logMessage.="\n---------------------------------------------------------------------------\n";
            $logMessage.= print_r($message, 1);
            $logMessage.="\n---------------------------------------------------------------------------\n\n";
            if ($filePath === '') {
                Log::channel($this->channel)->info($logMessage);
            }
            Log::build(
                ['driver' => 'daily',
                'path' => storage_path($filePath)]
            )->info($logMessage);
        }
    }
    /**
     * For store error log
     *
     * @param string  $filePath    log storage path
     * @param string  $message     log storage path
     * @param boolean $allowAllLog for disable log
     *
     * @author Meet Panchal
     * @return never
     */
    public function errorLog(
        string $filePath = "",
        string $message = "",
        $allowAllLog = true
    ) {
        if ($this->allowAllLog && $allowAllLog) {
            $logMessage = $this->timezone;
            $logMessage.="\n==========================================================================\n";
            $logMessage.= print_r($message, 1);
            $logMessage.="\n==========================================================================\n\n";
            if ($filePath === '') {
                Log::channel($this->channel)->info($logMessage);
            }
            Log::build(
                ['driver' => 'daily',
                'path' => storage_path($filePath)]
            )->error($logMessage);
        }
    }

    /**
     * For store warning log
     *
     * @param string  $filePath    log storage path
     * @param string  $message     log storage path
     * @param boolean $allowAllLog for disable log
     *
     * @author Meet Panchal
     * @return never
     */
    public function warningLog(
        string $filePath = "",
        string $message = "",
        $allowAllLog = true
    ) {
        if ($this->allowAllLog && $allowAllLog) {
            $logMessage = $this->timezone;
            $logMessage.="\n<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n";
            $logMessage.= print_r($message, 1);
            $logMessage.="\n<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n\n";
            if ($filePath === '') {
                Log::channel($this->channel)->info($logMessage);
            }
            Log::build(
                ['driver' => 'daily',
                'path' => storage_path($filePath)]
            )->warning($logMessage);
        }
    }
}
