<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\HighLight;
use App\Models\Subcategory;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteCompanyController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')->get()->all();

        $subcategories = Subcategory::select('id', 'category_id', 'name', 'url')
            ->orderBy('name', "asc")->get()->all();

        $companies = Company::select('id', 'name', 'description', 'url', 'street', 'city', 'uf', 'neighborhood', 'number', 'cep', 'stars', 'category_id', 'subcategory_id', 'img')
            ->orderBy('name', 'asc')
            ->paginate(20);

        foreach ($companies as $item) {
            $category_name = Category::select('url')->where('id', $item['category_id'])->get()->first();
            $subcategory_name = Subcategory::select('url')->where('id', $item['subcategory_id'])->get()->first();

            $item['category'] = $category_name['url'];
            $item['subcategory'] = $subcategory_name['url'];
        }

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

        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        return view('pages.company.home', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'highlights' => $highlights,
            'website' => $website,
            'companies' => $companies
        ));
    }

    public function show($categoryUrl, $subcategoryUrl, $companyUrl)
    {
        $currentTime = date('H:i');

        $categories = Category::select('id', 'name', 'url')->orderBy('name', 'asc')->get()->all();

        $subcategories = Subcategory::select('id', 'name', 'url', 'category_id')
            ->orderBy('name', 'asc')->get()->all();

        $company = Company::where('url', $companyUrl)->get()->first();
        $categoryFind = Category::where('url', $categoryUrl)->get()->first();
        $subcategoryFind = Subcategory::where('url', $subcategoryUrl)->get()->first();

        $company['views'] = $company['views'] + 1;
        $company->save();

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

        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        return view('pages.company.show', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'highlights' => $highlights,
            'company' => $company,
            'categoryFind' => $categoryFind,
            'subcategoryFind' => $subcategoryFind,
            'website' => $website,
            'currentTime' => $currentTime
        ));
    }

    public function positive($id)
    {
        $company = Company::find($id);
        $company['stars'] = $company['stars'] + 1;

        $company->save();
        return true;
    }

    public function negative($id)
    {
        $company = Company::find($id);
        if ($company['stars'] >= 1) {
            $company['stars'] = $company['stars'] - 1;
            $company->save();
        }

        return true;
    }
}
