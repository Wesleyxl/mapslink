<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'url'
    ];

    public static function create($request)
    {
        $category = new Category();
        $category['name'] = $request['name'];
        $category['description'] = $request['description'];
        $category['url'] = $request['url'];

        if ($category->save()) {
            return $category;
        } else {
            return false;
        }
    }

    public static function edit($request, $id = 0)
    {
        if ($id) {
            $category = Category::find($id);
        } else {
            return false;
        }

        $category['name'] = $request['name'];
        $category['description'] = $request['description'];
        $category['url'] = $request['url'];

        if ($category->save()) {
            return $category;
        } else {
            return false;
        }
    }
}
