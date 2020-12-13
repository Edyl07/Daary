@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">

                <div class="col s12 m4 card">

                    <h2 class="sidebar-title">Rechercher une proprièté</h2>

                    <form class="sidebar-search" action="{{ route('search')}}" method="GET">

                        <div class="searchbar">
                            <div class="input-field col s12">
                                <input type="text" name="city" id="autocomplete-input-sidebar" class="autocomplete custominputbox" autocomplete="off">
                                <label for="autocomplete-input-sidebar">Entrer La ville</label>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="type" class="browser-default">
                                    <option value="" disabled selected>Type</option>
                                    <option value="Appartement">Appartement</option>
                                    <option value="Maison">Maison</option>
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="purpose" class="browser-default">
                                    <option value="" disabled selected>Type de Bien</option>
                                    <option value="rent">Louer</option>
                                    <option value="sale">Vendre</option>
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="bedroom" class="browser-default">
                                    <option value="" disabled selected>Choisissez le nombre de Chambre</option>
                                    @foreach($bedroomdistinct as $bedroom)
                                        <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-field col s12">
                                <select name="cusine" class="browser-default">
                                    <option value="" disabled selected>Type de cusine</option>
                                    <option value="rent">Interne</option>
                                    <option value="sale">Externe</option>
                                    <option value="sale">Interne & Externe</option>
                                </select>
                            </div>

                            <div class="input-field col s12">
                                <select name="bathroom" class="browser-default">
                                    <option value="" disabled selected>Choisissez le nombre de Piéce</option>
                                    @foreach($bathroomdistinct as $bathroom)
                                        <option value="{{$bathroom->bathroom}}">{{$bathroom->bathroom}}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="minprice" id="minprice" class="custominputbox">
                                <label for="minprice">Prix Minimum</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="maxprice" id="maxprice" class="custominputbox">
                                <label for="maxprice">Prix Maximum</label>
                            </div>

                            <div class="input-field col s12">
                                <input type="number" name="minprice" id="mindouche" class="custominputbox">
                                <label for="mindouche">Minimum de Toilette</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="maxdouche" id="maxdouche" class="custominputbox">
                                <label for="maxdouche">Maximum de Toilette</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="minarea" id="minarea" class="custominputbox">
                                <label for="minarea">Superficie Minimum</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="maxarea" id="maxarea" class="custominputbox">
                                <label for="maxarea">Superficie Maximum</label>
                            </div>
                            
                            {{-- <div class="input-field col s12">
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" name="featured">
                                        <span class="lever"></span>
                                        Featured
                                    </label>
                                </div>
                            </div> --}}
                            <div class="input-field col s12">
                                <button class="btn btnsearch light-green" type="submit">
                                    <i class="material-icons left">search</i>
                                    <span>Chercher</span>
                                </button>
                            </div>
                        </div>
    
                    </form>

                </div>

                <div class="col s12 m8">

                    @foreach($properties as $property)
                        <div class="card horizontal">
                            <div>
                                <div class="card-content property-content">
                                    @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                        <div class="card-image blog-content-image">
                                            <img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}">
                                        </div>
                                    @endif
                                    <span class="card-title search-title" title="{{$property->title}}">
                                        <a href="{{ route('property.show',$property->slug) }}">{{ $property->title }}</a>
                                    </span>
                                    
                                    <div class="address">
                                        <i class="small material-icons left">local_offer</i>
                                        <span>{{ ucfirst($property->city) }}</span>
                                    </div>
                                    <div class="address">
                                        <i class="small material-icons left">place</i>
                                        <span>{{ ucfirst($property->address) }}</span>
                                    </div>

                                    <div>
                                        <h5>
                                            {{ $property->price }} Mru
                                            @if ($property->purpose == 'Vendre')
                                            <span style="border-radius: 8%; color: #1d1c1c !important" class="badge light-green lighten-2"><small class="right">{{ $property->type }} à {{ $property->purpose }}</small></span>
                                            @else
                                            <span style="border-radius: 8%; color: #1d1c1c !important" class="badge orange lighten-2"><small class="right">{{ $property->type }} à {{ $property->purpose }}</small></span>
                                            @endif
                                        </h5>
                                    </div>

                                    <div>
                                        <p>{!! str_limit($property->description, 200) !!}</p>
                                    </div>

                                </div>
                                <div class="card-action property-action clearfix">
                                    <span class="btn-flat">
                                        <i class="material-icons">airline_seat_individual_suite</i>
                                        Chambres: <strong>{{ $property->bedroom}}</strong>
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">image_aspect_ratio</i>
                                        Piéces: <strong>{{ $property->bathroom}}</strong>
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">rounded_corner
                                        </i>
                                        Surface: <strong>{{ $property->area}}</strong> m²
                                    </span>
                                    <span class="btn-flat">
                                        @if ($property->douche == 'Les_deux')
                                        <i class="material-icons">kitchen</i>
                                        Cuisine:<strong>Interne & Externe</strong>
                                        @else
                                        <i class="material-icons">kitchen</i>
                                        Cuisine:<strong>{{ $property->cuisine}}</strong>
                                        @endif
                                    </span>

                                    <span class="btn-flat">
                                        <i class="fas fa-bath" style="transform: translateY(0px)"></i>
                                        Salle de bain:<strong>{{ $property->douche}}</strong>
                                    </span>                                  

                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="m-t-30 m-b-60 center">
                        {{ 
                            $properties->appends([
                                'city'      => Request::get('city'),
                                'type'      => Request::get('type'),
                                'purpose'   => Request::get('purpose'),
                                'bedroom'   => Request::get('bedroom'),
                                'bathroom'  => Request::get('bathroom'),
                                'minprice'  => Request::get('minprice'),
                                'maxprice'  => Request::get('maxprice'),
                                'minarea'   => Request::get('minarea'),
                                'maxarea'   => Request::get('maxarea'),
                                'featured'  => Request::get('featured')
                            ])->links() 
                        }}
                    </div>
        
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection