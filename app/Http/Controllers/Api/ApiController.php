<?php

namespace App\Http\Controllers\Api;

use App\Faq;
use App\Country;
use App\City;
use App\Region;
use App\Section;
use App\Contact;
use App\Notification;
use App\Term;
use App\About;
use App\Setting;
use App\Advertisement;
use App\UserDevice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ApiController extends Controller
{
    public function getCities()
    {
        if (config('app.locale') === 'en') {
            $data = City::with('translations')
                                ->get(['id', 'name'])
                                ->map(function ($city) {
                                    return [
                    'id' => $city->id,
                    'name' => $city->translate('en')->name,
                    'regions' => $city->regions->load('translations')
                                                // ->select(['id', 'name'])
                                                ->map(function ($re) {
                                                    return [
                                                        'id' => $re->id,
                                                        'name' => $re->translate('en')->name
                                                ];
                                                    })
                    ];
                        });

            return $this->respondWithSuccess($data);
        } else {
            $data = City::select('id', 'name')->with('regions')->get();

            return $this->respondWithSuccess($data);
        }
    }
    public function getRegions($city)
    {
        if (config('app.locale') === 'en') {
            $data = Region::where('city_id', $city)->with('translations')
                                ->get(['id', 'name'])
                                ->map(function ($region) {
                                    return [
                    'id' => $region->id,
                    'name' => $region->translate('en')->name,
                ];
                                });

            return $this->respondWithSuccess($data);
        } else {
            $data = Region::where('city_id', $city)
                            ->select('id', 'name')
                            ->get();

            return $this->respondWithSuccess($data);
        }
    }

    public function getFaqs()
    {
        if (config('app.locale') === 'en') {
            $data = Faq::with('translations')
                            ->get(['id', 'question', 'answer'])
                            ->map(function ($faq) {
                                return [
                'id' => $faq->id,
                'question' => $faq->translate('en')->question,
                'answer' => $faq->translate('en')->answer,
            ];
                            });
            // foreach ($data as $value) {
            //     return [
            //         'id' => $faq->id,
            //         'question' => $faq->translate('en')->question,
            //         'answer' => $faq->translate('en')->answer,
            //     ];
            // }
            // $data->paginate(10);

            return $this->respondWithSuccess($data);
        } else {
            $data = Faq::select('id', 'question', 'answer')->paginate(10);

            return $this->respondWithSuccess($data);
        }
    }

    public function getAbout()
    {
        if (config('app.locale') === 'en') {
            $data = About::with('translations')
                                ->get(['id', 'content'])
                                ->map(function ($about) {
                                    return [
                    'id' => $about->id,
                    'content' => $about->translate('en')->content,
                ];
                                })->first();

            return $this->respondWithSuccess($data);
        } else {
            $data = About::select('id', 'content')->first();

            return $this->respondWithSuccess($data);
        }
    }
    
     public function advs()
    {
        
        $data = Advertisement::where('status',1)->select('id', 'photo')->get();

        return $this->respondWithSuccess($data);

    }

    public function getTermsConditions()
    {
        if (config('app.locale') === 'en') {
            $data = Term::with('translations')
                                ->get(['id', 'content'])
                                ->map(function ($term) {
                                    return [
                    'id' => $term->id,
                    'content' => $term->translate('en')->content,
                ];
                                });

            return $this->respondWithSuccess($data);
        } else {
            $data = Term::select('id', 'content')->get();

            return $this->respondWithSuccess($data);
        }
    }

    public function contactUs(Request $request)
    {
        $rules = [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:191',
            'message' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->respondWithError(validateRules($validator->errors(), $rules));
        }

        $created = Contact::create($request->all());

        return $created
            ? $this->respondWithSuccess($created)
            : $this->respondWithServerError();
    }

    public function contactData()
    {

        $data = Setting::select('email', 'phone','asaseel','cork','zain','whats','viper')->first();
    
        return $this->respondWithSuccess($data);
    }

    public function getImagesPath()
    {

        $data['item'] = imgPath('items');
        $data['section'] = imgPath('sections');
        $data['subsection'] = imgPath('subsections');        

        return $this->respondWithSuccess($data);
    }

    public function listNotifications(Request $request)
    {
        $data = Notification::Where('user_id', $request->user()->id)->select('id', 'type', 'title', 'message', 'created_at')->get();

        if ($data) {
            return response()->json(['responseCode' => 1, 'subCode' => 200, 'title' => '', 'body' => '', 'data' => $data]);
        }

        return $this->respondWithSuccess($data);
    }

    public static function createUserDeviceToken($userId, $deviceToken, $deviceType)
    {
        $created = UserDevice::create(['user_id' => $userId, 'device_type' => $deviceType, 'device_token' => $deviceToken]);

        return $created;
    }

    public static function respondWithSuccess($data)
    {
        return response()->json(['responseCode' => 1, 'subCode' => 200, 'data' => $data]);
    }

    public static function respondWithError($errors)
    {
        return response()->json(['responseCode' => 0, 'subCode' => 422, 'errors' => $errors]);
    }

    public static function respondWithServerError()
    {
        return response()->json(['responseCode' => 0, 'subCode' => 500]);
    }

    protected function transformNotificationsData($data)
    {
        foreach ($data as $key => $group) {
            $data[$key]['formattedCreatedAt'] = date('jS F Y', strtotime($data[$key]['created_at']));
        }
    }
}
