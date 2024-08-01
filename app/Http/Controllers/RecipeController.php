<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function create(Request $req){
        $fields=$req->validate([
            'title'=>['required',],
            'description'=>['required',],
            'time_to_cook'=>['required',],
            'ingredients'=>['required'],
            'how_to_cook'=>['required'],
            'image'=>['required','mimes:jpeg,png,jpg,gif']
        ]);

        $image = $req->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('images', $imageName,'public');
        $fields['image'] = $imagePath;
        $fields['user_id']=Auth::id();
        Recipe::create($fields);
        return redirect('profile')->with('Success',"Recipie added Successfully");
    }

}
