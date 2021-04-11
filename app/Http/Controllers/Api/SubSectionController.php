<?php

namespace App\Http\Controllers\Api;

use App\SubSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($section_id)
    {
            if (config('app.locale') === 'en') {
                $data = SubSection::where('section_id', $section_id)->with('translations')
                                    ->get(['id', 'name','photo'])
                                    ->map(function ($sub) {
                                        return [
                        'id' => $sub->id,
                        'name' => $sub->translate('en')->name,
                        'photo' => $sub->photo,

                    ];
                                    });
    
                return ApiController::respondWithSuccess($data);
            } else {
                $data = SubSection::select('id', 'name', 'photo')->where('section_id', $section_id)->get();
    
                return ApiController::respondWithSuccess($data);
            }
        
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
     * @param  \App\SubSection  $subSection
     * @return \Illuminate\Http\Response
     */
    public function show(SubSection $subSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubSection  $subSection
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSection $subSection)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubSection  $subSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSection $subSection)
    {
        //
    }
}
