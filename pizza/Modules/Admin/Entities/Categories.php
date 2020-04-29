<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Product;

class Categories extends Model
{
    protected $fillable = ['name'];

    /**
     * The products that belong to the categories.
     */
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
