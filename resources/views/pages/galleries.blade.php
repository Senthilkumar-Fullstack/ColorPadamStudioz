@extends('layouts.default')
@section('content')
    <div class="page-header">
        	<h1>Galleries</h1>
        </div>

        <div class="page-header">
        	<h3>Events - Baptism</h3>
        </div>

        <div class="row">
        	<div class="col-lg-3 col-sm-4 col-xs-6"><a class="thumbnail img-wrapper" title="Image 1" href="{{ URL::asset('resources/assets/galleries/events/baptism/img1.jpg') }}" data-lightbox="example-set" data-title="Image 1"><img class="img-responsive" src="{{ URL::asset('resources/assets/galleries/events/baptism/img1.jpg') }}" height="350"></a></div>
        	<div class="col-lg-3 col-sm-4 col-xs-6"><a class="thumbnail img-wrapper" title="Image 2" href="{{ URL::asset('resources/assets/galleries/events/baptism/img2.jpg') }}" data-lightbox="example-set" data-title="Image 2"><img class="img-responsive" src="{{ URL::asset('resources/assets/galleries/events/baptism/img2.jpg') }}"></a></div>
        	<div class="col-lg-3 col-sm-4 col-xs-6"><a class="thumbnail img-wrapper" title="Image 1" href="{{ URL::asset('resources/assets/galleries/events/baptism/img3.jpg') }}" data-lightbox="example-set" data-title="Image 1"><img class="img-responsive" src="{{ URL::asset('resources/assets/galleries/events/baptism/img3.jpg') }}" height="350"></a></div>
        	<div class="col-lg-3 col-sm-4 col-xs-6"><a class="thumbnail img-wrapper" title="Image 2" href="{{ URL::asset('resources/assets/galleries/events/baptism/img4.jpg') }}" data-lightbox="example-set" data-title="Image 2"><img class="img-responsive" src="{{ URL::asset('resources/assets/galleries/events/baptism/img4.jpg') }}"></a></div>
        	<div class="col-lg-3 col-sm-4 col-xs-6"><a class="thumbnail img-wrapper" title="Image 1" href="{{ URL::asset('resources/assets/galleries/events/baptism/img5.jpg') }}" data-lightbox="example-set" data-title="Image 1"><img class="img-responsive" src="{{ URL::asset('resources/assets/galleries/events/baptism/img5.jpg') }}" height="350"></a></div>
        	<div class="col-lg-3 col-sm-4 col-xs-6"><a class="thumbnail img-wrapper" title="Image 2" href="{{ URL::asset('resources/assets/galleries/events/baptism/img6.jpg') }}" data-lightbox="example-set" data-title="Image 2"><img class="img-responsive" src="{{ URL::asset('resources/assets/galleries/events/baptism/img6.jpg') }}"></a></div>
        </div>

        <div class="page-header">
        	<h3>Wedding</h3>
        </div>

        <div class="row">
        	<div class="col-lg-3 col-sm-4 col-xs-6"><a class="thumbnail img-wrapper" title="Image 1" href="{{ URL::asset('resources/assets/galleries/wedding/img1.jpg') }}" data-lightbox="example-set" data-title="Image 1"><img class="img-responsive" src="{{ URL::asset('resources/assets/galleries/wedding/img1.jpg') }}" height="350"></a></div>
        	<div class="col-lg-3 col-sm-4 col-xs-6"><a class="thumbnail img-wrapper" title="Image 2" href="{{ URL::asset('resources/assets/galleries/wedding/img2.jpg') }}" data-lightbox="example-set" data-title="Image 2"><img class="img-responsive" src="{{ URL::asset('resources/assets/galleries/wedding/img2.jpg') }}"></a></div>
        </div>

@stop