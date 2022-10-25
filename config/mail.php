<?php 

return [
    'driver' => env('MAIL_DRIVER'),
    'host' => env('MAIL_HOST'),
    'port' => env('MAIL_PORT'),
    //'encryption' =>'tls',
    'encryption' => env('MAIL_ENCRYPTION'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    // 'sendmail' => '/usr/sbin/sendmail -bs',
    'sendmail' => '/usr/sbin/sendmail -t',
    // 'stream' => [
    //     'ssl' => [
    //         'verify_peer' => false,
    //         'verify_peer_name' => false,
    //         'allow_self_signed' => true,
    //     ],
    // ],
   ];
