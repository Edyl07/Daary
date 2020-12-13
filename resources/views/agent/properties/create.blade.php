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
                    <h4 class="agent-title" style="text-transform: uppercase">Créer une Propriété</h4>

                    <form action="{{route('agent.properties.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">Titre</i>
                                <input id="title" name="title" type="text" class="validate" data-length="200">
                                <label for="title">Titre</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">monetization_on</i>
                                <input id="price" name="price" type="number" class="validate">
                                <label for="price">Prix</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">business</i>
                                <input id="area" name="area" type="number" class="validate">
                                <label for="area">Surface</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">airline_seat_flat</i>
                                <input id="bedroom" name="bedroom" type="number" class="validate">
                                <label for="bedroom">nombre de chambre</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">event_seat</i>
                                <input id="bathroom" name="bathroom" type="number" class="validate">
                                <label for="bathroom">Nombre de piéces</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <i class="material-icons prefix">location_city</i>
                                <input id="city" name="city" type="text" class="validate">
                                <label for="city">Ville</label>
                            </div>
                            <div class="input-field col s8">
                                <i class="material-icons prefix">account_balance</i>
                                <textarea id="address" name="address" class="materialize-textarea"></textarea>
                                <label for="address">Adresse</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s3">
                                <p>
                                    <label>
                                        <input type="checkbox" name="featured" class="filled-in" />
                                        <span>Mettre en avant</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s9">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                                <label for="description">Déscription</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s4">
                                <label class="label-custom" for="type">Type de Bien</label>
                                <p>
                                    <label>
                                        <input class="with-gap" name="type" value="Maison" type="radio" />
                                        <span>Maison</span>
                                    </label>
                                    <p></p>
                                    <label>
                                        <input class="with-gap" name="type" value="Appartement" type="radio" />
                                        <span>Appartement</span>
                                    </label>
                                    <p></p>
                                    <label>
                                        <input class="with-gap" name="type" value="Duplex" type="radio" />
                                        <span>Duplex</span>
                                    </label>
                                    <p></p>
                                    <label>
                                        <input class="with-gap" name="type" value="Boutique" type="radio" />
                                        <span>Boutique</span>
                                    </label>
                                    <p></p>
                                    <label>
                                        <input class="with-gap" name="type" value="Immeuble" type="radio" />
                                        <span>Immeuble</span>
                                    </label>
                                    <p></p>
                                    <label>
                                        <input class="with-gap" name="type" value="Studio" type="radio" />
                                        <span>Studio</span>
                                    </label>
                                    <p></p>
                                    <label>
                                        <input class="with-gap" name="type" value="Bureau" type="radio" />
                                        <span>Bureau</span>
                                    </label>
                                    <p></p>
                                    <label>
                                        <input class="with-gap" name="type" value="Terrain" type="radio" />
                                        <span>Terrain</span>
                                    </label>
                                </p>
                            </div>
                            <div class="col s4">
                                <label class="label-custom" for="cuisine">Type de Cuisine</label>
                                <p>
                                    <label>
                                        <input class="with-gap" name="cuisine" value="interne" type="radio" />
                                        <span>Interne</span>
                                    </label>
                                    <p>
                                    </p>
                                    <label>
                                        <input class="with-gap" name="cuisine" value="externe" type="radio" />
                                        <span>Externe</span>
                                    </label>
                                    <p>
                                    </p>
                                    <label>
                                        <input class="with-gap" name="cuisine" value="Les_deux" type="radio" />
                                        <span>Interne & Externe</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s4">
                                <i class="fas fa-bath prefix"></i>
                                <input id="douche" name="douche" type="number" class="validate">
                                <label for="douche">Nombre de Salle de Bain</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s4">
                                <label class="label-custom" for="purpose">Type de Propriété</label>
                                <p>
                                    <label>
                                        <input class="with-gap" name="purpose" value="Vendre" type="radio" />
                                        <span>Vendre</span>
                                    </label>
                                    <p>
                                    </p>
                                    <label>
                                        <input class="with-gap" name="purpose" value="Louer" type="radio" />
                                        <span>Location</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s6">
                                <select multiple name="features[]">
                                    <option value="" disabled selected>Choisir Le Type de Quartier</option>
                                    @foreach($features as $feature)
                                    <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                    @endforeach
                                </select>
                                <label class="label-custom">Type de Quartier</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="file-field input-field col s12">
                                <div class="btn light-green">
                                    <span>Image en avant</span>
                                    <input type="file" name="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>

                        {{--  <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">map</i>
                        <input id="location_latitude" name="location_latitude" type="text" class="validate">
                        <label for="location_latitude">Latitude</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">map</i>
                        <input id="location_longitude" name="location_longitude" type="text" class="validate">
                        <label for="location_longitude">Longitude</label>
                    </div>
                </div>  --}}

                        {{--  <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">voice_chat</i>
                                <input id="video" name="video" type="text" class="validate">
                                <label for="video">Youtube Link</label>
                            </div>
                        </div>  --}}

                        <div class="row">
                            <div class="file-field input-field col s12">
                                <div class="btn light-green">
                                    <span>Plan du Propriété</span>
                                    <input type="file" name="floor_plan">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">place</i>
                                <textarea id="nearby" name="nearby" class="materialize-textarea"></textarea>
                                <label for="nearby">Indication</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="file-field input-field col s12">
                                <div class="btn light-green">
                                    <span>Galleries Images</span>
                                    <input type="file" name="gallaryimage[]" multiple>
                                    <span class="helper-text" data-error="wrong" data-success="right">Ajouter d'autre
                                        images</span>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Ajouter d'autre
                                        images">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m-t-30">
                                <button class="btn waves-effect waves-light btn-large light-green darken-4" type="submit">
                                    Enregistrer
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>

                    </form>


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
    });

</script>
@endsection