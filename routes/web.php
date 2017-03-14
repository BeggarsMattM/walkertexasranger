<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('redeem', 'DownloadController@redeem');

Route::post('checkcode', 'DownloadController@check');

Route::get('gencodes', function() {

dd('disabled');

function randomKey($length) {
    $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
    $key = '';
    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}

	for ($i = 0; $i < 600; $i++) {
		$code = 'DALL' . randomKey(12);

		$c = new \App\Code;
		$c->code = $code;
		$c->save();
	}
});

// Route::get('download', 'DownloadController@download');
