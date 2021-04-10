<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Session;

class SettingsController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = [];
        $users = Setting::all();
        $data['row'] = $users->find(1);
        return view('admin.settings.index', compact('data'));
    }
    public function update(Request $request)
    {
        //return $request;
        $user = new Setting();
        $data_update = $user->find(1);
        $data_update->site_title = $request['site_title'];
        $data_update->site_email = $request['site_email'];
        $data_update->site_phone = $request['site_phone'];
        $data_update->site_address = $request['site_address'];
        $data_update->save();
        Session::flash('success', 'Record successfully updated.');
        $data = [];
        $users = Setting::all();
        $data['row'] = $users->find(1);
        return view('admin.settings.index', compact('data'));

        //return view('admin.settings.index');
    }
}
