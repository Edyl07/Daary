<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use App\Property;
use App\PropertyImageGallery;
use App\Rating;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Tymon\JWTAuth\Facades\JWTAuth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::orderBy('id', 'DESC')->paginate(10);

        return response()->json(compact('properties'));
    }


    /**
     * get properties resources without paginate
     */

     public function propertiesWithoutPaginate(){
        $properties = Property::orderBy('id', 'DESC')->get();

        return response()->json(compact('properties'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'price'     => 'required',
            'purpose'     => 'required',
            'type'     => 'required',
            'city'     => 'required',
            // 'location_latitude'  => 'required',
            // 'location_longitude' => 'required',
        ]);

        $image = $request->file('image');
        $slug  = str_slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('property')) {
                Storage::disk('public')->makeDirectory('property');
            }
            $propertyimage = Image::make($image)->stream();
            Storage::disk('public')->put('property/' . $imagename, $propertyimage);
        }

        $floor_plan = $request->file('floor_plan');
        if (isset($floor_plan)) {
            $currentDate = Carbon::now()->toDateString();
            $imagefloorplan = 'floor-plan-' . $currentDate . '-' . uniqid() . '.' . $floor_plan->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('property')) {
                Storage::disk('public')->makeDirectory('property');
            }
            $propertyfloorplan = Image::make($floor_plan)->stream();
            Storage::disk('public')->put('property/' . $imagefloorplan, $propertyfloorplan);
        } else {
            $imagefloorplan = 'default.png';
        }

        $property = new Property();
        $property->title    = $request->title;
        $property->slug     = $slug;
        $property->price    = $request->price;
        $property->purpose  = $request->purpose;
        $property->type     = $request->type;
        $property->cuisine   = $request->cuisine;
        $property->douche   = $request->douche;
        if (isset($imagename)) {
            $property->image = $imagename;
        }
        $property->bedroom  = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->city     = $request->city;
        $property->city_slug = str_slug($request->city);
        $property->address  = $request->address;
        $property->area     = $request->area;

        // if (isset($request->featured)) {
        //     $property->featured = true;
        // }
        $property->agent_id           = Auth::id();
        // $property->video              = $request->video;
        $property->floor_plan         = $imagefloorplan;
        $property->description        = $request->description;
        $property->nearby             = $request->nearby;
        // dd($property);
        $property->save();


        $property->features()->attach($request->features);

        $gallary = $request->file('gallaryimage');

        if ($gallary) {
            foreach ($gallary as $images) {
                $currentDate = Carbon::now()->toDateString();
                $galimage['name'] = 'gallary-' . $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                $galimage['size'] = $images->getSize();
                $galimage['property_id'] = $property->id;

                if (!Storage::disk('public')->exists('property/gallery')) {
                    Storage::disk('public')->makeDirectory('property/gallery');
                }
                $propertyimage = Image::make($images)->stream();
                Storage::disk('public')->put('property/gallery/' . $galimage['name'], $propertyimage);

                $property->gallery()->create($galimage);
            }
        }

        if ($property->save()) {
            // return response()->json(compact());
            return ['Success' => $property];
        } else {
            // return response()->json(compact(['Error'=> 'Failed Insert Property']));
            return ['Error' => 'Failed Insert Property'];
        }
    }

    /**
     * add favorite & delete favorite
     */

    public function add(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        auth()->user()->toggleFavorite($property);

        return ['success' => 'add favorite'];
    }


    /**
     * properties agent
     */

    public function agentProperties()
    {

        $properties = Property::latest()
            ->withCount('comments')
            ->where('agent_id', Auth::id())
            ->paginate(10);

        return response()->json(compact('properties'));
    }

    public function agentPropertiesWithoutPaginate()
    {

        $properties = Property::latest()
            ->withCount('comments')
            ->where('agent_id', Auth::id())
            ->get();

        return response()->json(compact('properties'));
    }



    public function test()
    {
        return auth()->user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::with('features', 'gallery', 'user', 'comments')
            ->withCount('comments')
            ->where('id', $id)
            ->first();

        $rating = Rating::where('property_id', $property->id)->where('type', 'property')->avg('rating');
        $cities = Property::select('city', 'city_slug')->distinct('city_slug')->get();
        //$property = Property::find($id);
        return response()->json(compact('property', 'rating', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::where('id', $id)->first();
        return response()->json(compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required',
            'price'     => 'required',
            'purpose'     => 'required',
            'type'     => 'required',
            'city'     => 'required',

            // 'location_latitude'  => 'required',
            // 'location_longitude' => 'required'
        ]);

        $image = $request->file('image');
        $slug  = str_slug($request->title);

        $property = Property::find($id);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('property')) {
                Storage::disk('public')->makeDirectory('property');
            }
            if (Storage::disk('public')->exists('property/' . $property->image)) {
                Storage::disk('public')->delete('property/' . $property->image);
            }
            $propertyimage = Image::make($image)->stream();
            Storage::disk('public')->put('property/' . $imagename, $propertyimage);
        } else {
            $imagename = $property->image;
        }


        $floor_plan = $request->file('floor_plan');
        if (isset($floor_plan)) {
            $currentDate = Carbon::now()->toDateString();
            $imagefloorplan = 'floor-plan-' . $currentDate . '-' . uniqid() . '.' . $floor_plan->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('property')) {
                Storage::disk('public')->makeDirectory('property');
            }
            if (Storage::disk('public')->exists('property/' . $property->floor_plan)) {
                Storage::disk('public')->delete('property/' . $property->floor_plan);
            }

            $propertyfloorplan = Image::make($floor_plan)->stream();
            Storage::disk('public')->put('property/' . $imagefloorplan, $propertyfloorplan);
        } else {
            $imagefloorplan = $property->floor_plan;
        }


        $property->title    = $request->title;
        $property->slug     = $slug;
        $property->price    = $request->price;
        $property->purpose  = $request->purpose;
        $property->type     = $request->type;
        $property->cuisine   = $request->cuisine;
        $property->douche   = $request->douche;
        if (isset($imagename)) {
            $property->image = $imagename;
        }
        $property->bedroom  = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->city     = $request->city;
        $property->city_slug = str_slug($request->city);
        $property->address  = $request->address;
        $property->area     = $request->area;

        if (isset($request->featured)) {
            $property->featured = true;
        } else {
            $property->featured = false;
        }

        $property->description          = $request->description;
        //$property->video                = $request->video;
        if (isset($imagefloorplan)) {
            $property->floor_plan = $imagefloorplan;
        }
        $property->nearby               = $request->nearby;
        $property->save();

        $property->features()->sync($request->features);

        $gallary = $request->file('gallaryimage');
        if ($gallary) {
            foreach ($gallary as $images) {
                if (isset($images)) {
                    $currentDate = Carbon::now()->toDateString();
                    $galimage['name'] = 'gallary-' . $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                    $galimage['size'] = $images->getSize();
                    $galimage['property_id'] = $property->id;

                    if (!Storage::disk('public')->exists('property/gallery')) {
                        Storage::disk('public')->makeDirectory('property/gallery');
                    }
                    $propertyimage = Image::make($images)->stream();
                    Storage::disk('public')->put('property/gallery/' . $galimage['name'], $propertyimage);

                    $property->gallery()->create($galimage);
                }
            }
        }


        return ['success' => 'à été mis à jour avec succèss'];
    }


    /**
     * properties agent
     */

    public function propertiesAgent($id)
    {
        $properties = Property::where('agent_id', $id)->paginate(10);

        return response()->json(compact('properties'));
    }


    /**
     * properties agent
     */

    public function propertiesAgentWithOutPaginate($id)
    {
        $properties = Property::where('agent_id', $id)->paginate(10);

        return response()->json(compact('properties'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);

        if (Storage::disk('public')->exists('property/' . $property->image)) {
            Storage::disk('public')->delete('property/' . $property->image);
        }
        if (Storage::disk('public')->exists('property/' . $property->floor_plan)) {
            Storage::disk('public')->delete('property/' . $property->floor_plan);
        }

        $property->delete();

        $galleries = $property->gallery;
        if ($galleries) {
            foreach ($galleries as $key => $gallery) {
                if (Storage::disk('public')->exists('property/gallery/' . $gallery->name)) {
                    Storage::disk('public')->delete('property/gallery/' . $gallery->name);
                }
                PropertyImageGallery::destroy($gallery->id);
            }
        }

        $property->features()->detach();


        return ['Success' => 'Ce propriéte a été supprimé', 'Property' => $property];
    }

    /**
     * Search Property
     */

    /* public function filter(Request $request)
    {

        $this->validate($request, [
            'purpose_sale' => 'string',
            'purpose_rent' => 'string',
            'city' => 'string',
            'type' => 'string',
            'min_price' => 'string',
            'max_price' => 'string',
            'min_area' => 'string',
            'max_area' => 'string',
            'bed_one' => 'string',
            'bed_two' => 'string',
            'bed_three' => 'string',
            'bed_for' => 'string',
            'bed_five' => 'string',
            'bedroom' => 'string',
            'bat_one' => 'string',
            'bad_two' => 'string',
            'bat_three' => 'string',
            'bat_for' => 'string',
            'bad_five' => 'string',
            'bathroom' => 'string',
        ]);

        $properties = Property::where('publish', true)->get();

        if (!empty($request->has('purpose_sale'))) {
            $properties= Property::where('purpose', '=', (string)$request->purpose_sale)->get();
        }

        if (!empty($request->has('purpose_rent'))) {
            $properties= Property::where('purpose', '=', (string)$request->purpose_sale)->get();
        }

        if (!empty($request->has('city'))) {
            $properties= Property::where('city', '=', (string)$request->city)->get();
        }

        if (!empty($request->has('type'))) {
            $properties= Property::where('type', '=', (string)$request->type)->get();
        }

        if (!empty($request->has('min_price')) && !empty($request->has('max_price'))) {
            $properties= Property::whereBetween('price', [$request->min_price, $request->max_price])->get();
        }

        if (!empty($request->has('min_area')) && !empty($request->has('max_area'))) {
            $properties = Property::whereBetween('area', [$request->min_area, $request->max_area])->get();
        }
        
        if (!empty($request->has('bed_one'))) {
            $properties = Property::where('bedroom', '=', $request->bed_one)->get();
        }

        if (!empty($request->has('bed_two'))) {
            $properties = Property::where('bedroom', '=', $request->bed_two)->get();
        }

        if (!empty($request->has('bed_three'))) {
            $properties = Property::where('bedroom', '=', $request->bed_three)->get();
        }

        if (!empty($request->has('bed_for'))) {
            $properties = Property::where('bedroom', '=', $request->bed_for)->get();
        }

        if (!empty($request->has('bed_five'))) {
            $properties = Property::where('bedroom', '=', $request->bed_five)->get();
        }

        if (!empty($request->has('bedroom'))) {
            $properties = Property::where('bedroom', '>', $request->bedroom)->get();
        }

        if (!empty($request->has('bat_one'))) {
            $properties = Property::where('bathroom', '=', $request->bat_one)->get();
        }

        if (!empty($request->has('bad_two'))) {
            $properties = Property::where('bathroom', '=', $request->bad_two)->get();
        }

        if (!empty($request->has('bat_three'))) {
            $properties = Property::where('bathroom', '=', $request->bat_three)->get();
        }

        if (!empty($request->has('bat_for'))) {
            $properties = Property::where('bathroom', '=', $request->bat_for)->get();
        }

        if (!empty($request->has('bad_five'))) {
            $properties = Property::where('bathroom', '=', $request->bad_five)->get();
        }

        if (!empty($request->has('bathroom'))) {
            $properties = Property::where('bathroom', '>', $request->bathroom)->get();
        }

        // if (!empty($request->has('created_at'))) {
        //     $properties = Property::where('created_at','>=', $request->created_at)->get();
        // }


        return response()->json(compact('properties'));
    }*/



    public function search(Request $request)
    {
        $city     = strtolower($request->city);
        $type     = $request->type;
        $purpose  = $request->purpose;
        $bedroom  = $request->bedroom;
        $bathroom = $request->bathroom;
        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
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
            ->when($minarea, function ($query, $minarea) {
                return $query->where('area', '>=', $minarea);
            })
            ->when($maxarea, function ($query, $maxarea) {
                return $query->where('area', '<=', $maxarea);
            })
            ->when($featured, function ($query, $featured) {
                return $query->where('featured', '=', $featured);
            })
            ->get();

        return response()->json(compact('properties'));
    }


    public function needExpression(Request $request)
    {
        $city     = strtolower($request->city);
        $type     = $request->type;
        $purpose  = $request->purpose;
        $bedroom  = $request->bedroom;
        $bathroom = $request->bathroom;
        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
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
            ->when($minarea, function ($query, $minarea) {
                return $query->where('area', '>=', $minarea);
            })
            ->when($maxarea, function ($query, $maxarea) {
                return $query->where('area', '<=', $maxarea);
            })
            ->when($featured, function ($query, $featured) {
                return $query->where('featured', '=', $featured);
            })
            ->get();


        $request->validate([
            'agent_id'  => 'required',
            'name'      => 'required',
            'phone'     => 'required',
            'message'   => 'required'
        ]);

        $agents = User::where('role_id', 2)->get();

        $user = User::where('id', Auth::id())->get();

        $message = new Message();
        foreach ($agents as $agent) {
            $request->agent_id = $agent->id;
            $request->message = $properties;
            $request->name = $user->name;
            $request->phone = $user->phone;
            $request->user_id = $user->id;
            $message->create($request->all());
        }

        // $message = new Message();
        // $message->create($request->all());

        return response()->json(compact('properties', 'message'));
    }


    
    /**
     * send message to agent
     */

    public function messageAgent(Request $request)
    {
        $request->validate([
            'agent_id'  => 'required',
            'name'      => 'required',
            'phone'     => 'required',
            'message'   => 'required'
        ]);

        $message = new Message();
        $message->create($request->all());

        if ($message) {
            return response()->json(['message' => 'Message send successfully.', 'info' => $message]);
        } else {
            return response()->json(['Error' => 'Message send Failed.']);
        }
    }

    /**
     * get all message
     */
    public function message()
    {
        $messages = Message::latest()->where('agent_id', Auth::id())->get();

        return response()->json(compact('messages'));
    }


    /**
     * replay message
     */

    public function messageReplay($id)
    {
        $message = Message::findOrFail($id);

        return response()->json(compact('message'));
    }


    public function messageSend(Request $request)
    {
        $request->validate([
            'agent_id'  => 'required',
            'name'      => 'required',
            'phone'     => 'required',
            'message'   => 'required'
        ]);

        $message = new Message();
        $message->create($request->all());

        if ($message) {
            return response()->json(['message' => 'Message send successfully.']);
        } else {
            return response()->json(['Error' => 'Message send Failed.']);
        }
    }
}
