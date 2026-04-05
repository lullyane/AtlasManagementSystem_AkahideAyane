<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = [
        'main_category_id',
        'sub_category',
    ];

    // リレーションの定義
    public function mainCategory(){
        return $this->beLongsTo(MainCategory::class);
    }

    // リレーションの定義
    public function posts(){
        return $this->beLongsTo(SubCategory::class);
    }
}
