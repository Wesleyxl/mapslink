<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\HighLight;
use App\Models\Subcategory;
use App\Models\WebsiteSettings;

class WebsiteHomeController extends Controller
{
    public function index()
    {

        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();
        $website['views'] += 1;
        $website->save();

        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')
            ->limit(12)
            ->get();

        $subcategories = Subcategory::select('id', 'name', 'category_id', 'url')
            ->orderBy('name', 'asc')
            ->get()
            ->all();

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


        return view('pages.home.home', array(
            'categories' => $categories,
            'website' => $website,
            'subcategories' => $subcategories,
            'highlights' => $highlights,
        ));
    }

    public function search(Request $request)
    {
        $companies = Company::orderBy('name', 'asc')
            ->where('uf', $request['uf'])
            ->where('name', 'like', '%' . $request['search'] . '%')
            ->orWhere('description', 'like', '%' . $request['search'] . '%')
            ->get()->all();

        $categories = Category::select('id', 'name', 'url')->orderBy('name', 'asc')
            ->get()->all();

        $subcategories = Subcategory::select('id', 'name', 'url', 'category_id')->orderBy('name', 'asc')
            ->get()->all();

        $companies_highlights = HighLight::get()->all();

        $highlights = array();
        foreach ($companies_highlights as $highlight) {
            $company_name = Company::select('id', 'name', 'url', 'street', 'city', 'uf', 'neighborhood', 'number', 'cep', 'stars', 'category_id', 'subcategory_id', 'img')
                ->where('id', $highlight['company_id'])->get()->first();
            array_push($highlights, $company_name);
        }

        foreach ($highlights as $company_highlight) {
            $category_name = Category::select('url')->where('id', $company_highlight['category_id'])->get()->first();
            $subcategory_name = Subcategory::select('url')->where('id', $company_highlight['subcategory_id'])->get()->first();

            $company_highlight['category'] = $category_name['url'];
            $company_highlight['subcategory'] = $subcategory_name['url'];
        }


        foreach ($companies as $company) {
            $category = Category::select('id', 'url')
                ->where('id', $company['category_id'])
                ->get()->first();

            $subcategory = Subcategory::select('id', 'url')
                ->where('id', $company['subcategory_id'])
                ->get()
                ->first();

            $company['category'] = $category['url'];
            $company['subcategory'] = $subcategory['url'];
        }

        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        return view('pages.company.search', array(
            'companies' => $companies,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'website' => $website,
            'highlights' => $highlights
        ));
    }
}
