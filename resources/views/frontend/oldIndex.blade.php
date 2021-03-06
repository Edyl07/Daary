@extends('frontend.layouts.app')

@section('css')
<style>
    a.btn-favorite {
        position: absolute;
        z-index: 1;
        right: -5px;
        opacity: 0.5 !important;
    }

    a.btn-favorite:hover {
        background-color: red;
        color: white;
    }

    .btn-floating.halfway-fab {
        right: 10px !important;
    }
</style>
@endsection

@section('content')

<!-- SERVICE SECTION -->

{{--  <section class="section grey lighten-4 center">
        <div class="container">
            <div class="row">
                <h4 class="section-heading">Services</h4>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col s12 m4">
                        <div class="card-panel">
                            <i class="material-icons large indigo-text">{{ $service->icon }}</i>
<h5>{{ $service->title }}</h5>
<p>{{ $service->description }}</p>
</div>
</div>
@endforeach
</div>
</div>
</section> --}}


<!-- FEATURED SECTION -->

<section class="section">
    <div class="container">
        <div class="row">
            <h4 class="section-heading" style="margin-top: 250px;"></h4>
        </div>
        <div class="row">

            @foreach($properties as $property)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image" data-propertyid="{{ $property->id }}">
                        @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                        <span class="card-image-bg"
                            style="background-image:url({{Storage::url('property/'.$property->image)}});">
                            <a href="#" class="btn-floating btn-favorite like   light-green darken-4"
                                title="Featured">
                                {{--  {{ Auth::user()->likes()->where('property_id', $property->id)->first() ? 
                                    Auth::user()->likes()->where('property_id', $property->id)->like == 1 ? 'You like this post' : 'Like' : 'Like'
                                }}
                                {{ Auth::user()->likes()->where('property_id', $property->id)->first() ? 
                                 Auth::user()->likes()->where('property_id', $property->id)->like == 0 ? 'You Dont like this post' : 'Dislike' : 'Dislike'
                                }} --}}
                                <i class="small material-icons">favorite_border</i></a>
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
                                <i class="small material-icons left">location_city</i>
                                <span>{{ ucfirst($property->city) }}</span>
                            </div>
                            <div class="address">
                                <i class="small material-icons left">place</i>
                                <span>{{ ucfirst($property->address) }}</span>
                            </div>
                            <div class="address">
                                <i class="small material-icons left">check_box</i>
                                <span>{{ ucfirst($property->type) }} for {{ $property->purpose }}</span>
                            </div>
                        </div>

                        <h5>
                            {{ $property->price }} Mru
                            {{-- <div class="right" id="propertyrating-{{$property->id}}"></div> --}}
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
                            <i class="material-icons">comment</i>
                            <strong>{{ $property->comments_count}}</strong>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


<!-- All properties -->
<section class="section">
    <div class="container">
        <div class="row">
            <h4 class="section-heading">Tout les Propriétés</h4>
        </div>
        <div class="row">

            @foreach($allProprieties as $property)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image panel-favorite"  data-id="{{ $property->id }}">
                        @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                        <span class="card-image-bg"
                            style="background-image:url({{Storage::url('property/'.$property->image)}});">
                            @guest
                            <a  onclick="toastr.info('Vous avez besoin de vous connecté pour ajouter ceci à votre liste de favories.',
                                'Info', { closeButton : true, progressBar: true })" class="btn-floating btn-favorite 
                                light-green darken-4 like-btn" title="Featured">
                                <i id="like{{$property->id}}" class="far fa-heart">
                                </i>
                            </a>
                            @else
                            <a 
                                 class="btn-floating btn-favorite  
                                light-green darken-4 like-btn" title="Featured">
                                <i id="like{{$property->id}}" class="far fa-heart">
                                </i>
                            </a>
                            {{-- <form id="favorite-form-{{ $property->id }}" action="{{ route('post.favorite', $property->id) }}" method="post" style="display: none">
                                @csrf
                            </form> --}}
                            @endguest
                        </span>
                        @else
                        <span class="card-image-bg"><span>
                                @endif
                                @if($property->featured == 1)
                                <a class="btn-floating halfway-fab light-green darken-4" title="Featured"><i
                                        class="small material-icons">star</i></a>
                                @endif
                    </div>
                    <div class="card-content property-content">
                        <a href="{{ route('property.show',$property->slug) }}">
                            <span class="card-title tooltipped" data-position="bottom"
                                data-tooltip="{{ $property->title }}">{{ str_limit( $property->title, 18 ) }}</span>
                        </a>

                        <div class="home-icons">
                            <div class="address">
                                <i class="small material-icons left">location_city</i>
                                <span>{{ ucfirst($property->city) }}</span>
                            </div>
                            <div class="address">
                                <i class="small material-icons left">place</i>
                                <span>{{ ucfirst($property->address) }}</span>
                            </div>
                            <div class="address">
                                <i class="small material-icons left">check_box</i>
                                <span>{{ ucfirst($property->type) }} for {{ $property->purpose }}</span>
                            </div>
                        </div>
                        <h5>
                            {{ $property->price }} Mru
                            {{-- <div class="right" id="propertyrating-{{$property->id}}"></div> --}}
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
                            <i class="material-icons">comment</i>
                            <strong>{{ $property->comments_count}}</strong>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- TESTIMONIALS SECTION -->

{{--  <section class="section grey lighten-3 center">
    <div class="container">

        <h4 class="section-heading">Testimonials</h4>

        <div class="carousel testimonials">

            @foreach($testimonials as $testimonial)
            <div class="carousel-item testimonial-item" href="#{{$testimonial->id}}!">
<div class="card testimonial-card">
    <span style="height:20px;display:block;"></span>
    <div class="card-image testimonial-image">
        <img src="{{Storage::url('testimonial/'.$testimonial->image)}}">
    </div>
    <div class="card-content">
        <span class="card-title">{{$testimonial->name}}</span>
        <p>
            {{$testimonial->testimonial}}
        </p>
    </div>
</div>
</div>
@endforeach

</div>

</div>

</section> --}}


<!-- BLOG SECTION -->

{{--  <section class="section center">
    <div class="row">
        <h4 class="section-heading">Recent Blog</h4>
    </div>
    <div class="container">
        <div class="row">

            @foreach($posts as $post)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        @if(Storage::disk('public')->exists('posts/'.$post->image) && $post->image)
                        <span class="card-image-bg"
                            style="background-image:url({{Storage::url('posts/'.$post->image)}});"></span>
@endif
</div>
<div class="card-content">
    <span class="card-title tooltipped" data-position="bottom" data-tooltip="{{$post->title}}">
        <a href="{{ route('blog.show',$post->slug) }}">{{ str_limit($post->title,18) }}</a>
    </span>
    {!! str_limit($post->body,120) !!}
</div>
<div class="card-action blog-action">
    <a href="{{ route('blog.author',$post->user->username) }}" class="btn-flat">
        <i class="material-icons">person</i>
        <span>{{$post->user->name}}</span>
    </a>
    @foreach($post->categories as $key => $category)
    <a href="{{ route('blog.categories',$category->slug) }}" class="btn-flat">
        <i class="material-icons">folder</i>
        <span>{{$category->name}}</span>
    </a>
    @endforeach
    @foreach($post->tags as $key => $tag)
    <a href="{{ route('blog.tags',$tag->slug) }}" class="btn-flat">
        <i class="material-icons">label</i>
        <span>{{$tag->name}}</span>
    </a>
    @endforeach
    <a href="#" class="btn-flat disabled">
        <i class="material-icons">watch_later</i>
        <span>{{$post->created_at->diffForHumans()}}</span>
    </a>
</div>
</div>
</div>
@endforeach

</div>
</div>
</section> --}}

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {     


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('i.fas.fa-heart, i.far.fa-empty').click(function(){
            console.log('liked');
            var id = $(this).parents(".panel-favorite").data('id');
            var cObjId = this.id;
            var cObj = $(this);

            $.ajax({
               type:'POST',
               url:"{{ }}",
               data:{id:id},
               success:function(data){
                  if(jQuery.isEmptyObject(data.success.attached)){
                    $(cObj).removeClass("like-post");
                  }else{
                    $(cObj).addClass("like-post");
                  }
               }
            });


        });      


        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });                                        
    }); 
</script>
<script>
    $(function(){
        var js_properties = <?php echo json_encode($properties);?>;
        js_properties.forEach(element => {
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
    });

</script>

@endsection