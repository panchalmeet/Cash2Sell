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

/**
 * Table information and uuid generation
 *
 * @category ProductManagement
 * @package  App\Models
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class ProductColor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'color_id',
    ];

    /**
     * Belongs to relationship with colorMaster
     *
     * @return never
     */
    public function color()
    {
        return $this->belongsTo(ColorMaster::class, 'color_id', 'id');
    }

    /**
     * Belongs to relationship with product
     *
     * @return never
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
