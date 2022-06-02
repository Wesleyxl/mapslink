<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSettings extends Model
{
    use HasFactory;

    public static function edit($request, $id = 0)
    {
        if ($id) {
            $website = WebsiteSettings::find($id);
        } else {
            return false;
        }

        $website['phone'] = $request['phone'];
        $website['cellphone'] = $request['cellphone'];
        $website['email'] = $request['email'];
        $website['facebook'] = $request['facebook'];
        $website['instagram'] = $request['instagram'];
        $website['linkedin'] = $request['linkedin'];
        $website['about'] = $request['about'];
        $website['short_about'] = $request['short_about'];

        if ($website->save()) {
            return $website;
        } else {
            return false;
        }
    }
}
