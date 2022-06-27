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

        $companies = Company::orderBy('name', 'asc')->get()->all();

        return view('pages.home.home', array(
            'website' => $website,
            'companies' => $companies
        ));
    }

    public function search(Request $request)
    {
        $companies = Company::orderBy('name', 'asc')
            ->where('name', 'like', '%' . $request['data'] . "%")
            ->get()->all();

        return view('pages.home.search', array(
            'companies' => $companies
        ));
    }
}
