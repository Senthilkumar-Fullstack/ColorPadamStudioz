<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>1Clickstudios</title>
        <link rel="icon" href="{{ URL::asset('resources/assets/img/favicon.png') }}" type="img/png" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/lib/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/additional.css') }}">

        <!-- Lightbox2 -->
        <link href="{{ URL::asset('public/lib/lightbox2/css/lightbox.css') }}" rel="stylesheet">
    </head>
    <body>
        <header id="header">
            <div class="container">
                <div class="headtop">
                    <nav class="navbar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-top" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1 class="navbar-brand df-navbar-brand"><a href="#"><img alt="Desiflight" src="{{ URL::asset('resources/assets/img/logo.jpg') }}" width="225"></a></h1>
                        </div>

                        <!-- Collect the nav links for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-collapse-top">
                            <ul class="social_icons pull-right clearfix">
                                <li><a href="https://www.facebook.com/desiflight/" target="_blank"><img src="{{ URL::asset('resources/assets/img/fb_icon.png') }}" alt=""></a></li>
                            </ul>
                            <ul class="nav navbar-nav pull-right df_navbar">
                                <li class="active"><a href="#">About Us</a></li>
                                <li><a href="#">Air Tickets</a></li>
                                <li><a href="#">Tours</a></li>
                                <li><a href="#">Insurance</a></li>
                                <li><a href="#">Hotels</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div>
                    </nav>        
                </div>
            </div>
        </header>

        <div id="content">
            <div class="row_1">
               <div class="container">
                   <ul class="bxslider">
                        <li><img src="{{ URL::asset('resources/assets/img/slider2.jpg') }}" /></li>
                        <li><img src="{{ URL::asset('resources/assets/img/slider5.jpg') }}" /></li>
                        <li><img src="{{ URL::asset('resources/assets/img/slider6.jpg') }}" /></li>
                    </ul>
               </div> 
            </div>

            <div class="row_1">
               <div class="container">
                    <!-- Air Ticket Quote -->
                    <div class="col-md-4 quote-wrapper">
                        <h3 class="row quote-heading">Quick Quote - Air Tickets</h3>
                        <form id="quoteForm">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tripType" id="tripType" value="roundTrip" checked="checked"> Round Trip
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="tripType" id="tripType" value="oneWay"> One-way
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="text" class="form-control" id="from" name="starting" placeholder="From">
                            </div>
                            <div class="form-group">
                                <label for="to">To</label>
                                <input type="text" class="form-control" id="to" name="ending"  placeholder="To">
                            </div>
                            <div class="form-group">
                                <label for="depart">Depart</label>
                                <input type="text" class="form-control calendar" id="depart" name="depart" placeholder="Depart">
                            </div>
                            <div class="form-group" id="returnDate">
                                <label for="return">Return</label>
                                <input type="text" class="form-control calendar" id="return" name="return" placeholder="Return">
                            </div>
                            <div class="form-group">
                                <label>Passengers</label><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Adult</label>
                                        <select name="passAdult" class="form-control form-control-sm">
                                            <option>Select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>
                                        <small id="adult" class="form-text text-muted">(12+ years)</small>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Children</label>
                                        <select name="passChild" class="form-control form-control-sm">
                                            <option>Select</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>
                                        <small id="children" class="form-text text-muted">(2-11 years)</small>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Infants</label>
                                        <select name="passInfants" class="form-control form-control-sm">
                                            <option>Select</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <small id="infants" class="form-text text-muted">(0-23 months)</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emailID">Email</label>
                                <input type="email" class="form-control" name="email" id="emailID" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone">
                            </div>
                            <div class="text-right"><button type="button" class="btn btn-danger" id="air_btn_submit" onclick="getQuote()">Get Quote</button></div>
                        </form>
                    </div>
                    <!-- /Air Ticket Quote -->

                    <!-- Tour Quote -->
                    <div class="col-md-4 quote-wrapper">
                        <h3 class="row quote-heading">Quick Quote - Tours</h3>
                        <form id="tourQuoteForm">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label>Select Package</label>
                                    <select name="tourPackage" class="form-control form-control-sm">
                                        <option>Select</option>
                                        @foreach ($allPromotions as $promoKey => $promo)
                                            <option value="{{$promo->name}}">{{$promo->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="departCity">Departure City</label>
                                <input type="text" class="form-control" id="departCity" name="departCity" placeholder="Departure City">
                            </div>
                            <div class="form-group">
                                <label for="dotFrom">Date of Travel</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>From</label>
                                        <input type="text" class="form-control calendar" id="dotFrom" name="dotFrom" placeholder="From">
                                    </div>
                                    <div class="col-md-6">
                                        <label>To</label>
                                        <input type="text" class="form-control calendar" id="dotTo" name="dotTo" placeholder="To">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Passengers</label><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Adult</label>
                                        <select name="passAdult" class="form-control form-control-sm">
                                            <option>Select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>
                                        <small id="adult" class="form-text text-muted">(12+ years)</small>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Children</label>
                                        <select name="passChild" class="form-control form-control-sm">
                                            <option>Select</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>
                                        <small id="children" class="form-text text-muted">(2-11 years)</small>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Infants</label>
                                        <select name="passInfants" class="form-control form-control-sm">
                                            <option>Select</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <small id="infants" class="form-text text-muted">(0-23 months)</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emailID">Email</label>
                                <input type="email" class="form-control" name="email" id="emailID" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone">
                            </div>
                            <div class="form-group">
                                <label>Do you need airtickets as well?</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="needAirTicket" id="needAirTicketYes" value="1" checked="checked"> Yes
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="needAirTicket" id="needAirTicketNo" value="0"> No
                                    </label>
                                </div>
                            </div>
                            <div class="text-right"><button type="button" class="btn btn-danger" id="tour_btn_submit" onclick="getTourQuote()">Get Quote</button></div>
                        </form>
                    </div>
                    <!-- /Tour Quote -->

                    <!-- Insurance Quote -->
                    <div class="col-md-4 quote-wrapper">
                        <h3 class="row quote-heading">Quick Quote - Insurance</h3>
                        <form id="insuranceQuoteForm">
                            <div class="form-group">
                                <label for="travelersCount">Number of Travelers</label>
                                <input type="text" class="form-control" id="travelersCount" name="travelersCount" placeholder="Number of Travelers">
                            </div>
                            <div class="form-group">
                                <label for="traveler1">Traveler 1</label>
                                <input type="text" class="form-control" id="traveler1" name="traveler1"  placeholder="Traveller 1">
                            </div>
                            <div class="form-group">
                                <label for="age1">Age</label>
                                <input type="text" class="form-control" id="age1" name="age1" placeholder="Age">
                            </div>
                            <div class="form-group" id="returnDate">
                                <label for="traveler1">Insurance Starte Date</label>
                                <input type="text" class="form-control calendar" id="insuranceDt1" name="traveler1" placeholder="Insurance Starte Date">
                            </div>
                            <div class="form-group" id="returnDate">
                                <label for="noOfDays1">No. of Days Insurance needed for</label>
                                <input type="text" class="form-control" id="noOfDays1" name="noOfDays1" placeholder="No. of Days Insurance needed for">
                            </div>
                            <hr />
                            <div class="form-group">
                                <label for="traveler2">Traveler 2</label>
                                <input type="text" class="form-control" id="traveler2" name="traveler2"  placeholder="Traveller 2">
                            </div>
                            <div class="form-group">
                                <label for="age2">Age</label>
                                <input type="text" class="form-control" id="age2" name="age2" placeholder="Age">
                            </div>
                            <div class="form-group" id="returnDate">
                                <label for="insuranceDt2">Insurance Starte Date</label>
                                <input type="text" class="form-control calendar" id="insuranceDt2" name="insuranceDt2" placeholder="Insurance Starte Date">
                            </div>
                            <div class="form-group" id="returnDate">
                                <label for="noOfDays2">No. of Days Insurance needed for</label>
                                <input type="text" class="form-control" id="noOfDays2" name="noOfDays2" placeholder="No. of Days Insurance needed for">
                            </div>

                            <div class="form-group">
                                <label for="emailID">Email</label>
                                <input type="email" class="form-control" name="email" id="emailID" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone">
                            </div>
                            <div class="text-right"><button type="button" class="btn btn-danger" onclick="getInsuranceQuote()">Get Quote</button></div>
                        </form>
                    </div>
                    <!-- /Insurance Quote -->
                    
               </div>
            </div>

            <div class="row_1">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="section-heading">Our Services</h3>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                                <a href="#" class="thumbnail">
                                    <img src="{{ URL::asset('resources/assets/img/products/air_tickets.jpg') }}" alt="">

                                    <div class="caption">
                                        <h4>Air Tickets</h4>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                                <a href="#" class="thumbnail">
                                    <img class="img-responsive" src="{{ URL::asset('resources/assets/img/products/tour_packages.jpg') }}" alt="">

                                    <div class="caption">
                                        <h4>Tour Packages</h4>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                                <a href="#" class="thumbnail">
                                    <img src="{{ URL::asset('resources/assets/img/products/insurance.jpg') }}" alt="">

                                    <div class="caption">
                                        <h4>Insurance</h4>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                                <a href="#" class="thumbnail">
                                    <img src="{{ URL::asset('resources/assets/img/products/hotels.jpg') }}" alt="">

                                    <div class="caption">
                                        <h4>Hotels</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row_1">
                <div class="container">

                @foreach ($promotions as $promoKey => $promo)
                    <h3 class="section-heading">{{$promoKey}}</h3>
                    <div class="row">
                        @foreach ($promo as $p)
                        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                            <a href="storage/{{ $p->promotion_img }}" data-lightbox="{{$promoKey}}" data-title="Name: {{$p->name}}<br />Description: {{$p->description}} <br /><b>Price: </b>{{$p->price}}" class="thumbnail">
                                <img src="storage/{{ $p->promotion_img }}" alt="">

                                <div class="caption">
                                    <h4>{{$p->name}}</h4>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                @endforeach

                </div>
            </div>
        </div>

        <footer class="border2">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="privacy">© 2017 Desiflight | <a class="txt-1" href="#"> Privacy policy</a>&nbsp;</div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery library (served from Google) -->
        <script src="{{ URL::asset('public/js/jquery-2.1.4.js') }}"></script>
        <!-- Bootstrap Javascript file -->
        <script src="{{ URL::asset('public/lib/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- bxSlider Javascript file -->
        <script src="{{ URL::asset('public/lib/bxslider/jquery.bxslider.min.js') }}"></script>
        <!-- bxSlider CSS file -->
        <link href="{{ URL::asset('public/lib/bxslider/jquery.bxslider.css') }}" rel="stylesheet" />

        <!-- Lightbox2 -->
        <script type="text/javascript" src="{{ URL::asset('public/lib/lightbox2/js/lightbox.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('public/lib/daterangepicker/moment.min.js') }}"></script>
        <!-- Include Date Range Picker -->
        <script type="text/javascript" src="{{ URL::asset('public/lib/daterangepicker/daterangepicker.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/lib/daterangepicker/daterangepicker.css') }}" />   

        <script src="{{ URL::asset('public/js/jquery.matchHeight.js') }}"></script>
        <script src="{{ URL::asset('public/js/home.js') }}"></script>
    </body>
</html>
