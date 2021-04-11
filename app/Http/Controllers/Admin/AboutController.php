<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function create()
    {
        $data = About::find(1);

        return view('admin.about.create', compact('data'));
    }

    public function store(AboutRequest $request)
    {
        $data = About::find(1);

        if ($data) {
            $data->update($request->all());
            $data->updateTranslations([
                'content' => $request->get('content_en'),
            ]);
            $messageOk = trans('admin.updateTrue');
            $messageNO = trans('admin.updateFalse');
        } else {
            $data = About::create($request->all());
            $data->createTranslations([
            'content' => $request->get('content_en'),
        ]);
            $messageOk = trans('admin.addOK');
            $messageNO = trans('admin.addNO');
        }

        return $data ?
            redirect()->route('about.create')->with('success', $messageOk) :
            redirect()->route('about.create')->with('warning', $messageNO);
    }
}
