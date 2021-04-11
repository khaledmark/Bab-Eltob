<?php

namespace App\Http\Controllers\Api;

use App\Section;
use App\SubSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (config('app.locale') === 'en') {
            $data = Section::with('translations')
                                ->get(['id', 'name','photo'])
                                ->map(function ($section) {
                                    return [
                    'id' => $section->id,
                    'name' => $section->translate('en')->name,
                    'photo' => $section->photo,
                ];
                                });

            return ApiController::respondWithSuccess($data);
        } else {
            $data = Section::select('id', 'name', 'photo')->get();

            return ApiController::respondWithSuccess($data);
        }
    
    }

    public function search(Request $request)
    {
        $rules = [
            'section_id' => 'required|exists:sections,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        if (config('app.locale') === 'en') {
            $data = SubSection::where('section_id', $request->section_id)->with('translations')
                                ->get(['id', 'name','photo'])
                                ->map(function ($sub) {
                                    return [
                    'id'    => $sub->id,
                    'name'  => $sub->translate('en')->name,
                    'photo' => $sub->photo,
                ];
                                });

            return ApiController::respondWithSuccess($data);
        } else {
            $data = SubSection::select('id', 'name','photo')->where('section_id', $request->section_id)->get();
        }

        return $data
            ?response()->json(['responseCode' => 1, 'subCode' => 200, 'data'=> $data])
            :response()->json(['responseCode' => 0, 'subCode' => 404]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
