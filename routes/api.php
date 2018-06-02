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

Route::get('users/{phone}/rooms/{roomId}/expenses/{id?}', 'Rest\\ExpensesController@expenses');
Route::get('rooms/{roomId}/users/{phone}/expenses/{id?}', 'Rest\\ExpensesController@rooms_expenses');

Route::get('users/{phone}/rooms/{roomId}/concerning_expenses/{id?}', 'Rest\\ExpensesController@concerningExpenses');
Route::get('rooms/{roomId}/users/{phone}/concerning_expenses/{id?}', 'Rest\\ExpensesController@rooms_concerningExpenses');

Route::post('/auth', 'Rest\\UsersController@auth');
Route::post('/register', 'Rest\\UsersController@register');