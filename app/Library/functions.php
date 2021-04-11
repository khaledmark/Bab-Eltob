<?php

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM;

//use FCM;

function explodeByComma($str)
{
    return explode(',', $str);
}

function explodeByDash($str)
{
    return explode('-', $str);
}

function uploads($folder = '') {

    return public_path('uploads') . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR;

}

function imgPath($folderName)
{
//    return '/uploads/' . $folderName . '/';
    return '/public/uploads/'.$folderName.'/';
}

function uploadImg64( $base64_img, $path ) {

	$image_data = base64_decode( $base64_img );
//	$source     = imagecreatefromstring( $image_data );
//	$angle      = 0;
//	$rotate     = imagerotate( $source, $angle, 0 ); // if want to rotate the image
	$imageName  = time() . rand(0, 99) . '.png';
	$path       = $path . $imageName;
//	$imageSave  = imagejpeg( $rotate, $path, 100 );

    file_put_contents($path, $image_data);

    return $imageName;
}

function settings()
{
    return \App\Setting::where('id', 1)->first();
}

function validateRules($errors, $rules)
{
    $error_arr = [];

    foreach ($rules as $key => $value) {
        if ($errors->get($key)) {
            array_push($error_arr, array('key' => $key, 'value' => $errors->first($key)));
        }
    }

    return $error_arr;
}

function randNumber($length)
{
    $seed = str_split('0123456789');

    shuffle($seed);

    $rand = '';

    foreach (array_rand($seed, $length) as $k) {
        $rand .= $seed[$k];
    }

    return $rand;
}

function generateApiToken($userId, $length)
{
    $seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789');

    shuffle($seed);

    $rand = '';

    foreach (array_rand($seed, $length) as $k) {
        $rand .= $seed[$k];
    }

    return $userId * $userId.$rand;
}

// function UploadBase64Image($base64Str, $prefix, $folderName) {

//     $image = base64_decode($base64Str);
//     $image_name = $prefix . '_' . time() .'.png';
//     $path = public_path( 'uploads' ) . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $image_name;

//     $saved = file_put_contents($path, $image);

//     return $saved ? $image_name : NULL;
// }

function UploadImage($inputRequest, $prefix, $folderNam)
{
    $imageName = $prefix.'_'.time().'.'.$inputRequest->getClientOriginalExtension();

    $destinationPath = public_path('/uploads/'.$folderNam);

    $inputRequest->move($destinationPath, $imageName);

    return $imageName ? $imageName : false;
}

function notificationShortcutTypes()
{
    return [
        '1' => '',
        '2' => '',
        '3' => '',
        '4' => '',
        '5' => 'admin',
        '6' => 'target',
    ];
}

function getNotificationType($typeNum)
{
    $types = notificationShortcutTypes();

    foreach ($types as $key => $value) {
        if ($typeNum == $key) {
            return $value;
        }
    }
}

function genders()
{
    return [
        'M' => 'ذكر',
        'F' => 'أنثى',
    ];
}

function getGenderString($char)
{
    $genders = genders();
    foreach ($genders as $key => $value) {
        if ($char == $key) {
            return $value;
        }
    }
}

function targetGenders()
{
    return [
        'M' => ['M'],
        'F' => ['F'],
        'B' => ['M', 'F'],
    ];
}

function usersTypes()
{
    return [
        'admin' => 'admin',
        'provider' => 'provider',
        'user' => 'user',
        'vip' => 'vip',
    ];
}

function getIntUserType($type)
{
    $users = usersTypes();
    foreach ($users as $key => $value) {
        if ($type == $key) {
            return $value;
        }
    }

    return false;
}

function endsWith($string, $finding)
{
    $length = strlen($finding);
    if ($length == 0) {
        return true;
    }

    return substr($string, -$length) === $finding;
}

function sendNotification($notificationTitle, $notificationBody, $deviceToken )
{
    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);

    $notificationBuilder = new PayloadNotificationBuilder($notificationTitle);
    $notificationBuilder->setBody($notificationBody)
        ->setSound('default');
        
       
    $dataBuilder = new PayloadDataBuilder();
    $dataBuilder->addData([
        
        ]);

    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $data = $dataBuilder->build();

    $token = $deviceToken;

    $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

    $downstreamResponse->numberSuccess();
    $downstreamResponse->numberFailure();
    $downstreamResponse->numberModification();

    //return Array - you must remove all this tokens in your database
    $downstreamResponse->tokensToDelete();

    //return Array (key : oldToken, value : new token - you must change the token in your database )
    $downstreamResponse->tokensToModify();

    //return Array - you should try to resend the message to the tokens in the array
    $downstreamResponse->tokensToRetry();

    // return Array (key:token, value:errror) - in production you should remove from your database the tokens
}
function sendMultiNotificationOperation($notificationTitle, $devicesTokens, $resposData)
{
    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);

    $notificationBuilder = new PayloadNotificationBuilder($notificationTitle);
    

    $dataBuilder = new PayloadDataBuilder();
    $dataBuilder->addData($resposData[0]);
    
    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $data = $dataBuilder->build();

    // You must change it to get your tokens
    $tokens = $devicesTokens;

    $downstreamResponse = FCM::sendTo($tokens, $option, null, $data);

    $downstreamResponse->numberSuccess();
    $downstreamResponse->numberFailure();
    $downstreamResponse->numberModification();

    //return Array - you must remove all this tokens in your database
    $downstreamResponse->tokensToDelete();

    //return Array (key : oldToken, value : new token - you must change the token in your database )
    $downstreamResponse->tokensToModify();

    //return Array - you should try to resend the message to the tokens in the array
    $downstreamResponse->tokensToRetry();

    // return Array (key:token, value:errror) - in production you should remove from your database the tokens present in this array
    $downstreamResponse->tokensWithError();

    return ['success' => $downstreamResponse->numberSuccess(), 'fail' => $downstreamResponse->numberFailure()];
}

function sendMultiNotification($notificationTitle, $notificationBody,$devicesTokens)
{
    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);

    $notificationBuilder = new PayloadNotificationBuilder($notificationTitle);
    $notificationBuilder->setBody($notificationBody)
        ->setSound('default');

    $dataBuilder = new PayloadDataBuilder();    
    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $data = $dataBuilder->build();

    // You must change it to get your tokens
    $tokens = $devicesTokens;

    $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

    $downstreamResponse->numberSuccess();
    $downstreamResponse->numberFailure();
    $downstreamResponse->numberModification();

    //return Array - you must remove all this tokens in your database
    $downstreamResponse->tokensToDelete();

    //return Array (key : oldToken, value : new token - you must change the token in your database )
    $downstreamResponse->tokensToModify();

    //return Array - you should try to resend the message to the tokens in the array
    $downstreamResponse->tokensToRetry();

    // return Array (key:token, value:errror) - in production you should remove from your database the tokens present in this array
    $downstreamResponse->tokensWithError();

    return ['success' => $downstreamResponse->numberSuccess(), 'fail' => $downstreamResponse->numberFailure()];
}

function sendMultiNotificationIos($notificationTitle, $devicesTokens, $resposData)
{
    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);

    $notificationBuilder = new PayloadNotificationBuilder($notificationTitle);
    
    $dataBuilder = new PayloadDataBuilder();
    $dataBuilder->addData($resposData[0]);
    
    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $data = $dataBuilder->build();

    // You must change it to get your tokens
    $tokens = $devicesTokens;

    $downstreamResponse = FCM::sendTo($tokens, $option, null, $data);

    $downstreamResponse->numberSuccess();
    $downstreamResponse->numberFailure();
    $downstreamResponse->numberModification();

    //return Array - you must remove all this tokens in your database
    $downstreamResponse->tokensToDelete();

    //return Array (key : oldToken, value : new token - you must change the token in your database )
    $downstreamResponse->tokensToModify();

    //return Array - you should try to resend the message to the tokens in the array
    $downstreamResponse->tokensToRetry();

    // return Array (key:token, value:errror) - in production you should remove from your database the tokens present in this array
    $downstreamResponse->tokensWithError();

    return ['success' => $downstreamResponse->numberSuccess(), 'fail' => $downstreamResponse->numberFailure()];
}


function saveNotification($userId, $title, $type, $message)
{
    $created = \App\Notification::create(['user_id' => $userId, 'title' => $title, 'type' => $type, 'message' => $message]);

    return $created;
}
