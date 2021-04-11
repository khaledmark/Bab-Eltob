<?php

namespace App\Http\Controllers\Admin;

use App\Section;
use App\SubSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class sectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Section::get();

        return view('admin.sections.index', compact('data'));
    }

    public function subSections(Section $section)
    {
        $data = SubSection::where('section_id', $section->id)->get();

        return view('admin.sections.subs', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.create');
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
            'name'         => 'required|max:191',
            'name_en'      => 'required|max:191',
            'photo'        => 'required|mimes:jpg,jpeg,png,tiff',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect()->route('sections.create')->withErrors($validator)->withInput();


        $imgName = UploadImage($request->photo, 'section', 'sections');

        $created = Section::create([
            'name' => $request->name ,
            'photo' => $imgName , //image
        ]);
        $created->createTranslations([
            'name' => $request->get('name_en'),
        ]);

        $created['imagePath'] = imgPath('sections');

        return $created ?
            redirect()->route('sections.create')->with('success', trans('admin.addOk')) :
            redirect()->route('sections.create')->with('warning', trans('admin.addNo'));
    }

    public function show(Section $section)
    {
        return view('admin.sections.show', compact('section'));
    }

    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
    }


    public function update(Request $request, Section $section)
    {
        $rules = [
            'name'    => 'required|max:191',
            'name_en' => 'required|max:191',
            'image'   => 'mimes:jpg,jpeg,png,tiff',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        return redirect()->back()->withErrors($validator)->withInput();

        if ( isset($request->image) && $request->image ) {

            $request['photo'] = UploadImage($request->file('image'), 'section', 'sections');

            @unlink(public_path('\uploads\sections') . $section->photo);
        }

        $updated = $section->update($request->all());
        
        $section->updateTranslations([
            'name' => $request->get('name_en'),
        ]);
        return $updated ?
            redirect()->route('sections.index')->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }

    public function destroy(Request $request)
    {
        
        $section = Section::where('id', $request->id)->delete();

        $url = route('sections.index');

        return $section
            ? json_encode(['code' => '1', 'url' => $url])
            : json_encode(['code' => '0', 'message' => 'نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا']);
                
    }

}
