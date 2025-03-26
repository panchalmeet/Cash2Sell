<?php
/**
 * For database interact with products tables
 * PHP version 8.1
 *
 * @category ProductManagement
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
 * @category ProductManagement
 * @package  App\Models
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    /**
     * Belongs to relationship with category
     *
     * @return never
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Belongs to relationship with color
     *
     * @return never
     */
    public function productColor()
    {
        return $this->hasMany(ProductColor::class);
    }

    /**
     * Belongs to relationship with condition
     *
     * @return never
     */
    public function productCondition()
    {
        return $this->hasMany(ProductCondition::class);
    }

    /**
     * Belongs to relationship with storage
     *
     * @return never
     */
    public function productStorage()
    {
        return $this->hasMany(ProductStorage::class);
    }
}
