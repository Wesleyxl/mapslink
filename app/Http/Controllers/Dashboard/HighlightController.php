<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Email;
use App\Models\HighLight;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $companies = HighLight::get()->all();

        $highlights = array();
        foreach ($companies as $company) {
            $company_name = Company::where('id', $company['company_id'])->get()->first();
            array_push($highlights, $company_name);
        }


        return view('dashboard.highlights.home', array(
            'highlights' => $highlights,
            'notifications' => $notifications
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $companies = Company::orderBy('name', 'asc')
            ->paginate(10);

        foreach ($companies as $company) {
            $category_name = Category::select('name')
                ->where('id', $company['category_id'])->first();
            $subcategory_name = Subcategory::select('name')
                ->where('id', $company['subcategory_id'])->first();

            $company['category_name'] = $category_name['name'];
            $company['subcategory_name'] =  $subcategory_name['name'];
        }

        // return view('dashboard.highlights.create', array(
        //     'highlights' => $companies,
        //     'notifications' => $notifications
        // ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $highlight = HighLight::where('company_id', $id)->get()->first();

        try {
            $highlight->delete();
            return redirect()->back()->with('warning', 'Destaque deletado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }
}
