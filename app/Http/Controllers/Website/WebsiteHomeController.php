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


        return view('pages.home.home', array(
            'website' => $website,
        ));
    }
}
