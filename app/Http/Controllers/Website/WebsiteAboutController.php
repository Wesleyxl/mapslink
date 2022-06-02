<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\HighLight;
use App\Models\Subcategory;
use App\Models\WebsiteSettings;

class WebsiteAboutController extends Controller
{
    public function index()
    {
        $companies = HighLight::get()->all();

        $highlights = array();
        foreach ($companies as $company) {
            $company_name = Company::select('id', 'name', 'url', 'street', 'city', 'uf', 'neighborhood', 'number', 'cep', 'stars', 'category_id', 'subcategory_id', 'img')
                ->where('id', $company['company_id'])->get()->first();
            array_push($highlights, $company_name);
        }

        foreach ($highlights as $company) {
            $category_name = Category::select('url')->where('id', $company['category_id'])->get()->first();
            $subcategory_name = Subcategory::select('url')->where('id', $company['subcategory_id'])->get()->first();

            $company['category'] = $category_name['url'];
            $company['subcategory'] = $subcategory_name['url'];
        }

        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        return view('pages.about.home', array(
            'website' => $website,
            'highlights' => $highlights
        ));
    }
}
