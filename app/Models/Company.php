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
        'map',

        'category_id',
        'subcategory_id',

        'sunday-is-open',
        'sunday-from',
        'sunday-to',
        'sunday-lunch-from',
        'sunday-lunch-to',

        'monday-is-open',
        'monday-from',
        'monday-to',
        'monday-lunch-from',
        'monday-lunch-to',

        'tuesday-is-open',
        'tuesday-from',
        'tuesday-to',
        'tuesday-lunch-from',
        'tuesday-lunch-to',

        'wednesday-is-open',
        'wednesday-from',
        'wednesday-to',
        'wednesday-lunch-from',
        'wednesday-lunch-to',

        'thursday-is-open',
        'thursday-from',
        'thursday-to',
        'thursday-lunch-from',
        'thursday-lunch-to',

        'friday-is-open',
        'friday-from',
        'friday-to',
        'friday-lunch-from',
        'friday-lunch-to',

        'saturnday-is-open',
        'saturnday-from',
        'saturnday-to',
        'saturnday-lunch-from',
        'saturnday-lunch-to',

        'holiday-is-open',
        'holiday-from',
        'holiday-to',
        'holiday-lunch-from',
        'holiday-lunch-to',
    ];


    public static function create($request)
    {
        $company = new Company();
        $company['name'] = $request['name'];
        $company['email'] = $request['email'];
        $company['phone'] = $request['phone'];
        $company['cellphone'] = $request['cellphone'];
        $company['description'] = $request['description'];
        $company['category_id'] = $request['category'];
        $company['subcategory_id'] = $request['subcategory'];
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

        if (isset($request['sunday-is-open'])) {
            $company['sunday-is-open'] = $request['sunday-is-open'];
            $company['sunday-from'] = $request['sunday-from'];
            $company['sunday-to'] = $request['sunday-to'];
            $company['sunday-lunch-from'] = $request['sunday-lunch-from'];
            $company['sunday-lunch-to'] = $request['sunday-lunch-to'];
        }

        if (isset($request['monday-is-open'])) {
            $company['monday-is-open'] = $request['monday-is-open'];
            $company['monday-from'] = $request['monday-from'];
            $company['monday-to'] = $request['monday-to'];
            $company['monday-lunch-from'] = $request['monday-lunch-from'];
            $company['monday-lunch-to'] = $request['monday-lunch-to'];
        }

        if (isset($request['tuesday-is-open'])) {
            $company['tuesday-is-open'] = $request['tuesday-is-open'];
            $company['tuesday-from'] = $request['tuesday-from'];
            $company['tuesday-to'] = $request['tuesday-to'];
            $company['tuesday-lunch-from'] = $request['tuesday-lunch-from'];
            $company['tuesday-lunch-to'] = $request['tuesday-lunch-to'];
        }

        if (isset($request['wednesday-is-open'])) {
            $company['wednesday-is-open'] = $request['wednesday-is-open'];
            $company['wednesday-from'] = $request['wednesday-from'];
            $company['wednesday-to'] = $request['wednesday-to'];
            $company['wednesday-lunch-from'] = $request['wednesday-lunch-from'];
            $company['wednesday-lunch-to'] = $request['wednesday-lunch-to'];
        }

        if (isset($request['thursday-is-open'])) {
            $company['thursday-is-open'] = $request['thursday-is-open'];
            $company['thursday-from'] = $request['thursday-from'];
            $company['thursday-to'] = $request['thursday-to'];
            $company['thursday-lunch-from'] = $request['thursday-lunch-from'];
            $company['thursday-lunch-to'] = $request['thursday-lunch-to'];
        }

        if (isset($request['friday-is-open'])) {
            $company['friday-is-open'] = $request['friday-is-open'];
            $company['friday-from'] = $request['friday-from'];
            $company['friday-to'] = $request['friday-to'];
            $company['friday-lunch-from'] = $request['friday-lunch-from'];
            $company['friday-lunch-to'] = $request['friday-lunch-to'];
        }

        if (isset($request['saturday-is-open'])) {
            $company['saturday-is-open'] = $request['saturday-is-open'];
            $company['saturday-from'] = $request['saturday-from'];
            $company['saturday-to'] = $request['saturday-to'];
            $company['saturday-lunch-from'] = $request['saturday-lunch-from'];
            $company['saturday-lunch-to'] = $request['saturday-lunch-to'];
        }

        if (isset($request['holiday-is-open'])) {
            $company['holiday-is-open'] = $request['holiday-is-open'];
            $company['holiday-from'] = $request['holiday-from'];
            $company['holiday-to'] = $request['holiday-to'];
            $company['holiday-lunch-from'] = $request['holiday-lunch-from'];
            $company['holiday-lunch-to'] = $request['holiday-lunch-to'];
        }

        if (isset($request['highlights'])) {

            $highlight = new HighLight();
            $highlight['company_id'] = $company['id'];
        }

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
        $company['category_id'] = $request['category'];
        $company['subcategory_id'] = $request['subcategory'];
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

        if (isset($request['sunday-is-open'])) {
            $company['sunday-is-open'] = $request['sunday-is-open'];
            $company['sunday-from'] = $request['sunday-from'];
            $company['sunday-to'] = $request['sunday-to'];
            $company['sunday-lunch-from'] = $request['sunday-lunch-from'];
            $company['sunday-lunch-to'] = $request['sunday-lunch-to'];
        }

        if (isset($request['monday-is-open'])) {
            $company['monday-is-open'] = $request['monday-is-open'];
            $company['monday-from'] = $request['monday-from'];
            $company['monday-to'] = $request['monday-to'];
            $company['monday-lunch-from'] = $request['monday-lunch-from'];
            $company['monday-lunch-to'] = $request['monday-lunch-to'];
        }

        if (isset($request['tuesday-is-open'])) {
            $company['tuesday-is-open'] = $request['tuesday-is-open'];
            $company['tuesday-from'] = $request['tuesday-from'];
            $company['tuesday-to'] = $request['tuesday-to'];
            $company['tuesday-lunch-from'] = $request['tuesday-lunch-from'];
            $company['tuesday-lunch-to'] = $request['tuesday-lunch-to'];
        }

        if (isset($request['wednesday-is-open'])) {
            $company['wednesday-is-open'] = $request['wednesday-is-open'];
            $company['wednesday-from'] = $request['wednesday-from'];
            $company['wednesday-to'] = $request['wednesday-to'];
            $company['wednesday-lunch-from'] = $request['wednesday-lunch-from'];
            $company['wednesday-lunch-to'] = $request['wednesday-lunch-to'];
        }

        if (isset($request['thursday-is-open'])) {
            $company['thursday-is-open'] = $request['thursday-is-open'];
            $company['thursday-from'] = $request['thursday-from'];
            $company['thursday-to'] = $request['thursday-to'];
            $company['thursday-lunch-from'] = $request['thursday-lunch-from'];
            $company['thursday-lunch-to'] = $request['thursday-lunch-to'];
        }

        if (isset($request['friday-is-open'])) {
            $company['friday-is-open'] = $request['friday-is-open'];
            $company['friday-from'] = $request['friday-from'];
            $company['friday-to'] = $request['friday-to'];
            $company['friday-lunch-from'] = $request['friday-lunch-from'];
            $company['friday-lunch-to'] = $request['friday-lunch-to'];
        }

        if (isset($request['saturday-is-open'])) {
            $company['saturday-is-open'] = $request['saturday-is-open'];
            $company['saturday-from'] = $request['saturday-from'];
            $company['saturday-to'] = $request['saturday-to'];
            $company['saturday-lunch-from'] = $request['saturday-lunch-from'];
            $company['saturday-lunch-to'] = $request['saturday-lunch-to'];
        }

        if (isset($request['holiday-is-open'])) {
            $company['holiday-is-open'] = $request['holiday-is-open'];
            $company['holiday-from'] = $request['holiday-from'];
            $company['holiday-to'] = $request['holiday-to'];
            $company['holiday-lunch-from'] = $request['holiday-lunch-from'];
            $company['holiday-lunch-to'] = $request['holiday-lunch-to'];
        }

        if (isset($request['highlights'])) {
            $highlights = HighLight::find($company['id']);
            if (!$highlights) {
                $highlight = new HighLight();
                $highlight['company_id'] = $company['id'];
                $highlight->save();
            }
        } else {
            $highlights = HighLight::where('company_id', $company['id'])->get()->first();
            if ($highlights) {
                $highlight = HighLight::where('company_id', $company['id'])->get()->first();
                $highlight->delete();
            }
        }

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
