<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $user = User::query()->where('id', '9a4e83bd-0732-48d3-b2a6-021a4492f7f7')->first();
    dump($token = $user->createToken(config('app.name'), ['*'], Carbon::now('UTC')->addHours(8))->plainTextToken);
});

Route::get('/user', function () {
    return 'hi';
});
