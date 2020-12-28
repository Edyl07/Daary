@extends('frontend.layouts.app')

@section('styles')

    <style>
       .m-b-60 nav{
            background-color: #fff !important;
        }
    </style>

@endsection

@section('content')

<section class="section">
    <div class="container">

        <div class="row">
            <h4 class="section-heading">Properties</h4>
        </div>

        <div class="row">
            <div class="city-categories">
                @foreach($cities as $city)
                <div class="col s12 m3" style="border: solid 1px lightgray;">
                    <a class="city-link" href="{{ route('property.city',$city->city_slug) }}">
                        <div class="city-category">
                            <span>{{ $city->city }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row">

            @foreach($properties as $property)
            <div class="col s12 m4" style="height: 410px; max-height: 420px">
                <div class="card">
                    <div class="card-image" data-propertyid="{{ $property->id }}">
                        @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                        <span class="card-image-bg"
                            style="background-image:url({{Storage::url('property/'.$property->image)}});">
                            @guest
                            <a href="javascript:void(0);"  onclick="toastr.info('Vous avez besoin de vous connecté pour ajouter ceci à votre liste de favories.',
                                'Info', { closeButton : true, progressBar: true })" class="btn-floating btn-favorite 
                                light-green darken-4 like-btn" title="Featured">
                                <i id="like{{$property->id}}" class="far fa-heart">
                                </i>
                            </a>
                            @else
                                <?php $property_id = DB::table('favorites')->where('favoriteable_id', $property->id)
                                ->where('user_id', auth()->user()->id)
                                ->count(); ?>
                                @if ($property_id > 0)
                                    <a 
                                    href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $property->id }}').submit();"
                                        class="btn-floating btn-favorite  
                                        red darken-2 like-btn" title="Featured">
                                        <i id="like{{$property->id}}" class="far fa-heart">
                                        </i>
                                    </a>
                                    <form id="favorite-form-{{ $property->id }}" action="{{ route('post.favorite', $property->id) }}" method="post" style="display: none">
                                        @csrf
                                    </form>
                                @else
                                    <a 
                                    href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $property->id }}').submit();"
                                        class="btn-floating btn-favorite  
                                        light-green darken-4 like-btn" title="Featured">
                                        <i id="like{{$property->id}}" class="far fa-heart">
                                        </i>
                                    </a>
                                    <form id="favorite-form-{{ $property->id }}" action="{{ route('post.favorite', $property->id) }}" method="post" style="display: none">
                                        @csrf
                                    </form>
                                @endif
                            
                            @endguest
                        </span>
                        @else
                        <span class="card-image-bg"><span>
                                @endif
                                @if($property->featured == 1)
                                <a class="btn-floating halfway-fab  light-green darken-4" title="Featured"><i
                                        class="small material-icons">star</i></a>
                                @endif

                    </div>
                    <div class="card-content property-content">
                        <a class=" light-green darken-4" href="{{ route('property.show',$property->slug) }}">
                            <span class="card-title tooltipped" data-position="bottom"
                                data-tooltip="{{ $property->title }}">{{ str_limit( $property->title, 25 ) }}</span>
                        </a>

                        <div class="home-icons">
                            <div class="address">
                                <i class="small material-icons left">local_offer</i>
                                <span>{{ ucfirst($property->city) }}</span>
                            </div>
                            <div class="address">
                                <i class="small material-icons left">place</i>
                                <span>{{ ucfirst($property->address) }}</span>
                            </div>
                            <div class="address">
                                @if ($property->type == 'Appartement')
                                <i class="small material-icons left">location_city</i>
                                <span>{{ ucfirst($property->type) }} à {{ $property->purpose }}</span>
                                @else
                                <i class="small material-icons left">home</i>
                                <span>{{ ucfirst($property->type) }} à {{ $property->purpose }}</span>
                                @endif
                            </div>
                            
                        </div>

                        <h5>
                            {{ $property->price }} Mru
                            {{-- <div class="right" id="propertyrating-{{$property->id}}"></div> --}}
                            {{--  <div style="text-align: justify !important; font-size:20px; font-weight: 400 !important">
                                <p style="text-align: justify !important; font-size:20px; font-weight: 400 !important">{!! str_limit($property->description, 40) !!}</p>
                            </div>  --}}
                        </h5>
                    </div>
                    <div class="card-action property-action">
                        <span class="btn-flat">
                            <i class="material-icons">airline_seat_individual_suite</i>
                            Chambres: <strong>{{ $property->bedroom}}</strong>
                        </span>
                        <span class="btn-flat">
                            <i class="material-icons">image_aspect_ratio</i>
                            Piéces: <strong>{{ $property->bathroom}}</strong>
                        </span><br>
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

        </div>

        <div class="m-t-30 m-b-60 center">
            {{ $properties->links() }}
        </div>

    </div>
</section>

@endsection

@section('scripts')

<script>
    $(function(){
        var js_properties = <?php echo json_encode($properties);?>;
        js_properties.data.forEach(element => {
            if(element.rating){
                var elmt = element.rating;
                var sum = 0;
                for( var i = 0; i < elmt.length; i++ ){
                    sum += parseFloat( elmt[i].rating ); 
                }
                var avg = sum/elmt.length;
                if(isNaN(avg) == false){
                    $("#propertyrating-"+element.id).rateYo({
                        rating: avg,
                        starWidth: "20px",
                        readOnly: true
                    });
                }else{
                    $("#propertyrating-"+element.id).rateYo({
                        rating: 0,
                        starWidth: "20px",
                        readOnly: true
                    });
                }
            }
        });
    })
</script>
@endsection