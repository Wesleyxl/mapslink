<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'url'
    ];

    public static function create($request)
    {
        $subcategory = new Subcategory();
        $subcategory['name'] = $request['name'];
        $subcategory['category_id'] = $request['category'];
        $subcategory['description'] = $request['description'];
        $subcategory['url'] = $request['url'];

        if ($subcategory->save()) {
            return $subcategory;
        } else {
            return false;
        }
    }

    public static function edit($request, $id = 0)
    {
        if ($id) {
            $subcategory = Subcategory::find($id);
        } else {
            return false;
        }

        $subcategory['name'] = $request['name'];
        $subcategory['category_id'] = $request['category'];
        $subcategory['description'] = $request['description'];
        $subcategory['url'] = $request['url'];

        if ($subcategory->save()) {
            return $subcategory;
        } else {
            return false;
        }
    }
}
