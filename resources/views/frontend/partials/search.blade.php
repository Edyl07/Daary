<!-- SEARCH SECTION -->

<section class="light-green lighten-1 search-section white-text center" style="margin: -200px 0;">
    <div class="container">
        <div class="row m-b-0">
            <div class="col s12">

                <form action="{{ route('search')}} " method="GET" style="z-index: 1; opacity: 1;">

                    <div class="searchbar row">
                        <div class="input-field col s12 m3">
                            <input type="text" name="city" id="autocomplete-input" class="autocomplete custominputbox"
                                autocomplete="off">
                            <label for="autocomplete-input">Entrer nom de la ville</label>
                        </div>

                        <div class="input-field col s12 m2">
                            <select name="type" class="browser-default">
                                <option value="" disabled selected>Choisissez un type</option>
                                <option value="Appartement">Appartment</option>
                                <option value="Maison">Maison</option>
                            </select>
                        </div>

                        <div class="input-field col s12 m2">
                            <select name="cusine" class="browser-default">
                                <option value="" disabled selected>Type de Cusine</option>
                                <option value="interne">Interne</option>
                                <option value="externe">Externe</option>
                                <option value="Les_deux">Interne & Externe</option>
                            </select>
                        </div>
                        
                        <div class="input-field col s12 m2">
                            <select name="purpose" class="browser-default">
                                <option value="" disabled selected>Categorie</option>
                                <option value="Louer">Louer</option>
                                <option value="Vendre">Vendre</option>
                            </select>
                        </div>

                        <div class="input-field col s12 m2">
                            <select name="bedroom" class="browser-default">
                                <option value="" disabled selected>Nombre de chambre</option>
                                @if(isset($bedroomdistinct))
                                @foreach($bedroomdistinct as $bedroom)
                                <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="input-field col s12 m2">
                            <select name="douche" class="browser-default">
                                <option value="" disabled selected>Salle de Bain</option>
                                @if(isset($douchedistinct))
                                @foreach($douchedistinct as $douche)
                                <option value="{{$douche->douche}}">{{$douche->douche}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="input-field col s12 m2">
                            <input type="text" name="maxprice" id="maxprice" class="custominputbox">
                            <label for="maxprice">Prix Maximum</label>
                        </div>

                        <div class="input-field col s12 m1">
                            <button class="btn btnsearch waves-effect waves-light w100" type="submit">
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>