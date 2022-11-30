<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

Route::get('jobs/{job}', function ($job) {
    $job = app('App\Job')->findOrFail($job);
    return view('apply-job', ['job' => $job]);
})->name('job');


Route::view('contact', 'contact')->name('contact');

Route::post('contact', function () {
    $captcha = Http::get('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => setting('site.recaptcha_secret_key'),
        'response' => request('g-recaptcha-response'),
    ]);

    if ($captcha->successful()) {
        if ($captcha->json('success')) {
            $data = request()->only(['name', 'email', 'subject', 'message']);
            app('App\Message')->create($data);
            return response()->json([], 200);
        }
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

Route::post('jobs/{job}', function ($job) {
    $job = app('App\Job')->findOrFail($job);
    if (now()->gte($job->deadline)) {
        abort(404);
    }

    $data = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'resume' => 'required|file|mimetypes:application/pdf',
        'g-recaptcha-response' => 'required'
    ]);

    $job_app = app('App\Models\JobApplicant')->where('email', request('email'))->where('job_id', $job->id)->first();

    if (!blank($job_app)) {
        session()->flash('message', 'Your email address is already used to submit this application.');
        return back();
    }

    try {
        $application = app('App\Models\JobApplicant');
        $application->name = $data['name'];
        $application->email = $data['email'];
        $application->phone = $data['phone'];
        $filePath = str_replace('public/', '', request()->file('resume')->storePublicly('public/resumes'));
        $application->resume = json_encode([[
            'download_link' => $filePath,
            'original_name' => request()->file('resume')->getClientOriginalName()
        ]]);
        $application->job_id = $job->id;
        $application->save();
        session()->flash('message', 'Your application has been successfully accepted.');
    } catch (\Throwable $th) {
        Log::error($th->getMessage());
        session()->flash('message', 'Something went wrong.Please try again.');
    }
    return back();
});
