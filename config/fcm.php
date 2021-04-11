<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        // 'server_key' => env('FCM_SERVER_KEY', 'Your FCM server key'),
        // 'sender_id' => env('FCM_SENDER_ID', 'Your sender id'),

        'server_key' => 'AAAAWA22xS4:APA91bFsgSlanOO1npSNp5PSbVM1f5FNncb7J5szLWL4V-xfndUQTeP05PrPjl1R0pvjOo4RowLEpwjqwMWCFcEbuU4-D0nSMXmLfKzjJjKALxv64m7ZGl_kfJSyia51aV80qMbXqrdw',
        'sender_id'  => '378187203886',

        'server_send_url'  => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout'          => 30.0, // in second
    ],
];
