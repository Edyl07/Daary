@extends('frontend.layouts.app')

@section('styles')
<style>
    .btn-place {
        width: 200px !important;
        transform: translateY(45px);
    }
</style>
@endsection

@section('content')

<section class="section">
    <div class="container">
        <div class="row">

            <div class="col s12 m3">
                <div class="agent-sidebar">
                    @include('agent.sidebar')
                </div>
            </div>


            <div class="col s12 m7">
                <div class="agent-content">
                    <h4 class="agent-title" style="text-transform: uppercase">{{ $property->title }}</h4>
                </div>
                @if(!$property->gallery->isEmpty())
                <div class="single-slider">
                    @include('pages.properties.slider')
                </div>
                @else
                <div class="single-image">
                    @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                    <img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"
                        class="imgresponsive">
                    @endif
                </div>
                @endif

                <div class="single-description p-15 m-b-15 border2 border-top-0">
                    {!! $property->description !!}
                </div>

                <div>
                    @if($property->features)
                    <ul class="collection with-header">
                        <li class="collection-header grey lighten-4">
                            <h5 class="m-0">Caractéristiques</h5>
                        </li>
                        @foreach($property->features as $feature)
                        <li class="collection-item">{{$feature->name}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>

            <div class="col s12 m2">

                <form action="{{ route('agent.update.position', $property->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="location_latitude" value="{{ $lat }}" id="location_latitude">
                    <input type="hidden" name="location_longitude" value="{{ $lng }}" id="location_longitude">
                    <button class="btn waves-effect waves-light orange btn-place" type="submit" name="action"
                        id="update-place">
                        Mettre A jour
                        <i class="material-icons right">place</i>
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>

@endsection

@section('scripts')
<script>
    // $(document).ready(function(){
    
    //     $(document).on("click", "#update-place", function() {
    //         if(navigator.geolocation){
    //             var url = "{{ route('agent.update.position',$property->slug)}}";
    //             $.ajax({
    //                 url: url,
    //                 type: 'PUT',
    //                 cache: false,
    //                 data: {
    //                     _token: '{{ csrf_token() }}',
    //                     location_latitude: $('#location_latitude').val(),
    //                     location_longitude: $('#location_longitude').val()
    //                 },
    //                 success: function(dataResult){
    //                     dataResult= JSON.parse(dataResult);
    //                     if (dataResult.statusCode) {
    //                         window.location = "{{ route('agent.show.position', $property->slug) }}"
    //                     } else {
    //                         console.log('Internal server Error');
    //                     }
    //                 }
    //             })
    //         }
    //     });
    // });


    // function position(){
    //         if (navigator.geolocation) {
            
    //         navigator.geolocation.getCurrentPosition(function(position) {
            
    //         $.ajax({
    //         url: "{{ route('agent.update.position', $property->slug)}}",
    //         headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         data: {
    //         location_latitude: position.coords.latitude,
    //         location_longitude : position.coords.longitude
    //         },
    //         type: 'PUT',
    //         success: function (result) {
    //         console.log(result);
    //         window.location = "{{ route('property.show', $property->slug) }}"
    //         }
    //         });
            
    //         });
    //         }
    //     }
</script>
@endsection