<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', function () {
    return User::all();
});

Route::post('/users/register', function () {
    try {
        $user = new User();
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();

        return [
            'success' => true,
            'data' => $user
        ];
    } 
    catch (Exception $e) {
        // return [
        //     'success' => false,
        //     'message' => $e->getMessage()
        // ];
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()], 500);
    }
});