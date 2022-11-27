<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index')->name('home');

Route::view('/about-us', 'about')->name('about-us');

Route::get('/contracts/{contract}', function ($contract) {
    $contract = app('App\Contract')->where('name', $contract)->first();
    if (blank($contract)) abort(404);
    return view('contracts')->with('contract', $contract);
})->name('contract');

Route::view('contact', 'contact')->name('contact');

Route::post('contact', function () {
    $captcha = Http::get('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => setting('site.recaptcha_secret_key'),
        'response' => request('g-recaptcha-response'),
    ]);
    if ($captcha->successful()) {
        if ($captcha->json('success') && $captcha->json('score') > 0.0) {
            $data = request()->only(['name', 'email', 'subject', 'message']);
            app('App\Message')->create($data);
            return response()->json([], 200);
        }
        return response()->json([], 403);
    }
    return response()->json([], 403);
})->name('contact.submit');

Route::get('capabilities', function () {
    $settings = setting('capabilities-file.capabilities');
    if (blank($settings)) {
        abort(404);
    }
    $link = json_decode($settings, false);
    if (isset($link[0])) {
        $file = Storage::url($link[0]->download_link);
        return redirect(asset($file));
    } else {
        abort(404);
    }
})->name('capabilities');

Route::view('/career', 'career')->name('career');

Route::get('services', function () {
    return abort(404);
})->name('services');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
