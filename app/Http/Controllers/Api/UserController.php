<?php

namespace App\Http\Controllers\Api;

use App\TempUser;
use App\User;
use App\TransferBalance;
use App\BalanceRequest;
use App\OnlinePayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmCode;
use Validator;

class UserController extends Controller
{

    public function changePhone(Request $request) {

        $rules = [
            'current_phone' => 'required|max:191',
            'phone'         => 'required|max:191|unique:users',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));

        if ($request->current_phone != $request->user()->phone)
            return response()->json(['responseCode' => 0, 'subCode' => 404 ,'data' => false]);
        else
            return response()->json(['responseCode' => 1, 'subCode' => 200 ,'data' => true]);

    }

    public function updateChangedPhone(Request $request) {

        $rules = [

            'confirmed_phone' => 'required|max:191',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));

        $updated = $request->user()->update(['phone' => $request->confirmed_phone]);

        return $updated
            ? response()->json(['responseCode' => 1, 'subCode'=> 200])
            : response()->json(['responseCode' => 0, 'subCode' => 500]);
    }

    public function editPersonalInfo(Request $request) {

        $rules = [
            'username'  => 'max:191',
            'password'  => 'min:6|max:191',
            'region_id' => 'exists:regions,id',
            'city_id'   => 'exists:cities,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));

        if(!$request->username)
            $request['username'] = $request->user()->username;

        $updated = $request->user()->update($request->all());

        return $updated
                ? response()->json(['responseCode' => 1, 'subCode'=> 200, 'data' => $request->user()])
                : ApiController::respondWithServerError();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){

        $user = User::findOrFail($user->id);

        return $user->delete()
            ? response()->json(['responseCode' => 1, 'subCode' => 200])
            : ApiController::respondWithServerError();
    }
    
    public function getUser(Request $request) {
        
        if (config('app.locale') === 'en') {
            $user = User::where('api_token' ,$request->user()->api_token)->first();
            $data = [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'user_type' => $user->user_type,
                'status' => $user->status,
                'api_token' => $user->api_token,
                'city_id' => $user->city_id,
                'region_id' => $user->region_id,
                'created_at' => $user->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $user->updated_at->format('Y-m-d H:i:s'),

                'city' => [
                    'id' => $user->city->id,
                    'name' => $user->city->translate('en')->name,
                ],
                'region' => [
                    'id' => $user->region->id,
                    'name' => $user->region->translate('en')->name,
                ]
            ];          
        }else 
            {
                $data = User::where('api_token' ,$request->user()->api_token)
                            ->with(['city' => function ($query) {
                                $query->select('id', 'name')->get();
                            }])
                            ->with(['region' => function ($query) {
                                $query->select('id', 'name')->get();
                            }])
                            ->first();

            }  

        return $data
            ?response()->json(['responseCode' => 1, 'subCode'=> 200, 'data' => $data])
            :response()->json(['responseCode' => 0, 'subCode' => 404]);
    }
    
    protected function createTempUser($email) {

        $code = randNumber(4);

        TempUser::where('email', $email)->delete();
        $user = TempUser::create([ 'email' => $email, 'confirmation_code' => $code ]);

        //-------Send-Email--------
        $headingTitle = 'Confirmation Code For Registration';
        $this->sendEmail($user->email, $code, $headingTitle);

        return $user;
    }

    protected function sendEmail($userEmail, $code, $headingTitle) {

        $data = [
            'mailSubject'   => 'Confirmation Code',
            'code'          => $code,
            'headingTitle'  => $headingTitle,
            'messagesTitle' => settings()['en_name'],
        ];

        Mail::to($userEmail)->send(new ConfirmCode($data));

        if( count(Mail::failures()) > 0 ) {
            Mail::to($userEmail)->send(new ConfirmCode($data));

            if( count(Mail::failures()) > 0 ) {
                Mail::to($userEmail)->send(new ConfirmCode($data));
            }
        }
    }



}
