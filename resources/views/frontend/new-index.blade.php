@extends('frontend.layouts.landig-page')

@section('css')
    <style>
        @import "compass/css3";

        @import url('https://fonts.googleapis.com/css?family=Signika');
        @import url('https://api.tiles.mapbox.com/mapbox.js/v1.3.1/mapbox.css');
        @import url('https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');

        html {
            font-family: 'Signika', sans-serif;
        }

        body {
            background: #fff;
        }

        #map {
            position: absolute;
            top: 0px;
            bottom: 0;
            width: 100%;
            height: 2000px;
            background-image: url("{{ asset('screenshoot.png') }}");
            background-repeat: no-repeat;
            background-size: 250px 500px;
        }

        .notPlacemarked {
            visibility: hidden;
        }

        .placemarked {
            //background: #FFC52F;
            //border-color:#ffffff;
            //border-width:5px;
            //border-style:solid;
            visibility: visible;
            height: 55px;
            width: 55px;
            //border-radius: 25px;
            position: relative;
            top: 110px;
            //left:80px;
            margin-left: 40%;
            z-index: 100;
            transition: width 1s, height 1s, transform 1s;
            -webkit-transition: width 1s, height 1s, -webkit-transform 1s;
        }

        .container {
            background: #00C993;
            position: absolute;
            display: block;
            width: 100%;
            //z-index:100;
            height: 2050px;
            color: white;
            text-align: center;
            min-width: 24px;
        }

        .section {
            position: absolute;
            display: block;
            width: 100%;
            //top:400px;
            //margin: auto;
            //z-index:100;
            color: white;
            text-align: left;
            //padding-left: 3em;
        }

        #sect1 {
            top: 400px;
        }

        #sect2 {
            top: 1000px;
        }

        #sect3 {
            top: 1500px;
        }

        #footer {
            top: 2050px;
            //background:#DDD7D1;
            //margin:auto;
            height: 50px;
            text-align: center;
        }

        #twitter {
            float: left;
            width: 20%;
            font-size: 5em;
            padding-left: 15%;
            //padding-right:10%;
        }

        #rocket {
            float: right;
            width: 20%;
            font-size: 5em;
            padding-left: 15%;
            //padding-right:10%;
        }

        #hiddenIcon-2 {
            text-align: center;
            /* background-image: url("{{ asset('screennshoot-2.png') }}"); */
            visibility: hidden;
            height: 0;
            //float:none;
            //width: 100%;
            font-size: 5em;
            //padding-left:15%;
            //padding-right:10%;
        }

        #hiddenIcon {
            text-align: center;
            visibility: hidden;
            height: 0;
            //float:none;
            //width: 100%;
            font-size: 5em;
            //padding-left:15%;
            //padding-right:10%;
        }

        .anchor {
            height: 100px;
            //margin-top:100px;
        }

        .band2 h2 {
            text-align: left;

        }

        .explanation {
            min-width: 12.42em;
            float: left;
            //padding-top:5%;
            width: 40%;
            //display:block;
        }

        .explanation-right {
            min-width: 12.42em;
            float: left;
            text-align: right;
            padding-left: 5%;
            width: 40%;
        }

        #phone {
            background: inherit;
            border-radius: 30px;
            box-shadow: inherit;

            padding: 50px 18px 50px 18px;
            width: 20%;
            min-width: 200px;
            max-width: 600px;
            margin-right: 5%;
            float: left;
        }

        #screen {
            /* background-image: url("{{ asset('screeshoot.png') }}"); */
            height: 478px;
            overflow: hidden;
            padding: 0;
            position: relative;
            min-width: 350px;
        }

        #topBar {
            background: #00C993;
            height: 10%;
            overflow: hidden;
            padding-left: 10px;
            padding-right: 10px;
            position: relative;
            min-width: 100px;
        }

        #mc_embed_signup {
            text-align: right;
            background-color: #00C993;
        }

        #mce-EMAIL {
            text-align: right;
            width: auto;
            height: 30px;
            margin-bottom: 20px;
            padding-right: 1em;
            border-style: none;
            outline: none;
        }

        #mce-EMAIL:focus {
            outline: none;

        }

        #mc-embedded-subscribe {
            border-style: none;
        }

        .icon-bookmark {
            float: right;
        }

        .icon-bookmark:hover {
            color: #FFC52F;
        }

        .pressed {
            color: #FFC52F;
        }

        h1,
        h3 {
            font-family: 'Signika', sans-serif;
            font-weight: 700;
            text-align: center;
        }

        .container h1 {
            font-size: 5em;
            line-height: 1em;
            /*margin-bottom: 1em;*/
        }

        a {
            color: white;
        }

        .button {
            background: #DDD7D1;
            text-align: center;
            padding: .5em 1em;
            color: white;
            font-weight: bold;
            text-decoration: none;
            /* box-shadow: 0 0.2em 0 #BCB1A5; */
            text-transform: uppercase;
            letter-spacing: 0.1em;
            /*transition cross-browser stuff*/
            -webkit-transition: background 0.2s ease-out;
            /* Safari 3.2+, Chrome */
            -moz-transition: background 0.2s ease-out;
            /* Firefox 4-15 */
            -o-transition: background 0.2s ease-out;
            /* Opera 10.5–12.00 */
            transition: background 0.2s ease-out;
            /* Firefox 16+, Opera 12.50+ */
        }

        .button:hover {
            background: #BCB1A5;
        }

        a.arrow {
            color: white;
            text-align: center;
            font-size: 3em;
            //display:block;
            //width:100%;
            //float:none;
            text-decoration: none;
            padding-bottom: 30px;
            /*transition cross-browser stuff*/
            -webkit-transition: color 0.2s ease-out;
            /* Safari 3.2+, Chrome */
            -moz-transition: color 0.2s ease-out;
            /* Firefox 4-15 */
            -o-transition: color 0.2s ease-out;
            /* Opera 10.5–12.00 */
            transition: color 0.2s ease-out;
            /* Firefox 16+, Opera 12.50+ */
        }

        a.arrow:hover {
            color: #FFC52F;
        }

        @media only screen and (min-width: 767px) {

            //#phone {float:left;}
            body {
                font-size: 1.125em;
                /* 18px / 16px */

                //line-height: 1.7em;
            }

            .container {
                background-size: 100%;
            }

            .container h1 {
                font-size: 3.25em;
                /*52 / 16*/
            }

            a.button {
                padding: .75em 1.5em;
            }
        }

        @media only screen and (max-width: 550px) {
            .explanation {
                float: none;
                margin: auto;
                text-align: center;
            }

            .explanation-right {
                float: none;
                margin: auto;
                text-align: center;
            }

            #sect1 {
                top: 350px;
            }

            #phone {
                visibility: hidden;
                height: 0px;
                width: 0px;
                padding: 0;
                margin: 0;
            }

            #map {
                width: 0px;
                height: 0px;
            }

            #sect2 {
                top: 900px;
            }

            //#twitter{float:none;margin:auto;padding-left:0em;}
            #rocket {
                visibility: hidden;
            }

            #twitter {
                visibility: hidden;
                padding-left: 0em;
            }

            #hiddenIcon {
                visibility: visible;
                height: auto;
            }

            #mce-EMAIL {
                text-align: center;
                padding: 0;
                float: none;
            }

            #mc_embed_signup {
                text-align: center;
            }

        }

        button.button {
            display: inline-block;
            color: white;
            background-color: #33691e;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer !important;
            /* text-shadow: 1px 1px 1px grey; */
        }

        button.button {
            padding: 11px 20px;
            border: 0;
        }

    </style>
@endsection

@section('content')


    <div class="container" id="skrollr-body" data-0="background-color:rgb(0,201,147);"
        data-400="background-color:rgb(74,173,255);" data-1000="background-color:rgb(74,173,255);"
        data-1300="background-color:rgb(0,201,147);">
        <h1><i class="icon-circle-blank"></i></h1>
        <h2>Accès à tout le monde.</h2>
        <p>Trouvez rapidement un bien immobliéres selon votre budget et vos besoins specifique.</p>
        <a class="arrow" href="#anchor1"><i class="icon-sort-down"></i></a>
        </p>
        <br>

        <div class="section" id="sect1">
            <div class="anchor" id="anchor1"></div>
            <div id="hiddenIcon-2">
            </div>
            <div id="phone" data-0="margin-left: -20%; opacity:0" data-350="margin-left: 10%; opacity:1">

                {{-- <div id="topBar">
                    <p>Press---> <i class="icon-bookmark"></i> </p>
                </div> --}}
                <div id="screen">
                    <div id="map">

                    </div>
                    <!--/ map-->
                </div>
                <!--/ screen-->
            </div>
            <!--/ phone-->
            <div class="explanation" data-300="opacity: 0" data-350="opacity: 1">
                <h2>Rapidite et Efficacite</h2>
                <p>Plus question de vous déplacez, une application fluide est adaptée a vos besoins.</p>
                <a class="arrow" href="#anchor2"><i class="icon-sort-down"></i></a>
            </div>
            <!--/ explanation-->
        </div>
        <!--/ sect1-->

        <div class="section" id="sect2">
            <div class="anchor" id="anchor2"></div>
            <div id="hiddenIcon">
                <i class="icon-facebook"></i>
            </div>
            <div id="twitter" data-600="margin-top: -20%; opacity: 0" data-1000="margin-top: 0; opacity:1">
                <i class="icon-facebook"></i>
            </div>
            <div class="explanation" data-850=" opacity: 0" data-900=" opacity:1">
                <h2>Suivez-nous sur <a href="https://web.facebook.com/Daary-Immo-102640891848033">facebook</a> </h2>
                <p>Rejoignez notre réseau afin de découvrir des détails sur nos mises à jour.  </p>
                <a class="arrow" href="#anchor3"><i class="icon-sort-down"></i></a>
            </div>
            <!--/ explanation-->
        </div>
        <!--sect2-->

        <div class="section" id="sect3">
            <div class="anchor" id="anchor3"></div>
            <div id="hiddenIcon">
                <i class="fab fa-whatsapp"></i>
                <p></p>
            </div>
            <div class="explanation-right" data-1350=" opacity: 0" data-1400=" opacity:1">
                <h2>Ou bien sur What'sApp!</h2>
                <p>Développez des relations commerciales durables par le biais de la conversation chez <a
                        href="https://api.whatsapp.com/send?phone=22220726780">Daary</a>

                

                <!--End mc_embed_signup-->
            </div>
            <!--/ explanation-->
            <div id="rocket" data-1100="margin-top:-300px; margin-right:0%; opacity: 0"
                data-1400="margin-top:50; margin-right:20%; opacity:1">
                <i class="fab fa-whatsapp"></i>
            </div>
            <!--/ rocket-->
        </div>
    </div>
    <!--/ band-->

    <script src="https://api.tiles.mapbox.com/mapbox.js/v1.3.1/mapbox.js"></script>

@endsection


@section('scripts')
    <script src="{{ asset('frontend/js/dist/skrollr.min.js') }}"></script>
    <script>
        skrollr.init({
            forceHeight: false
        });



        /*!
         * Plugin for skrollr.
         * This plugin makes hashlinks scroll nicely to their target position.
         *
         * Alexander Prinzhorn - https://github.com/Prinzhorn/skrollr
         *
         * Free to use under terms of MIT license
         */
        (function(document, window) {
            'use strict';

            var DEFAULT_DURATION = 500;
            var DEFAULT_EASING = 'sqrt';

            var MENU_TOP_ATTR = 'data-menu-top';
            var MENU_OFFSET_ATTR = 'data-menu-offset';

            var skrollr = window.skrollr;
            var history = window.history;
            var supportsHistory = !!history.pushState;

            /*
            Since we are using event bubbling, the element that has been clicked
            might not acutally be the link but a child.
            */
            var findParentLink = function(element) {
                //Yay, it's a link!
                if (element.tagName === 'A') {
                    return element;
                }

                //We reached the top, no link found.
                if (element === document) {
                    return false;
                }

                //Maybe the parent is a link.
                return findParentLink(element.parentNode);
            };

            /*
            Handle the click event on the document.
            */
            var handleClick = function(e) {
                //Only handle left click.
                if ((e.which || e.button) !== 1) {
                    return;
                }

                var link = findParentLink(e.target);

                //The click did not happen inside a link.
                if (!link) {
                    return;
                }

                if (handleLink(link)) {
                    e.preventDefault();
                }
            };

            /*
            Handles the click on a link. May be called without an actual click event.
            When the fake flag is set, the link won't change the url and the position won't be animated.
            */
            var handleLink = function(link, fake) {
                //Don't use the href property (link.href) because it contains the absolute url.
                var href = link.getAttribute('href');

                //Check if it's a hashlink.
                if (!/^#/.test(href)) {
                    return false;
                }

                //Now get the targetTop to scroll to.
                var targetTop;

                //If there's a data-menu-top attribute, it overrides the actuall anchor offset.
                var menuTop = link.getAttribute(MENU_TOP_ATTR);

                if (menuTop !== null) {
                    targetTop = +menuTop;
                } else {
                    var scrollTarget = document.getElementById(href.substr(1));

                    //Ignore the click if no target is found.
                    if (!scrollTarget) {
                        return false;
                    }

                    targetTop = _skrollrInstance.relativeToAbsolute(scrollTarget, 'top', 'top');

                    var menuOffset = scrollTarget.getAttribute(MENU_OFFSET_ATTR);

                    if (menuOffset !== null) {
                        targetTop += +menuOffset;
                    }
                }

                if (supportsHistory && !fake) {
                    history.pushState({
                        top: targetTop
                    }, '', href);
                }

                //Now finally scroll there.
                if (_animate && !fake) {
                    _skrollrInstance.animateTo(targetTop, {
                        duration: _duration(_skrollrInstance.getScrollTop(), targetTop),
                        easing: _easing
                    });
                } else {
                    defer(function() {
                        _skrollrInstance.setScrollTop(targetTop);
                    });
                }

                return true;
            };

            var defer = function(fn) {
                window.setTimeout(fn, 1);
            };

            /*
            Global menu function accessible through window.skrollr.menu.init.
            */
            skrollr.menu = {};
            skrollr.menu.init = function(skrollrInstance, options) {
                _skrollrInstance = skrollrInstance;

                options = options || {};

                _easing = options.easing || DEFAULT_EASING;
                _animate = options.animate !== false;
                _duration = options.duration || DEFAULT_DURATION;

                if (typeof _duration === 'number') {
                    _duration = (function(duration) {
                        return function() {
                            return duration;
                        };
                    }(_duration));
                }

                //Use event bubbling and attach a single listener to the document.
                skrollr.addEvent(document, 'click', handleClick);

                if (supportsHistory) {
                    window.addEventListener('popstate', function(e) {
                        var state = e.state || {};
                        var top = state.top || 0;

                        defer(function() {
                            _skrollrInstance.setScrollTop(top);
                        });
                    }, false);
                }
            };

            //Private reference to the initialized skrollr.
            var _skrollrInstance;

            var _easing;
            var _duration;
            var _animate;

            //In case the page was opened with a hash, prevent jumping to it.
            //http://stackoverflow.com/questions/3659072/jquery-disable-anchor-jump-when-loading-a-page
            defer(function() {
                if (window.location.hash) {
                    window.scrollTo(0, 0);

                    if (document.querySelector) {
                        var link = document.querySelector('a[href="' + window.location.hash + '"]');

                        if (link) {
                            handleLink(link, true);
                        }
                    }
                }
            });
        }(document, window));

        var s = skrollr.init( /*other stuff*/ );

        //The options (second parameter) are all optional. The values shown are the default values.
        skrollr.menu.init(s, {
            //skrollr will smoothly animate to the new position using `animateTo`.
            animate: true,

            //The easing function to use.
            easing: 'sqrt',

            //How long the animation should take in ms.
            duration: function(currentTop, targetTop) {
                //By default, the duration is hardcoded at 500ms.
                return 1000;

                //But you could calculate a value based on the current scroll position (`currentTop`) and the target scroll position (`targetTop`).
                //return Math.abs(currentTop - targetTop) * 10;
            },
        });

        $(".icon-bookmark").click(function() {
            $("#placemark").addClass("placemarked");
            $(".icon-bookmark").addClass("pressed");
        });

    </script>
@endsection
