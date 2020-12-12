<?php

namespace App\Http\Controllers;

use App\Property;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add(Request $request, $id){
        $property = Property::findOrFail($id);

        auth()->user()->toggleFavorite($property);  

        return redirect()->back();

        // $property = Property::findOrFail($id);
        // $isFavorite = $user->favorite_properties()->where('property_id', $property->id)->count();

        // if($isFavorite == 0){
        //     $user->favorite_properties()->attach($property);
        //     Toastr::success('Cette propriété à été ajouter dans vos listes de favories');
        //     return redirect()->back();
        // }else{
        //     $user->favorite_properties()->dettach($property);
        //     Toastr::success('Cette propriété à été supprimer dans vos liste de favories');
        //     return redirect()->back();
        // }
    }
}
