<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Categories;
use Modules\Api\Entities\OrderItem;
use Modules\Api\Entities\Order;

class product extends Model
{
    protected $fillable = ['name','description','status','price','category_id','type','filename'];

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
