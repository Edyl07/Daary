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

Route::get('mobile/agents', 'Api\AgentController@index');

Route::get('mobile/agent/{id}/properties', 'Api\PropertyController@propertiesAgent');
Route::get('mobile/agent/messages', 'Api\MessageController@message');
Route::get('mobile/agent/profile', 'Api\AgentController@profile');

//message
Route::post('mobile/property/message', 'Api\PropertyController@messageAgent');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('mobile/agent/{id}', 'Api\AgentController@show');
    Route::get('mobile/user', 'Api\Auth\AuthController@getAuthenticatedUser');
    Route::post('mobile/logout', 'Api\Auth\AuthController@logout');
    Route::post('mobile/verify_mobile', 'Api\Auth\ForgotPasswordController@verify');
    Route::post('mobile/change_password', 'Api\Auth\AuthController@changePasswordUpdate');
    Route::post('mobile/reset_password', 'Api\Auth\ForgotPasswordController@resetPassword');
    Route::post('mobile/add_property', 'Api\PropertyController@store');
    Route::get('mobile/edit_property/{id}', 'Api\PropertyController@edit');
    Route::post('mobile/update_property/{id}', 'Api\PropertyController@update');
    Route::post('mobile/delete_property/{id}', 'Api\PropertyController@destroy');
    Route::post('mobile/toggle_favorite/{id}', 'Api\PropertyController@add');
    Route::get('mobile/profile', 'Api\AgentController@profile');
    Route::post('mobile/updateProfile', 'Api\AgentController@updateProfile');
    Route::get('mobile/added_properties', 'Api\PropertyController@agentProperties');

    //message
    Route::get('mobile/message', 'Api\PropertyController@message');
    Route::get('mobile/message/replay/{id}', 'Api\PropertyController@messageReplay');
    Route::post('mobile/message/replay', 'Api\PropertyController@messageSend');
    Route::post('mobile/user_request_property', 'Api\PropertyController@needExpression');
});
