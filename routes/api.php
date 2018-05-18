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

Route::any('users/{phone}/rooms/{roomId}/expenses/{id?}', 'Rest\\ExpensesController@expenses');
Route::any('rooms/{roomId}/users/{phone}/expenses/{id?}', 'Rest\\ExpensesController@rooms_expenses');

Route::any('users/{phone}/rooms/{roomId}/concerning_expenses/{id?}', 'Rest\\ExpensesController@concerningExpenses');
Route::any('rooms/{roomId}/users/{phone}/concerning_expenses/{id?}', 'Rest\\ExpensesController@rooms_concerningExpenses');