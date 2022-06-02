<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\HighLight;
use App\Models\Subcategory;
use App\Models\WebsiteSettings;

class WebsiteCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')->get()->all();
        $subcategories = Subcategory::select('id', 'category_id', 'name', 'url')
            ->orderBy('name', "asc")->get()->all();

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

        return view('pages.category.home', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'highlights' => $highlights,
            'website' => $website
        ));
    }

    public function show($category)
    {
        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')->get()->all();
        $subcategories = Subcategory::select('id', 'category_id', 'name', 'url')
            ->orderBy('name', "asc")->get()->all();


        $categoryFind = Category::select('id', 'name', 'url')->where('url', $category)->get()->first();
        $companies = Company::orderBy('name', "asc")->where('category_id', $categoryFind['id'])->get()->all();

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

        return view('pages.category.subcategory', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'highlights' => $highlights,
            'companies' => $companies,
            'categoryFind' => $categoryFind,
            'website' => $website
        ));
    }

    public function showSubcategory($category, $subcategory)
    {
        $categories = Category::select('id', 'name', 'url')
            ->orderBy('name', 'asc')->get()->all();
        $subcategories = Subcategory::select('id', 'category_id', 'name', 'url')
            ->orderBy('name', "asc")->get()->all();


        $categoryFind = Category::select('id', 'name', 'url')->where('url', $category)->get()->first();
        $subcategoryFind = Subcategory::select('id', 'name', 'url')->where('url', $subcategory)->get()->first();


        $companies = Company::select('id', 'name', 'description', 'url', 'street', 'city', 'uf', 'neighborhood', 'number', 'cep', 'stars', 'category_id', 'subcategory_id', 'img')
            ->orderBy('name', 'asc')
            ->where('category_id', $categoryFind['id'])
            ->where('subcategory_id', $subcategoryFind['id'])
            ->get()->all();


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

        return view('pages.company.find', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'highlights' => $highlights,
            'companies' => $companies,
            'categoryFind' => $categoryFind,
            'subcategoryFind' => $subcategoryFind,
            'website' => $website
        ));
    }
}
