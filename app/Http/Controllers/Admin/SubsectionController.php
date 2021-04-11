<?php

namespace App\Http\Controllers\Admin;

use App\Section;
use App\SubSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class SubsectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SubSection::get();

        return view('admin.subsections.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::pluck('name', 'id')->toArray();
        return view('admin.subsections.create',compact('sections'));
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
            return redirect()->route('sub-sections.create')->withErrors($validator)->withInput();


        $imgName = UploadImage($request->photo, 'section', 'subsections');

        $created = SubSection::create([
            'name' => $request->name ,
            'section_id' => $request->section_id ,
            'photo' => $imgName , //image
        ]);
        $created->createTranslations([
            'name' => $request->get('name_en'),
        ]);

        $created['imagePath'] = imgPath('subsections');

        return $created ?
            redirect()->route('sub-sections.create')->with('success', trans('admin.addOk')) :
            redirect()->route('sub-sections.create')->with('warning', trans('admin.addNo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubSection  $subSection
     * @return \Illuminate\Http\Response
     */
    public function show(SubSection $subSection)
    {
        return view('admin.subsections.show', compact('subSection'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubSection  $subSection
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSection $subSection)
    {
        $sections = Section::pluck('name', 'id')->toArray();

        return view('admin.subsections.edit', compact('subSection', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubSection  $subSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSection $subSection)
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

            $request['photo'] = UploadImage($request->file('image'), 'subsection', 'subsections');

            @unlink(public_path('\uploads\subsections') . $subSection->photo);
        }

        $updated = $subSection->update($request->all());
        
        $subSection->updateTranslations([
            'name' => $request->get('name_en'),
        ]);
        return $updated ?
            redirect()->route('sub-sections.index')->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubSection  $subSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $subsection = SubSection::where('id', $request->id)->delete();

        $url = route('sub-sections.index');

        return $section
            ? json_encode(['code' => '1', 'url' => $url])
            : json_encode(['code' => '0', 'message' => 'نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا']);
    }
}
