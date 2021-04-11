<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Region;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Region::get();

        return view('admin.regions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cities = City::get();
        $cities = City::pluck('name', 'id')->toArray();

        return view('admin.regions.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'city_id' => 'required',
            'name' => 'required|max:191',
            'name_en' => 'required|max:191',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('regions.create')->withErrors($validator)->withInput();
        }

        $created = Region::create([
            'city_id' => $request->city_id,
            'name' => $request->name,
        ]);
        $created->createTranslations([
            'name' => $request->get('name_en'),
        ]);
        
        return $created ?
        redirect()->route('regions.create')->with('success', trans('admin.addOk')) :
        redirect()->route('regions.create')->with('warning', trans('admin.addNo'));
    }

    public function edit(Region $region)
    {
        $cities = City::pluck('name', 'id')->toArray();

        return view('admin.regions.edit', compact('cities', 'region'));
    }

    public function update(Request $request, Region $region)
    {
        $rules = [
            'city_id' => 'required',
            'name' => 'required|max:191',
            'name_en' => 'required|max:191',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $region->update($request->all());

        $region->updateTranslations([
            'name' => $request->get('name_en'),
        ]);

        return $region ?
            redirect()->route('regions.index')->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }

    public function destroy(Request $request)
    {
        $users = User::where('region_id', $request->id)->count();
        // dd($users);

        if($users > 0){
            return json_encode(['code' => '2', 'message' => 'لا يمكن حذف المنطقة للحفاظ على بيانات المستخدمين']);
        }else{
            $region = Region::where('id', $request->id)->delete();
            $url = route('regions.index');
    
            return $region
                ? json_encode(['code' => '1', 'url' => $url])
                : json_encode(['code' => '0', 'message' => 'نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا']);
        } 


       
    }
}
