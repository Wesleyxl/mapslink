<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Email;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
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

        $subcategories = Subcategory::orderBy('name', 'asc')->paginate(10);

        foreach ($subcategories as $subcategory) {

            $category = Category::select('name')
                ->where('id', $subcategory['category_id'])->get()->first();

            $subcategory['category_name'] = $category['name'];
        }

        return view('dashboard.subcategory.home', array(
            'subcategories' => $subcategories,
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

        $categories = Category::orderBy('name')->get()->all();

        return view('dashboard.subcategory.create', array(
            'categories' => $categories,
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
            'category' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $request['url'] = static::cleanUrl($request['name']);

        if (Subcategory::create($request->all())) {
            return redirect('adm/subcategoria')->with('success', 'Subcategoria cadastrada com sucesso!');
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
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $subcategory = Subcategory::find($id);

        $categories = Category::orderBy('name')->get()->all();

        return view('dashboard.subcategory.edit', array(
            'subcategory' => $subcategory,
            'categories' => $categories,
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
            'category' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $request['url'] = static::cleanUrl($request['name']);

        if (Subcategory::edit($request->all(), $id)) {
            return redirect('adm/subcategoria')->with('success', 'Subcategoria editada com sucesso!');
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
        $subcategory = Subcategory::find($id);

        try {
            //code...
            $subcategory->delete();
            return redirect()->back()->with('warning', 'Subcategoria deletada com sucesso!');
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

        $subcategories = Subcategory::where('name', 'like', '%' . $request['data'] . "%")
            ->orWhere('description', 'like', '%' . $request['data'] . "%")
            ->orderBy('name', 'asc')
            ->paginate(10);

        foreach ($subcategories as $subcategory) {

            $category = Category::select('name')
                ->where('id', $subcategory['category_id'])->get()->first();

            $subcategory['category_name'] = $category['name'];
        }

        return view('dashboard.subcategory.search', array(
            'subcategories' => $subcategories,
            'notifications' => $notifications
        ));
    }
}
