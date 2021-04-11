
text/x-generic ItemController.php ( C++ source, UTF-8 Unicode text )
<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\SubSection;
use App\Section;
use App\Region;
use App\City;
use App\Photo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::get();

        return view('admin.items.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subSections = SubSection::select('id', 'name')->get();

        $sections = Section::get();

        $cities = City::get();

        $regions = Region::get();

        return view('admin.items.create', compact('cities','regions','sections', 'subSections'));
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
            'name'           => 'required|max:191',
            'images'         => 'nullable',
            'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'          => 'required|numeric',
            'currency'       => 'required|in:r,d',
            'description'    => 'required|max:255',
            'address'        => 'required|string|max:255',
            'lat'            => 'required',
            'lang'           => 'required',
            'sub_section_id' => 'required|exists:sub_sections,id',
            'city_id'        => 'required|exists:cities,id',
            'region_id'      => 'required|exists:regions,id',
            'phone'          => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('items.create')->withErrors($validator)->withInput();
        }
        $request['user_id'] = \Auth::user()->id;

        $created = Item::create($request->all());

        if($request->images) {
            foreach($request->images as $image){
                $name = UploadImage($image, mt_rand(1000,100000),'items');
                
                Photo::create([
                  'name' => $name,
                  'item_id' => $created->id,
                ]);
            }
        }

        return $created ?
        redirect()->route('items.create')->with('success', trans('admin.addOk')) :
        redirect()->route('items.create')->with('warning', trans('admin.addNo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $subSections = SubSection::get();

        $sections = Section::get();

        $cities = City::get();

        $regions = Region::get();

        $imagesIds = implode(",", $item->photos->pluck('id')->toArray());

        return view('admin.items.edit', compact('item','imagesIds' ,'cities','regions','sections', 'subSections'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            'name'           => 'required|max:191',
            'images'         => 'nullable',
            'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'          => 'required|numeric',
            'currency'       => 'required|in:r,d',
            'description'    => 'required|max:255',
            'address'        => 'required|string|max:255',
            'lat'            => 'required',
            'lang'           => 'required',
            'sub_section_id' => 'required|exists:sub_sections,id',
            'city_id'        => 'required|exists:cities,id',
            'region_id'      => 'required|exists:regions,id',
            'oldImages'      => '',
            'newImages'      => '',
            'phone'          => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $updated = $item->update($request->all());

        $imagesToRemove = array_diff(explodeByComma($request->oldImages), explodeByComma($request->newImages));

        $this->deleteImages($imagesToRemove);

        if($request->File('images')) {
        
                foreach($request->File('images') as $image){
                    $name = UploadImage($image, mt_rand(1000,100000),'items');
                    
                    Photo::create([
                      'name' => $name,
                      'item_id' =>  $item->id,
                    ]);
                }
            }

        return $updated ?
            redirect()->route('items.index')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('items.index')->with('mNo', trans('messages.updateFalse'))->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $item = Item::where('id', $request->id)->delete();

        $url = route('items.index');

        return $item
            ? json_encode(['code' => '1', 'url' => $url])
            : json_encode(['code' => '0', 'message' => 'نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا']);
    }

    protected function deleteImages($imagesIds) {

        if($imagesIds) {

            foreach ($imagesIds as $key => $id) {

                $image = Photo::where('id', $id)->first();

                @unlink(public_path('uploads/items/') . $image->image);

                $image->delete();
            }
        }
    }

    public function changeSubsections(Request $request) {

        $section_id = $request->section_id;
        $section = Section::with('subsections')->where('id', $section_id)->first();
        $subsections = $section->subsections;

        $rows = [];
        foreach ($subsections as $subsection) {
            $rows[] = array(
                "id" => $subsection->id,
                'text' => $subsection->name
            );
        }
        return json_encode($rows);
    }

    public function changeStatus(Request $request)
    {
        $item = Item::find($request->item_id);

        $updated = $item->update(['status' => $request->status]);

        $url = route($request->url.'.index');

        return json_encode(['code' => $updated, 'url' => $url]);
    }

}