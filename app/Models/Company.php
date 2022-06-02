<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'cellphone',
        'code',
        'description',
        'cep',
        'uf',
        'city',
        'neighborhood',
        'street',
        'img',
        'stars',
        'url',
        'website',
        'map'
    ];


    public static function create($request)
    {
        $company = new Company();
        $company['name'] = $request['name'];
        $company['email'] = $request['email'];
        $company['phone'] = $request['phone'];
        $company['cellphone'] = $request['cellphone'];
        $company['description'] = $request['description'];
        $company['code'] = $request['code'];
        $company['cep'] = $request['cep'];
        $company['uf'] = $request['uf'];
        $company['city'] = $request['city'];
        $company['neighborhood'] = $request['neighborhood'];
        $company['street'] = $request['street'];
        $company['number'] = $request['number'];
        $company['url'] = $request['url'];
        $company['website'] = $request['website'];
        $company['map'] = $request['map'];

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
        $company['email'] = $request['email'];
        $company['phone'] = $request['phone'];
        $company['cellphone'] = $request['cellphone'];
        $company['description'] = $request['description'];
        $company['code'] = $request['code'];
        $company['cep'] = $request['cep'];
        $company['uf'] = $request['uf'];
        $company['city'] = $request['city'];
        $company['neighborhood'] = $request['neighborhood'];
        $company['street'] = $request['street'];
        $company['number'] = $request['number'];
        $company['url'] = $request['url'];
        $company['website'] = $request['website'];
        $company['map'] = $request['map'];

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
