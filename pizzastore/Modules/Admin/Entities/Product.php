<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Categories;

class product extends Model
{
    protected $fillable = ['name','description','status','price','category_id','filename'];

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
