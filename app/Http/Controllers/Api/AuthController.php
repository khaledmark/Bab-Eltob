<?php

namespace App\Http\Controllers\Api;

use App\NewEmail;
use App\ResetPassword;
use App\User;
use App\UserDevice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmCode;

class AuthController extends Controller
{
    public function phoneExist(Request $request)
    {
        $rules = [
            'phone' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $data = User::where('phone', $request->phone)->first();

        return $data
                ? response()->json(['responseCode' => 1, 'subCode' => 202])
                : response()->json(['responseCode' => 0, 'subCode' => 404]);
    }

    public function register(Request $request)
    {
        $rules = [
            'username'    => 'required|max:191|unique:users',
            'email'       => 'required|email|max:191|unique:users',
            'password'    => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'phone'       => 'required|max:191|unique:users',
            'device_token' => 'required',
            'device_type'  => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $user = User::create($request->all());

        $user->update(['api_token' => generateApiToken($user->id, 10)]);

        //save_device_token....
        $created = ApiController::createUserDeviceToken($user->id, $request->device_token, $request->device_type);
        
        $data = $user;
        return $created
            ? ApiController::respondWithSuccess($data)
            : ApiController::respondWithServerError();
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|max:191|email',
            'password' => 'required',
            'device_token' => 'required',
            'device_type' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->status == false) {
                return response()->json(['responseCode' => 1, 'subCode' => 200]);
            }

            //save_device_token....
            $created = ApiController::createUserDeviceToken(Auth::user()->id, $request->device_token, $request->device_type);

            $user =  User::where('email', $request->email)->first();
                        
            $data = $user;
                
            return $created
                ? ApiController::respondWithSuccess($data)
                : ApiController::respondWithServerError();
        }

        return response()->json(['responseCode' => 0, 'subCode' => 404]);
    }

    public function forgetPassword(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:191',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $user = User::whereEmail($request->email)->first();

        if ($user) {
            $saved = $this->sendResetPasswordCode($user);

            return $saved
                ? response()->json(['responseCode' => 1, 'subCode' => 200])
                : response()->json(['responseCode' => 0, 'subCode' => 500]);
        }

        return response()->json(['responseCode' => 0, 'subCode' => 404]);
    }

    public function confirmResetCode(Request $request)
    {
        $rules = [
            'email' => 'required|max:191|email',
            'reset_code' => 'required|max:191',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $data = ResetPassword::where([['email', $request->email], ['token', $request->reset_code]])->first();

        return $data
            ? response()->json(['responseCode' => 1, 'subCode' => 200])
            : response()->json(['responseCode' => 0, 'subCode' => 404]);
    }

    public function resetPassword(Request $request)
    {
        $rules = [
            'email' => 'required|max:191|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $user = User::whereEmail($request->email)->first();

        if ($user) {
            $updated = $user->update(['password' => $request->password]);
        } else {
            return response()->json(['responseCode' => 0, 'subCode' => 404]);
        }

        $updated = $user->update(['password' => $request->password]);

        return $updated
            ? response()->json(['responseCode' => 1, 'subCode' => 200])
            : response()->json(['responseCode' => 0, 'subCode' => 500]);
    }

    public function changeEmail(Request $request)
    {
        $rules = [
            'old_email' => 'required|max:191|email',
            //also checks if old email and new one are the same with "unique".
            'email' => 'required|email|max:191|unique:users',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        if ($request->user()->email == $request->old_email) {
            $saved = $this->changeUserEmail($request->user(), $request->email);

            return $saved
                ? response()->json(['responseCode' => 1, 'subCode' => 200])
                : response()->json(['responseCode' => 0, 'subCode' => 500]);
        }

        return response()->json(['responseCode' => 0, 'subCode' => 404]);
    }

    public function confirmChangeEmailCode(Request $request)
    {
        $rules = [
            'code' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $data = NewEmail::newEmailCode($request->user(), $request->code)->orderBy('created_at', 'desc')->first();

        if ($data) {
            $updated = $request->user()->update(['email' => $data->new_email]);

            return $updated
                ? response()->json(['responseCode' => 1, 'subCode' => 200, 'data' => ['newEmail' => $data->new_email]])
                : response()->json(['responseCode' => 0, 'subCode' => 500]);
        }

        return response()->json(['responseCode' => 0, 'subCode' => 404]);
    }

    public function changePassword(Request $request)
    {
        $rules = [
            // 'current_password'      => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        // if (!(Hash::check($request->current_password, $request->user()->password)))
        //     return response()->json(['responseCode' => 0, 'subCode' => 404]);

        // if( strcmp($request->current_password, $request->new_password) == 0 )
        //     return response()->json(['responseCode' => 0, 'subCode' => 404]);

        $updated = $request->user()->update(['password' => $request->new_password]);

        return $updated
            ? response()->json(['responseCode' => 1, 'subCode' => 200])
            : response()->json(['responseCode' => 0, 'subCode' => 500]);
    }

    public function logout(Request $request)
    {
        $rules = [
            'old_token' => 'required|max:191',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $deleted = UserDevice::where([['user_id', $request->user()->id], ['device_token', $request->old_token]])->delete();

        return $deleted
            ? response()->json(['responseCode' => 1, 'subCode' => 200])
            : ApiController::respondWithServerError();
    }

    public function refreshToken(Request $request)
    {
        $rules = [
            'old_token' => 'required|max:191',
            'new_token' => 'required|max:191',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $data = UserDevice::where([['user_id', $request->user()->id], ['device_token', $request->old_token]])->first();

        if ($data) {
            $updated = $data->update(['device_token' => $request->new_token]);

            return $updated
                ? response()->json(['responseCode' => 1, 'subCode' => 200])
                : ApiController::respondWithServerError();
        }

        return response()->json(['responseCode' => 0, 'subCode' => 404]);
    }

    public function updateCity(Request $request)
    {
        $rules = [
            'city_id' => 'required|exists:cities,id',
            'region_id' => 'required|exists:regions,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $data = User::where('id', $request->user()->id)->first();

        if ($data) {
            $updated = $data->update([
                'city_id' => $request->city_id,
                'region_id' => $request->region_id,
                ]);

            return $updated
                ? response()->json(['responseCode' => 1, 'subCode' => 200])
                : ApiController::respondWithServerError();
        }

        return response()->json(['responseCode' => 0, 'subCode' => 404]);
    }

    public function enableNotification(Request $request)
    {
        $rules = [
            'device_token' => 'required',
            'is_open' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ApiController::respondWithError(validateRules($validator->errors(), $rules));
        }

        $data = UserDevice::where([['user_id', $request->user()->id], ['device_token', $request->device_token]])->first();

        if ($data) {
            $updated = $data->update(['is_open' => $request->is_open]);

            return $updated
                ? response()->json(['responseCode' => 1, 'subCode' => 200])
                : ApiController::respondWithServerError();
        }

        return response()->json(['responseCode' => 0, 'subCode' => 404]);
    }

    protected function sendEmail($userEmail, $code, $headingTitle)
    {
        $data = [
            'mailSubject' => 'Confirmation Code',
            'code' => $code,
            'headingTitle' => $headingTitle,
            'messagesTitle' => settings()['en_name'],
        ];

        Mail::to($userEmail)->send(new ConfirmCode($data));

        if (count(Mail::failures()) > 0) {
            Mail::to($userEmail)->send(new ConfirmCode($data));

            if (count(Mail::failures()) > 0) {
                Mail::to($userEmail)->send(new ConfirmCode($data));
            }
        }
    }

    protected function sendResetPasswordCode($user)
    {
        $code = randNumber(4);
        //delete-old...
        ResetPassword::where('email', $user->email)->delete();
        //create-new...
        $created = ResetPassword::create(['email' => $user->email, 'token' => $code]);

        //-------Send-Email--------
        $headingTitle = 'Confirmation Code For Resetting Password';
        $this->sendEmail($user->email, $code, $headingTitle);

        return $created;
    }

    protected function changeUserEmail($user, $newEmail)
    {
        $code = randNumber(4);

        $created = NewEmail::create(['user_id' => $user->id, 'old_email' => $user->email, 'new_email' => $newEmail, 'code' => $code]);

        //-------Send-Email--------
        $headingTitle = 'Confirmation Code For Changing Email Address In Profile';
        $this->sendEmail($newEmail, $code, $headingTitle);

        return $created;
    }
}
