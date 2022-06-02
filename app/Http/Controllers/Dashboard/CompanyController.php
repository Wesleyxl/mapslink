<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Email;
use App\Models\HighLight;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        return view('dashboard.company.home', array(
            'companies' => $companies,
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

        $categories = Category::orderBy('name', 'asc')->get()->all();
        $subcategories = Subcategory::orderBy('name', 'asc')->get()->all();

        return view('dashboard.company.create', array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'notifications' => $notifications
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:256',
            'email' => 'required|string|email',
            'code' => 'string',
            'category' => 'required|string',
            'description' => 'required|string|min:3',
            'cep' => 'required|string',
            'uf' => 'required|string',
            'city' => 'required|string',
            'neighborhood' => 'required|string',
            'street' => 'required|string',
        ]);

        $values = explode("-", $request['category']);
        $request['subcategory'] = $values[0];
        $request['category'] = $values[1];

        $request['url'] = static::cleanUrl($request['name']);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if (Company::create($request)) {
            return redirect('adm/empresa')->with('success', 'Empresa cadastrada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $company = Company::find($id);
        $categories = Category::orderBy('name', 'asc')->get()->all();
        $subcategories = Subcategory::orderBy('name', 'asc')->get()->all();

        $highlight = HighLight::where('company_id', $company['id'])->get()->first();

        if ($highlight) {
            $company['highlight'] = true;
        } else {
            $company['highlight'] = false;
        }

        $category_name = Category::select('name')
            ->where('id', $company['category_id'])->first();
        $subcategory_name = Subcategory::select('name')
            ->where('id', $company['subcategory_id'])->first();

        $company['category_name'] = $category_name['name'];
        $company['category_name'] = $subcategory_name['name'];

        return view('dashboard.company.edit', array(
            'company' => $company,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'notifications' => $notifications
        ));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:256',
            'email' => 'required|string|email',
            'code' => 'string',
            'category' => 'required|string',
            'description' => 'required|string|min:3',
            'cep' => 'required|string',
            'uf' => 'required|string',
            'city' => 'required|string',
            'neighborhood' => 'required|string',
            'street' => 'required|string',
            'number' => 'required|numeric'
        ]);

        $values = explode("-", $request['category']);
        $request['subcategory'] = $values[0];
        $request['category'] = $values[1];
        $request['url'] = static::cleanUrl($request['name']);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if (Company::edit($request, $id)) {
            return redirect('adm/empresa')->with('success', 'Empresa editada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        try {
            //code...
            $company->delete();
            return redirect()->back()->with('warning', 'Empresa deletada com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }

    public function search(Request $request)
    {
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $companies = Company::where('name', 'like', '%' . $request['data'] . "%")
            ->orWhere('code', 'like', '%' . $request['data'] . "%")
            ->orWhere('description', 'like', '%' . $request['data'] . "%")
            ->orderBy('name', 'asc')
            ->paginate(10);

        foreach ($companies as $company) {
            $category_name = Category::select('name')
                ->where('id', $company['category_id'])->first();
            $subcategory_name = Subcategory::select('name')
                ->where('id', $company['subcategory_id'])->first();

            $company['category_name'] = $category_name['name'];
            $company['subcategory_name'] = $subcategory_name['name'];
        }

        return view('dashboard.company.search', array(
            'companies' => $companies,
            'notifications' => $notifications
        ));
    }
}
