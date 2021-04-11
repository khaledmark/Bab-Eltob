<?php

namespace App\Http\Controllers\Admin;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = City::get();

        return view('admin.cities.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('admin.cities.create');
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
            'name' => 'required|max:191',
            'name_en' => 'required|max:191',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('cities.create')->withErrors($validator)->withInput();
        }

        $created = City::create([
            'name' => $request->name,
        ]);
        $created->createTranslations([
            'name' => $request->get('name_en'),
        ]);
        
        return $created ?
        redirect()->route('cities.create')->with('success', trans('admin.addOk')) :
        redirect()->route('cities.create')->with('warning', trans('admin.addNo'));
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $rules = [
            'name' => 'required|max:191',
            'name_en' => 'required|max:191',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $city->update($request->all());

        $city->updateTranslations([
            'name' => $request->get('name_en'),
        ]);

        return $city ?
            redirect()->route('cities.index')->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }

    public function destroy(Request $request)
    {
        $users = User::where('City_id', $request->id)->count();
        // dd($users);

        if($users > 0){
            return json_encode(['code' => '2', 'message' => 'لا يمكن حذف المدينة للحفاظ على بيانات المستخدمين']);
        }else{
            $city = City::where('id', $request->id)->delete();
            $url = route('cities.index');
    
            return $city
                ? json_encode(['code' => '1', 'url' => $url])
                : json_encode(['code' => '0', 'message' => 'نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا']);
        } 
    }

    public function changeRegions(Request $request) {

        $city_id = $request->city_id;
        $city = City::with('regions')->where('id', $city_id)->first();
        $regions = $city->regions;

        $rows = [];
        foreach ($regions as $region) {
            $rows[] = array(
                "id" => $region->id,
                'text' => $region->name
            );
        }
        return json_encode($rows);
    }

}
