<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'map'
    ];


    public static function create($request)
    {
        $company = new Company();
        $company['name'] = $request['name'];
        $company['description'] = $request['description'];
        $company['map'] = $request['map'];
        $company['url'] = $request['url'];


        if ($request->hasFile('img')) {
            $image = $request->file('img');


            $name = $request['url'] . '.' . $image->getClientOriginalExtension();
            $request->file('img')->move(public_path('assets/image/companies'), $name);

            $company['img'] = 'public/assets/image/companies/' . $name;
        }


        if ($company->save()) {
            return $company;
        } else {
            return false;
        }
    }

    public static function edit($request, $id = 0)
    {
        if ($id) {
            $company = Company::find($id);
        } else {
            return false;
        }

        $company['name'] = $request['name'];
        $company['description'] = $request['description'];
        $company['map'] = $request['map'];
        $company['url'] = $request['url'];

        if ($request->hasFile('img')) {

            try {
                //code...
                unlink($company['img']);
            } catch (\Throwable $th) {
                //throw $th;
            }

            $image = $request->file('img');


            $name = $request['url'] . '.' . $image->getClientOriginalExtension();
            $request->file('img')->move(public_path('assets/image/companies'), $name);


            $company['img'] = 'public/assets/image/companies/' . $name;
        }

        if ($company->save()) {
            return $company;
        } else {
            return false;
        }
    }
}
