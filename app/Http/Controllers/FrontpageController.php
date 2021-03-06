<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Testimonial;
use App\Property;
use App\Service;
use App\Slider;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Overtrue\LaravelFavorite\Favorite;

class FrontpageController extends Controller
{

    // public function index(Request $request)
    // {
        

    //     $sliders        = Slider::latest()->get();
    //     $properties     = Property::latest()->where('featured', 1)->with('rating')->withCount('comments')->take(6)->get();
    //     $allProprieties = Property::where('featured', 0)->get();
    //     $services       = Service::orderBy('service_order')->get();
    //     $testimonials   = Testimonial::latest()->get();
    //     $posts          = Post::latest()->where('status', 1)->take(6)->get();
    //     // $user = Auth::user()->id;
    //     // $property = new Property();
    //     // $hasFavorited = Favorite::where('user_id', $user)->where('favoriteable_type', $property->getMorphClass())->count();

    //     //     dd($hasFavorited);

    //     return view('frontend.index', compact('sliders', 'properties', 'services', 'testimonials', 'posts', 'allProprieties'));
    // }

   

    public function index(){
        return view('frontend.new-index');
    }


    public function search(Request $request)
    {
        $city     = strtolower($request->city);
        $type     = $request->type;
        $cuisine  = $request->cuisine;
        $douche   = $request->douche;
        $purpose  = $request->purpose;
        $bedroom  = $request->bedroom;
        $bathroom = $request->bathroom;
        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
        $mindouche = $request->mindouche;
        $maxdouche = $request->maxdouche;
        $minarea  = $request->minarea;
        $maxarea  = $request->maxarea;
        $featured = $request->featured;

        $properties = Property::latest()->withCount('comments')
            ->when($city, function ($query, $city) {
                return $query->where('city', '=', $city);
            })
            ->when($type, function ($query, $type) {
                return $query->where('type', '=', $type);
            })
            ->when($cuisine, function ($query, $cuisine) {
                return $query->where('cuisine', '=', $cuisine);
            })
            ->when($douche, function ($query, $douche) {
                return $query->where('douche', '=', $douche);
            })
            ->when($purpose, function ($query, $purpose) {
                return $query->where('purpose', '=', $purpose);
            })
            ->when($bedroom, function ($query, $bedroom) {
                return $query->where('bedroom', '=', $bedroom);
            })
            ->when($bathroom, function ($query, $bathroom) {
                return $query->where('bathroom', '=', $bathroom);
            })
            ->when($minprice, function ($query, $minprice) {
                return $query->where('price', '>=', $minprice);
            })
            ->when($maxprice, function ($query, $maxprice) {
                return $query->where('price', '<=', $maxprice);
            })
            ->when($mindouche, function ($query, $mindouche) {
                return $query->where('price', '>=', $mindouche);
            })
            ->when($maxdouche, function ($query, $maxdouche) {
                return $query->where('price', '<=', $maxdouche);
            })
            ->when($minarea, function ($query, $minarea) {
                return $query->where('area', '>=', $minarea);
            })
            ->when($maxarea, function ($query, $maxarea) {
                return $query->where('area', '<=', $maxarea);
            })
            ->paginate(10);

        return view('pages.search', compact('properties'));
    }
}
