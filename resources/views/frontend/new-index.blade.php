@extends('frontend.layouts.landig-page')

@section('css')
@endsection

@section('content')
    <!-- Preloader -->
<div id="preloader">
    <div id="loader"></div>
</div>
<!--end preloader-->

<div id="main" class="main-content-wraper">
    <div class="main-content-inner">

        <!--start header section-->
        <header class="header">
            <!--start navbar-->
            <div class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="row">
                        <div class="navbar-header page-scroll">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#myNavbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand page-scroll" href="index.html">
                                <img src="{{ asset('img-2/icon-96x96.png') }}" alt="logo">
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a class="page-scroll" href="#hero">Acceuil</a></li>
                                <li><a class="page-scroll" href="#features">Fonctionnalités</a></li>
                                <!-- <li><a class="page-scroll" href="#pricing">Pricing</a></li> -->
                                <li><a class="page-scroll" href="#faqs">Faq</a></li>
                                <!-- <li><a class="page-scroll" href="#news">News</a></li> -->
                                <li><a class="page-scroll" href="#contact">Contact</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!--end navbar-->
        </header>
        <!--end header section-->

        <!--start hero section-->
        <section id="hero" class="section-lg section-hero section-circle">
            <!--background circle shape-->
            <div class="shape shape-style-1 shape-primary">
                <span class="circle-150"></span>
                <span class="circle-50"></span>
                <span class="circle-50"></span>
                <span class="circle-75"></span>
                <span class="circle-100"></span>
                <span class="circle-75"></span>
                <span class="circle-50"></span>
                <span class="circle-100"></span>
                <span class="circle-50"></span>
                <span class="circle-100"></span>
            </div>
            <!--background circle shape-->
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="hero-content-wrap">
                            <div class="hero-content">
                                <h1>Trouvez la maison de vos rêves.</h1>
                                <p>Joignez les meilleurs agents immobilier  s sur les plateformes mobile et devenez proprietare ou locataire a votre tour a prix doux dans toute la zone Mauritanienne et tout cela dans un delais minimum</p>
                                <div class="slider-action-btn">
                                    <!-- <a href="#" class="btn softo-solid-btn"><i class="fa fa-apple"></i> Appstore</a> -->
                                    <a href="https://play.google.com/store/apps/details?id=com.daary_immo.startup&fbclid=IwAR3ctRNT3sgg3XKQx2QCaAfi0pIeA2oemxtYmzHIjaVAzS4-D3658mw6aeA" class="btn btn-icon"><i class="fa fa-android"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mobile-slider-area">
                            <div class="phone">
                                <img src="{{ asset('img-2/iphone-x-frame.png') }}" alt="Phone" class="img-responsive">
                                <div class="mobile-slider owl-carousel owl-theme">
                                    <div class="item"><img src="{{ asset('img-2/screenshoot/1.png') }}" alt="Screen 1"
                                                           class="img-responsive"></div>
                                    <div class="item"><img src="{{ asset('img-2/screenshoot/2.png') }}" alt="Screen 1"
                                                           class="img-responsive"></div>
                                    <div class="item"><img src="{{ asset('img-2/screenshoot/3.png') }}" alt="Screen 2"
                                                           class="img-responsive"></div>
                                    <div class="item"><img src="{{ asset('img-2/screenshoot/4.png') }}" alt="Screen 2"
                                                           class="img-responsive"></div>
                                    <div class="item"><img src="{{ asset('img-2/screenshoot/5.png') }}" alt="Screen 3"
                                                           class="img-responsive"></div>
                                    <div class="item"><img src="{{ asset('img-2/screenshoot/6.png') }}" alt="Screen 3"
                                                           class="img-responsive"></div>
                                    <div class="item"><img src="{{ asset('img-2/screenshoot/7.png') }}" alt="Screen 3"
                                                           class="img-responsive"></div>
                                    <div class="item"><img src="{{ asset('img-2/screenshoot/8.png') }}" alt="Screen 3"
                                                           class="img-responsive"></div>
                                </div>
                            </div>

                            <div class="slider-indicator">
                                <ul>
                                    <li id="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </li>
                                    <li id="next">
                                        <i class="fa fa-angle-right"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-shape">
                <img src="img/waves-shape.svg" alt="shape image">
            </div>
        </section>
        <!--end hero section-->

        <!--start promo section-->
        <section class="promo-section ptb-90">
            <div class="promo-section-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-secondary single-promo-section text-center">
                                <div class="single-promo-content">
                                    <span class="ti-face-smile  "></span>
                                    <h6>Facile à utiliser</h6>
                                    <p>Daary est une application de locations et de ventes immobiliéres personnalisée pour tous vos besoins.</p>
                                </div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-secondary single-promo-section text-center">
                                <div class="single-promo-content">
                                    <span class="ti-vector"></span>
                                    <h6>100% Efficace</h6>
                                    <p>Trouvez rapidement un bien immobilier selon votre budget et vos besoins specifique.</p>
                                </div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-secondary single-promo-section text-center">
                                <div class="single-promo-content">
                                    <span class="ti-palette"></span>
                                    <h6>Recherche Personnalisé</h6>
                                    <p>Nous vous montrons des appartements et des maisons qui correspondent le mieux a vos préférences.</p>
                                </div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-secondary single-promo-section text-center">
                                <div class="single-promo-content">
                                    <span class="ti-headphone-alt"></span>
                                    <h6>24/7 Support</h6>
                                    <p>Accedez a vos données et vos listes de souhait n'importe ou Téléphone, Tablette ou Ordinateur.</p>
                                </div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end promo section-->

        <!--start features section-->
        <section id="features" class="bg-secondary ptb-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading text-center">
                            <h3>Fonctionnalités Daary</h3>
                            <p>Développez des relations commerciales durables par le biais de la conversation chez Daary</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-4 col-sm-6">
                        <!--feature single start-->
                        <div class="single-feature mb-5">
                            <div class="feature-icon">
                                <div class="icon icon-shape bg-color white-text">
                                    <i class="fas fa-people-carry"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h5>Guide immobiliéres</h5>
                                <p class="mb-0"><strong>Daary</strong> vous met à disposition un guide adapté à chaque situation.</p>
                            </div>
                        </div>
                        <!--feature single end-->
                        <!--feature single start-->
                        <div class="single-feature mb-5">
                            <div class="feature-icon">
                                <div class="icon icon-shape bg-color white-text">
                                    <i class="fa fa-calculator"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h5>Mon budget</h5>
                                <p class="mb-0">Définissez votre budget immobilier.</p>
                            </div>
                        </div>
                        <!--feature single end-->
                        <!--feature single start-->
                        <div class="single-feature mb-5">
                            <div class="feature-icon">
                                <div class="icon icon-shape bg-color white-text">
                                    <i class="fa fa-smile-o"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h5>Je suis un agent.</h5>
                                <p class="mb-0">Définissez vos besoins et priorisez vos critères.</p>
                            </div>
                        </div>
                        <!--feature single end-->
                    </div>
                    <div class="col-md-4 hidden-sm hidden-xs">
                        <div class="feature-image">
                            <img src="{{ asset('img-2/screenshoot/9.png') }}" style="height: 500px !important;" class="pos-hcenter img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <!--feature single start-->
                        <div class="single-feature mb-5">
                            <div class="feature-icon">
                                <div class="icon icon-shape bg-color white-text">
                                    <i class="fa fa-file-archive-o"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h5>Une liste de favories</h5>
                                <p class="mb-0">Definissez vos listes de souhaits et faites une comparaison de ces derniers.</p>
                            </div>
                        </div>
                        <!--feature single end-->
                        <!--feature single start-->
                        <div class="single-feature mb-5">
                            <div class="feature-icon">
                                <div class="icon icon-shape bg-color white-text">
                                    <i class="fa fa-adjust"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h5>Basculer vers le mode sombre de votre téléphone.</h5>
                                <p class="mb-0">Un theme qui fatigue nettement moins vos yeux et economise la baterie de votre téléphone.</p>
                            </div>
                        </div>
                        <!--feature single end-->
                        <!--feature single start-->
                        <div class="single-feature mb-5">
                            <div class="feature-icon">
                                <div class="icon icon-shape bg-color white-text">
                                    <i class="far fa-comments"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h5>Entamer une conversation avec vos futurs clients</h5>
                                <p class="mb-0">Renseignez vous d'avantage sur  le bien en question.</p>
                            </div>
                        </div>
                        <!--feature single end-->
                    </div>
                </div>

            </div>
        </section>
       

        <!--start faq section-->
        <section id="faqs" class="faq-section ptb-90">
            <div class="faq-section-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section-heading">
                                <h3>FAQ</h3>
                                <p>Choisissez votre prochain plan réussi et commencez dès aujourd'hui!</p>
                            </div>
                            <div class="panel-group" id="accordion">
                                <!-- Start Single Item -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                                Connexion
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Inscrivez-vous pour recevoir chaque mois les meilleurs cotenus immobilies chez Daary.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Start Single Item -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Recuperer mon mot de passe:
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Vous n'avez qu'a indiquez votre numéro de Téléphone dans le formulaire et un code de verification vous sera envoyez, 
                                                saisissez-le et vous sera rediriger vers la page de changement de mot de passe.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Start Single Item -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                Checklist
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Chaque propriété comporte une tonne de photo et un systéme de like afin de selectionner vos favories pour un usage de comparaison et bien plus... </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Start Single Item -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingFour">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                Recherche Personnalisée
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Nous vous montrons les appartements qui vous correspondent mieux à vos preferences. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="faq-img">
                                <img src="{{ asset('img-2/screenshoot/log.png') }}" style="height: 700px !important;" class="img-responsive" alt="faq image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end faq section-->

        <!--start download section-->
        <section class="download-section" style="background: url('img/download-bg.jpg')no-repeat center center fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 hidden-sm">
                        <div class="download-app-img">
                            <img src="{{ asset('img-2/screenshoot/9.png') }}" style="height: 500px !important;" alt="app download" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="download-app-text">
                            <h3>Obtenez l'application maintenant!</h3>
                            <p>Trouvez la maison de vos rêves.</p>
                            <div class="download-app-button">
                                <!-- <a href="#" class="download-btn hover-active">
                                    <span class="ti-apple"></span>
                                    <p>
                                        <small>Download On</small>
                                        <br> App Store
                                    </p>
                                </a> -->
                                <a href="https://play.google.com/store/apps/details?id=com.daary_immo.startup&fbclid=IwAR3ctRNT3sgg3XKQx2QCaAfi0pIeA2oemxtYmzHIjaVAzS4-D3658mw6aeA" class="download-btn hover-active">
                                    <span class="ti-android"></span>
                                    <p>
                                        <small>Git It On</small>
                                        <br>Google Play
                                    </p>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end download section-->

        

        <!--contact us section start-->
        <section id="contact" class="contact-us ptb-90">
            <div class="contact-us-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="section-heading">
                                <h3>Contactez-nous</h3>
                                <p>Il est très facile de nous contacter.</p>
                            </div>
                            <div class="footer-address">
                                <h6>Siège social</h6>
                                <p>Cité BMCI, Nouakchott, Mauritanie</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i> <span>Numéro de Téléphone: +222 36 34 60 06</span></li>
                                    <li><i class="fa fa-envelope-o"></i> <span>Email : <a
                                            href="mailto:contact@daary-immo.com">contact@daary-immo.com</a></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </section>
        <!--contact us section end-->

        <!--start footer section-->
        <footer class="footer-section bg-secondary ptb-60">
            <div class="footer-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="footer-single-col text-center">
                                <img src="{{ asset('img-2/icon-96x96.png') }}" alt="footer logo">
                                <div class="footer-social-list">
                                    <ul class="list-inline">
                                        <li><a href="https://web.facebook.com/Daary-Immo-102640891848033"> <i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://api.whatsapp.com/send?phone=+22236346006"> <i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                                <div class="copyright-text">
                                    <p>&copy; copyright <a href="#">Daary Immo</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--end footer section-->

    </div><!--end main content inner-->
</div>
<!--end main container -->
@endsection

