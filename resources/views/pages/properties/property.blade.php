@extends('frontend.layouts.app')

@section('styles')

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
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                        <span class="card-image-bg"
                            style="background-image:url({{Storage::url('property/'.$property->image)}});"></span>
                        @else
                        <span class="card-image-bg"><span>
                                @endif
                                @if($property->featured == 1)
                                <a class="btn-floating halfway-fab waves-effect waves-light light-green darken-4"><i
                                        class="small material-icons">star</i></a>
                                @endif
                    </div>
                    <div class="card-content property-content">
                        <a href="{{ route('property.show',$property->slug) }}">
                            <span class="card-title tooltipped" data-position="bottom"
                                data-tooltip="{{ $property->title }}">{{ str_limit( $property->title, 18 ) }}</span>
                        </a>

                        <div class="property-info">
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
                        </h5>
                    </div>
                    <div class="card-action property-action text-center">
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
                            @if ($property->cuisine == 'Les_deux')
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