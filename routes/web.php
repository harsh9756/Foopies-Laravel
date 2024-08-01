<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    $recipes = Recipe::with('user')->get();
    return view('index', compact('recipes'));
});

Route::get('/logout',function(REQUEST $req){
    auth()->logout();
    $req->session()->invalidate();
    return redirect('login');
});

Route::view('/login','auth.login')->name('login');
Route::POST('/login',[AuthController::class,'login'])->name('login');

Route::view('/register','auth.register')->name('register');
Route::Post('/register',[AuthController::class,'register'])->name('register');

Route::get('/profile',function(REQUEST $req){
    $user=auth()->user();
    $recipes=Recipe::where('user_id',$user->id)->get();    
    return view('profile.view',compact('user','recipes'));
})->name('profile');

Route::get('profile/edit',function(REQUEST $req){
    $user=auth()->user();
    return view('profile.edit',['user'=>$user]);
})->name('edit');
Route::Post('/profile/edit',[AuthController::class,'edit'])->name('profsave');

Route::view('profile/new/recipe','recipies.create')->name('createRec');
Route::Post('profile/new/recipe',[RecipeController::class,'create'])->name('createRec');

Route::get('recipe/{id}/delete', function ($id) {
    $recipe = Recipe::findOrFail($id);
    $imagePath = storage_path('app/public/' . $recipe->image);
    File::delete($imagePath);
    $recipe->delete();
    return redirect()->route('profile')->with('success', 'Recipe deleted successfully');
})->name('recipe.delete');

Route::get('recipe/{id}/detail', function($id){
    $recipe = Recipe::with('user')->findOrFail($id);
    return view('recipies.view',compact('recipe'));
})->name('recipes.show');