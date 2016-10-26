<?php

$app->group(['middleware' => 'auth:myguard'], function () use ($app) {
    $app->get('/', function (\Illuminate\Http\Request $request) use ($app) {
        $user1 = app('auth')->guard('myguard')->user(); // OK
        $user2 = $request->user('myguard'); // Error
        
        var_dump($user1, $user2);
        
        return $app->version();
    });
});
