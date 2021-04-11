<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AdvsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Advertisement::latest()->get();

        return view('admin.advs.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'photo' => 'required|mimes:jpg,jpeg,png,tiff',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $imgName = UploadImage($request->photo, 'adver', 'advs');

        $created = Advertisement::create([
            'status' => $request->status,
            'photo'   => $imgName,
        ]);

        return $created ?
            redirect()->back()->with('success', trans('admin.addOk')) :
            redirect()->back()->with('warning', trans('admin.addNo'));

    }
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $adv)
    {
        return view('admin.advs.edit', compact('adv'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $adv)
    {
        $rules = [
            'photo' => 'mimes:jpg,jpeg,png,tiff',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        return redirect()->back()->withErrors($validator)->withInput();

        if ( isset($request->image) && $request->image ) {

            $request['photo'] = UploadImage($request->file('image'), 'adver', '/advs');

            @unlink(public_path('/uploads/advs/') . $adv->photo);
        }

        $updated = $adv->update($request->all());
        
        return $updated ?
            redirect()->route('advs.index')->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $adv = Advertisement::where('id', $request->id)->delete();

            $url = route('advs.index');

            return $adv
                ? json_encode(['code' => '1', 'url' => $url])
                : json_encode(['code' => '0', 'message' => 'نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا']);
    }
}
