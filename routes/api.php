<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Contracts\Providers\Auth;

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

/*---------------------------------------------JWT Specific-------------------------------------------------------*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', 'JWTAuthController@register');
    Route::post('login', 'JWTAuthController@login');
    Route::post('logout', 'JWTAuthController@logout');
    Route::post('refresh', 'JWTAuthController@refresh');
    Route::get('profile', 'JWTAuthController@profile');

});
/*---------------------------------------------JWT Specific-------------------------------------------------------*/



Route::get('/retrieveStudentsInfoByCourseId/{id}', 'ApiController@retrieveStudentsListByCourseId');
Route::get('/retrieveAllCoursesAvailable', 'ApiController@getAllCoursesTableData');
Route::get('/retrieveStudentTableInfoByCourseId/{id}', 'ApiController@retrieveStudentCourseInfoTableInfoByCourseId');
Route::post('/createCourse','ApiController@createCourseForStudents');
Route::put('/modifyCourse/{id}', 'ApiController@updateCourseRecord');



Route::get('/retrieveAllStudentsEnrolledData', 'ApiController@getAllStudentsEnrolledData');
Route::get('/retrieveStudentDataToStudent/{id}', 'ApiController@getStudentDataById');
Route::put('/modifyStudent/{id}', 'ApiController@updateStudentRecord');
Route::post('/addStudentToCourse/{id}', 'ApiController@addStudentToCourse');
