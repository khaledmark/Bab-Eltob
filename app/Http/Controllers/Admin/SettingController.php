<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    /**
     * @var Setting
     */
    private $setting;

    public function __construct()
    {
        $this->setting = Setting::first();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.settings.edit', ['setting' => $this->setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request)
    {
        $this->setting->update($request->all());
        $this->setting->updateTranslations([
            'name' => $request->get('name_en'),
        ]);

        return redirect()->route('settings.edit')->with('success', 'تم تحديث إعدادات الموقع');
    }
}
