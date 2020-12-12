<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('mobile/register', 'Api\Auth\AuthController@register');
Route::post('mobile/login', 'Api\Auth\AuthController@authenticate');
Route::post('login/{provider}', 'Api\Auth\SocialApiController@redirect');
Route::post('login/{provider}/callback', 'Api\Auth\SocialApiController@Callback');

Route::post('mobile/forgot_password', 'Api\Auth\ForgotPasswordController@sendInfo');

// Route::get('mobile/filter', 'Api\PropertyController@filter');
Route::get('mobile/search', 'Api\PropertyController@search');
/* ----------------------------------- data api ----------------------------------------------- */
Route::get('mobile/properties', 'Api\PropertyController@index');
Route::get('mobile/property/{id}', 'Api\PropertyController@show');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'Api\Auth\AuthController@getAuthenticatedUser');
    Route::post('mobile/logout', 'Api\Auth\AuthController@logout');
    Route::post('mobile/verify_mobile', 'Api\Auth\ForgotPasswordController@verify');
    Route::get('mobile/change_password', 'Api\Auth\ForgotPasswordController@changePassword');
    Route::post('mobile/add_property', 'Api\PropertyController@store');
    Route::post('mobile/update_property/{property}', 'Api\PropertyController@update');
    Route::post('mobile/delete_property/{property}', 'Api\PropertyController@destroy');
});
