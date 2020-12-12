@extends('frontend.layouts.app')

@section('styles')

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

            <div class="col s12 m9">
                <div class="agent-content">
                    <h4 class="agent-title" style="text-transform: uppercase">Modifier l'emplacement des propriétes</h4>
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
                                    <a class="btn-floating halfway-fab waves-effect waves-light light-green"><i
                                            class="small material-icons">star</i></a>
                                    @endif
                        </div>
                        <div class="card-content property-content">
                            <a href="{{ route('agent.show.position',$property->slug) }}">
                                <span class="card-title tooltipped" data-position="bottom"
                                    data-tooltip="{{ $property->title }}">{{ str_limit( $property->title, 18 ) }}</span>
                            </a>

                            <div class="address">
                                <i class="small material-icons left">place</i>
                                <span>{{ ucfirst($property->city) }}</span>
                            </div>
                            <div class="address">
                                <i class="small material-icons left">language</i>
                                <span>{{ ucfirst($property->address) }}</span>
                            </div>

                            <div class="address">
                                <i class="small material-icons left">check_box</i>
                                <span>{{ ucfirst($property->type) }}</span>
                            </div>
                            <div class="address">
                                <i class="small material-icons left">check_box</i>
                                <span>For {{ ucfirst($property->purpose) }}</span>
                            </div>

                            <h5>
                                {{ $property->price }} Mru
                                <div class="right" id="propertyrating-{{$property->id}}"></div>
                            </h5>
                        </div>
                        {{-- <div class="card-action property-action">
                            <span class="btn-flat">
                                <i class="material-icons">check_box</i>
                                Bedroom: <strong>{{ $property->bedroom}}</strong>
                        </span>
                        <span class="btn-flat">
                            <i class="material-icons">check_box</i>
                            Bathroom: <strong>{{ $property->bathroom}}</strong>
                        </span>
                        <span class="btn-flat">
                            <i class="material-icons">check_box</i>
                            Area: <strong>{{ $property->area}}</strong> Square Feet
                        </span>
                        <span class="btn-flat">
                            <i class="material-icons">comment</i>
                            <strong>{{ $property->comments_count}}</strong>
                        </span>
                    </div> --}}
                </div>
            </div>
            @endforeach

        </div>

    </div>
    </div> <!-- /.col -->

    </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('input#title, textarea#nearby').characterCounter();
        $('select').formSelect();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // DELETE PROPERTY GALLERY IMAGE
        $('.gallery-image-edit button').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var image = $('#gallery-'+id+' img').attr('alt');
            $.post("{{route('agent.gallery-delete')}}",{id:id,image:image},function(data){
                if(data.msg == true){
                    $('#gallery-'+id).parent().remove();
                    M.toast({html: 'Image deleted successfully.', classes:'green darken-4'})
                }
            });
            
        });
    });

</script>
@endsection