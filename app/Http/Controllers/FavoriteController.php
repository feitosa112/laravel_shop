<?php

namespace App\Http\Controllers;

use App\Models\FavoriteModel;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addToFavorite($id){
        FavoriteModel::create([
            'product_id'=>$id,
            'user_id'=>Auth::user()->id
        ]);


        return redirect()->back();
    }

    public function removeFromFavorites($id){
        $favorite = FavoriteModel::where('product_id',$id)->get()->first();

        if ($favorite) {
            $favorite->delete();
        }
        return redirect()->back();

    }
}
