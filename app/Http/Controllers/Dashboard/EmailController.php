<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Email;

class EmailController extends Controller
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

        $emails = Email::orderBy('id', 'desc')
            ->where('status', 'inbox')
            ->where('read', 1)
            ->paginate(10);

        $unreads = Email::orderBy('id', 'desc')
            ->where('read', 0)
            ->where('status', 'inbox')
            ->get()->all();

        return view('dashboard.email.home', array(
            'emails' => $emails,
            'unreads' => $unreads,
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

        $unread = count(Email::select('id')->where('read', 0)->get()->all());

        return view('dashboard.email.send', array(
            'unread' => $unread,
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
            'from' => 'required|string',
            'to' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }


        if (Email::create($request->all())) {
            return redirect('/adm/email')->with('success', 'Email cadastrado com sucesso');
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
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $email = Email::find($id);
        $email['read'] = 1;
        $email->save();

        $unread = count(Email::select('id')->where('read', 0)->get()->all());

        return view('dashboard.email.show', array(
            'email' => $email,
            'unread' => $unread,
            'notifications' => $notifications
        ));
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

        $email = Email::find($id);
        $unread = count(Email::select('id')->where('read', 0)->get()->all());

        return view('dashboard.email.edit', array(
            'email' => $email,
            'unread' => $unread,
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
        $email = Email::find($id);

        try {
            //code...
            $email->delete();
            return redirect()->back()->with('warning', 'Email deletado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Desculpe, algo deu errado durante sua solicitação. Tente outra vez');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sketch()
    {
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $emails = Email::where('status', 'sketch')->get()->all();
        $unread = count(Email::select('id')->where('read', 0)->get()->all());

        return view('dashboard.email.sketch', array(
            'emails' => $emails,
            'unread' => $unread,
            'notifications' => $notifications
        ));
    }

    public function send()
    {
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $emails = Email::orderBy('id', 'desc')
            ->where('status', 'send')
            ->paginate(10);

        $unreads = Email::orderBy('id', 'desc')
            ->where('read', 0)
            ->where('status', 'inbox')
            ->get()->all();

        return view('dashboard.email.send', array(
            'emails' => $emails,
            'unreads' => $unreads,
            'notifications' => $notifications
        ));
    }

    public function filter($filter)
    {
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $emails = Email::orderBy('id', 'desc')
            ->where('status', 'inbox')
            ->where('label', '=', $filter)
            ->paginate(10);

        $unreads = Email::orderBy('id', 'desc')
            ->where('read', 0)
            ->where('status', 'inbox')
            ->get()->all();

        return view('dashboard.email.home', array(
            'emails' => $emails,
            'unreads' => $unreads,
            'notifications' => $notifications
        ));
    }

    public function sendShow($id)
    {
        $notifications = Email::orderBy('id', 'asc')->where('read', '=', 0)->get()->all();

        foreach ($notifications as $notification) {
            $notification['time'] = static::runningTime($notification['created_at']);
        }

        $email = Email::find($id);

        $unread = count(Email::select('id')->where('read', 0)->get()->all());

        return view('dashboard.email.sendShow', array(
            'email' => $email,
            'unread' => $unread,
            'notifications' => $notifications
        ));
    }
}
