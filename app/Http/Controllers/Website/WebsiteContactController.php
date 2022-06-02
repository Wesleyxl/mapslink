<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class WebsiteContactController extends Controller
{
    public function index()
    {
        $website = WebsiteSettings::orderBy('id', 'asc')->get()->first();

        return view('pages.contact.home', array(
            'website' => $website
        ));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'label' => 'required',
            'subject' => 'required',
            'message' => 'required|string|min:10'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $user = User::orderBy('id', 'asc')->get()->first();

        $contact = new Email();
        $contact['from'] = $request['name'];
        $contact['to'] = $user['name'];
        $contact['label'] = $request['label'];
        $contact['subject'] = $request['subject'];
        $contact['message'] = $request['message'];
        $contact['read'] = 0;
        $contact['status'] = 'inbox';

        if ($contact->save()) {
            return redirect()->back()->with('success', 'Seus dados foram enviados com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }
}
