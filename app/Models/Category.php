<?php
/**
 * For database interact with category tables
 * PHP version 8.1
 *
 * @category CategoryManagement
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
 * @category CategoryManagement
 * @package  App\Models
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'created_by',
        'updated_by',
    ];

    /**
     * Belongs to relationship with products
     *
     * @return never
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
