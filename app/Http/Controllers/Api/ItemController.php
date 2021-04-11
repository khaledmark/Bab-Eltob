<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ItemController extends Controller
{
    public function enItem($item)
    {
        return [
                'id' => $item->id,
                'username' => $item->user->username,
                'phone' => $item->user->phone,
                'name' => $item->name,
                'price' => $item->price,
                'lat' => $item->lat,
                'lang' => $item->lang,
                'address' => $item->address,
                'description' => $item->description,
                'views_count' => $item->views_count,
                'sub_section_id' => $item->sub_section_id,
                'city_id' => $item->city_id,
                'region_id' => $item->region_id,
                'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $item->updated_at->format('Y-m-d H:i:s'),
                'photos' =>$item->photos,
                'subSection'  => [
                    'id' => $item->subSection->id,
                    'name' => $item->subSection->translate('en')->name,
                    ],
                'city' => [
                    'id' => $item->city->id,
                    'name' => $item->city->translate('en')->name,
                ],
                'region' => [
                    'id' => $item->region->id,
                    'name' => $item->region->translate('en')->name,
                        
                ]
            ];
    }
    
    public function arItem($item)
    {
        return [
                'id' => $item->id,
                'username' => $item->user->username,
                'phone' => $item->user->phone,
                'name' => $item->name,
                'price' => $item->price,
                'lat' => $item->lat,
                'lang' => $item->lang,
                'address' => $item->address,
                'description' => $item->description,
                'views_count' => $item->views_count,
                'sub_section_id' => $item->sub_section_id,
                'city_id' => $item->city_id,
                'region_id' => $item->region_id,
                'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $item->updated_at->format('Y-m-d H:i:s'),
                'photos' =>$item->photos,
                'subSection'  => [
                    'id' => $item->subSection->id,
                    'name' => $item->subSection->name,
                    ],
                'city' => [
                    'id' => $item->city->id,
                    'name' => $item->city->name,
                ],
                'region' => [
                    'id' => $item->region->id,
                    'name' => $item->region->name,
                ]
            ];   
    }
    
    public function latestItem(Request $request, $subSection,$pageNumber)
    {
        $rules = [
            'region_id' => 'required|exists:regions,id',
        ];

        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }
        $data = Item::where('region_id', $request->region_id)->where('sub_section_id', $subSection)->latest()->paginate(10, ['*'], 'page', $pageNumber);
        
        if (config('app.locale') === 'en') {
            
            $data->transform(function ($item) {
                            return $this->enItem($item);
                        
                    });
        }else{
             $data->transform(function ($item) {
                            return $this->arItem($item);
                        
                    });
      
        }

        return ApiController::respondWithSuccess($data);
        
    }
    
    public function oldestItems(Request $request,$subSection,$pageNumber)
    {
        $rules = [
            'region_id' => 'required|exists:regions,id',
        ];

        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }
        $data = Item::where('region_id', $request->region_id)->where('sub_section_id', $subSection)->oldest()->paginate(10, ['*'], 'page', $pageNumber);
        
        if (config('app.locale') === 'en') {
            
            $data->transform(function ($item) {
                            return $this->enItem($item);
                        
                    });
        }else{
             $data->transform(function ($item) {
                            return $this->arItem($item);
                        
                    });
        }

        return ApiController::respondWithSuccess($data);
        
    }
    
    public function morePriceItems(Request $request,$subSection,$pageNumber)
    {
        $rules = [
            'region_id' => 'required|exists:regions,id',
        ];

        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }
        $data = Item::where('region_id', $request->region_id)->where('sub_section_id', $subSection)->orderBy('price', 'desc')->paginate(10, ['*'], 'page', $pageNumber);
        
        if (config('app.locale') === 'en') {
            
            $data->transform(function ($item) {
                            return $this->enItem($item);
                        
                    });
        }else{
             $data->transform(function ($item) {
                            return $this->arItem($item);
                        
                    });
        }

        return ApiController::respondWithSuccess($data);
    }
    
    public function lessPriceItems(Request $request,$subSection,$pageNumber)
    {
        $rules = [
            'region_id' => 'required|exists:regions,id',
        ];

        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }
        $data = Item::where('region_id', $request->region_id)->where('sub_section_id', $subSection)->orderBy('price', 'asc')->paginate(10, ['*'], 'page', $pageNumber);
        
        if (config('app.locale') === 'en') {
            
            $data->transform(function ($item) {
                            return $this->enItem($item);
                        
                    });
        }else{
             $data->transform(function ($item) {
                            return $this->arItem($item);
                        
                    });
        }

        return ApiController::respondWithSuccess($data);
    }
   
    public function index(Request $request,$pageNumber)
    {
         $data = Item::where('user_id',$request->user()->id)
                       ->paginate(10, ['*'], 'page', $pageNumber);
        if (config('app.locale') === 'en') {
           
            $data->transform(function ($item) {
                            return $this->enItem($item);
                    });
        }else{
        
            $data->transform(function ($item) {
                             return $this->arItem($item);     
                    });
        }

        return ApiController::respondWithSuccess($data);
        
    }
    // itemsOfSubsction

    public function itemsOfSubsction($subId,$pageNumber)
    {
        if (config('app.locale') === 'en') {
            $data = Item::where('sub_section_id',$subId)
                        ->paginate(10, ['*'], 'page', $pageNumber);
                        $data->transform(function ($item) {
                            return $this->enItem($item);
                    });
        }else{
            
            $data = Item::where('sub_section_id',$subId)
                        ->paginate(10, ['*'], 'page', $pageNumber);
                        $data->transform(function ($item) {
                             return $this->arItem($item);
                            
                    });

        }

        return ApiController::respondWithSuccess($data);
        
    }

    public function itemsOfCity($cityId,$pageNumber)
    {
        $data = Item::where('city_id',$cityId)
                        ->paginate(10, ['*'], 'page', $pageNumber);
        if (config('app.locale') === 'en') {
            
            $data->transform(function ($item) {
                            return $this->enItem($item);
                        
                    });
        }else{
             $data->transform(function ($item) {
                            return $this->arItem($item);
                        
                    });

        }

        return ApiController::respondWithSuccess($data);
        
        
    }
    
    public function search(Request $request,$pageNumber)
    {
         $rules = [
            'name'      => 'required|max:191',
            'region_id' => 'exists:regions,id',
            'city_id'   => 'exists:cities,id',

        ];

        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }
        
        $data = Item::where('name', $request->name)
                        ->orWhere('city_id',$request->city_id)
                        ->orWhere('region_id',$request->region_id)
                        ->paginate(10, ['*'], 'page', $pageNumber);
                        
        if (config('app.locale') === 'en') {
            
            $data->transform(function ($item) {
                            return $this->enItem($item);
                        
                    });
        }else{
             $data->transform(function ($item) {
                            return $this->arItem($item);
                        
                    });

      
        }

        return ApiController::respondWithSuccess($data);
        
    }

    public function store(Request $request)
    {
        $rules = [
            'name'           => 'required|max:191',
            'images'         => 'required',
            'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'          => 'required|numeric',
            'description'    => 'required|max:255',
            'address'        => 'required|string|max:255',
            'lat'            => 'required',
            'lang'           => 'required',
            'sub_section_id' => 'required|exists:sub_sections,id',
            'city_id'        => 'required|exists:cities,id',
            'region_id'      => 'required|exists:regions,id',


        ];

        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }
        
        $created = Item::create([
                        'name' => $request->name ,
                        'user_id' => $request->user()->id ,
                        'sub_section_id' => $request->sub_section_id ,
                        'city_id' => $request->city_id ,
                        'region_id' => $request->region_id ,
                        'price' => $request->price ,
                        'description' => $request->description ,
                        'address' => $request->address ,
                        'lat' => $request->lat ,
                        'lang' => $request->lang ,
                ]);
                
        
            
        if($request->File('images')) {
            foreach($request->File('images') as $image){
                $name = UploadImage($image, mt_rand(1000,100000),'items');
                
                Photo::create([
                    'name' => $name,
                    'item_id' => $created->id,
                ]);
            }
        }
        
        return $created
            ? ApiController::respondWithSuccess($created->load('photos'))
            : ApiController::respondWithServerError();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
     public function show(Item $item)
    {

        $data['item'] = [
            'id' => $item->id,
            'username' => $item->user->username,
            'phone' => $item->user->phone,
            'name' => $item->name,
            'price' => $item->price,
            'lat' => $item->lat,
            'lang' => $item->lang,
            'address' => $item->address,
            'description' => $item->description,
             'views_count' => $item->views_count,
            'sub_section_id' => $item->sub_section_id,
            'city_id' => $item->city_id,
            'region_id' => $item->region_id,
            'created_at' => $item->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $item->updated_at->format('Y-m-d H:i:s'),
            'photos' =>$item->photos,
        ];    

        if (config('app.locale') === 'en') {
            $data['subSection']  = [
                'id' => $item->subSection->id,
                'name' => $item->subSection->translate('en')->name,
            ];
            $data['city'] = [
                'id' => $item->city->id,
                'name' => $item->city->translate('en')->name,
            ];
            $data['region'] = [
                'id' => $item->region->id,
                'name' => $item->region->translate('en')->name,
            ];
                  
        }else 
            {
                $data['subSection'] = [
                    'id' => $item->subSection->id,
                    'name' => $item->subSection->name,
                ];
                $data['city'] = [
                    'id' => $item->city->id,
                    'name' => $item->city->name,
                ];
                $data['region'] = [
                    'id' => $item->region->id,
                    'name' => $item->region->name,
                ];
            }  

        return $data
            ?response()->json(['responseCode' => 1, 'subCode'=> 200, 'data' => $data])
            :response()->json(['responseCode' => 0, 'subCode' => 404]);   
    }


    public function update(Request $request, Item $item)
    {
        $updated = $item->update($request->all());
            
        if($request->File('images')) {
                $oldImages = $item->photos->pluck('id')->toArray();
                
                $imagesToRemove = array_diff($oldImages, explodeByComma($request->imagesIds));

                $this->deleteImages($imagesToRemove);
        
                foreach($request->File('images') as $image){
                    $name = UploadImage($image, mt_rand(1000,100000),'items');
                    
                    Photo::create([
                      'name' => $name,
                      'item_id' =>  $item->id,
                    ]);
                }
            }
        
        return $updated
            ? ApiController::respondWithSuccess($item->load('photos'))
            : ApiController::respondWithServerError();


    }
    
    public function destroy(Request $request){
        
        $rules = [
            'item_id' => 'required|exists:items,id',
        ];

        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

       $item = Item::where('id', $request->item_id)->first();

       return $item->delete()
           ? response()->json(['responseCode' => 1, 'subCode' => 200])
           : ApiController::respondWithServerError();
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
}
