<?php
/**
 * For database interact with OtpVerification tables
 * PHP version 8.1
 *
 * @category CmsManagement
 * @package  App\Models
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Table information and uuid generation
 *
 * @category UserManagement
 * @package  App\Models
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class OtpVerification extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'otp',
    ];

    /**
     * Belongs to relationship with user
     *
     * @return never
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
