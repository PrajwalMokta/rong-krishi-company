<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_category';

    static public function getSubCategory(){
        return self::select('sub_category.*', 'users.name as created_by_name', 'category.name as category_name')
        ->join('category', 'category.id', '=', 'sub_category.category_id')
        ->join('users', 'users.id', '=', 'sub_category.created_by')
        ->where('sub_category.is_delete','=', 0)
        ->orderBy('sub_category.id', 'asc')
        ->paginate(8);
    }

    static public function getSingle($id){
        return SubCategory::find($id);
    }

    static public function getSubCategoryRecord($category_id){
        return self::select('sub_category.*')
        ->join('users', 'users.id', '=', 'sub_category.created_by')
        ->where('sub_category.is_delete','=', 0)
        ->where('sub_category.status','=', 0)
        ->where('sub_category.category_id','=', $category_id)
        ->orderBy('sub_category.name', 'asc')
        ->get();
    }

    static public function getSubCategoryActive(){
        return self::select('sub_category.*')
        ->join('users', 'users.id', '=', 'sub_category.created_by')
        ->where('sub_category.is_delete','=', 0)
        ->where('sub_category.status','=', 0)
        ->orderBy('sub_category.name', 'asc')
        ->get();
    }
}