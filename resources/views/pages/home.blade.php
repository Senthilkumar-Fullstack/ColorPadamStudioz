@extends('layouts.default')
@section('content')        
    <section id="home">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme" id="home-slider">
                        <img class="owl-lazy" data-src="{{ URL::asset('resources/assets/dist/img/slider/slide1.jpg') }}" alt="">
                        <img class="owl-lazy" data-src="{{ URL::asset('resources/assets/dist/img/slider/slide2.jpg') }}" alt="">
                        <img class="owl-lazy" data-src="{{ URL::asset('resources/assets/dist/img/slider/slide3.jpg') }}" alt="">
                        <img class="owl-lazy" data-src="{{ URL::asset('resources/assets/dist/img/slider/slide4.jpg') }}" alt="">
                        <img class="owl-lazy" data-src="{{ URL::asset('resources/assets/dist/img/slider/slide5.jpg') }}" alt="">
                        <img class="owl-lazy" data-src="{{ URL::asset('resources/assets/dist/img/slider/slide6.jpg') }}" alt="">
                        <img class="owl-lazy" data-src="{{ URL::asset('resources/assets/dist/img/slider/slide7.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section id="about">
            <div class="page-header">
                <h1>About <small>Us</small></h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p>We at 1clickstudios help you in freezing that moment!</p>

                    <p>A wedding is one of the most auspicious and special day in a person's life. And photographing that day, to cherish the memories years after is something that any couple would expect in excellence, cause 'Hey, you can't have re-takes!'</p>

                    <p>We, at 1clickstudios have an expertise in this field of photography to deliver optimum quality pictures, in both content and creativity, to our clients.</p>

                    <p>A brainchild of 2 photographers, 1clickstudios has a miraculous ability to shoot pictures which speak for themselves. We capture the love, emotion and passion of your most awaited day and craft it into a beautiful story by anticipating moments by being quiet, unobtrusive and invisible as a photographer. We talk to the couple beforehand to understand what they have in mind for the big day! Relational by nature, we deeply value the life-long friendships we develop with our couples.</p>

                    <p>Please feel free to give us a call or an e-mail and we would get back right at you.</p>
                </div>
            </div>
        </section>

        <section id="contact">
        	<div class="page-header">
                <h1>Reach <small>Us</small></h1>
            </div>
		    <div class="row">
		        <div class="col-md-8">
		            <div class="well well-sm">
		                <form>
		                    <div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label for="name">
		                                    Name</label>
		                                <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
		                            </div>
		                            <div class="form-group">
		                                <label for="email">
		                                    Email Address</label>
		                                <div class="input-group">
		                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
		                                    </span>
		                                    <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" />
		                                </div>
		                            </div>
		                            <div class="form-group">
		                                <label for="subject">
		                                    Subject</label>
		                                <select id="subject" name="subject" class="form-control" required="required">
		                                    <option value="na" selected="">Choose One</option>
		                                    <option value="service">General Customer Service</option>
		                                    <option value="suggestions">Suggestions</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label for="name">
		                                    Message</label>
		                                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
		                            </div>
		                        </div>
		                        <div class="col-md-12">
		                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
		                                Send Message</button>
		                        </div>
		                    </div>
		                </form>
		            </div>
		        </div>
		        <div class="col-md-4">
		            <form>
		                <legend><span class="glyphicon glyphicon-globe"></span> Contact</legend>
		                <address>
		                	<span class="glyphicon glyphicon-map-marker"></span>
		                    <strong>Meet Us</strong>
		                    <br> Lakshmipuram, Chrompet, Chennai
		                    <br> Tamil Nadu, India 600 044
		                </address>
		                <address>
		                    <span class="glyphicon glyphicon-phone-alt"></span>
		                    <strong>Call Us</strong><br>
		                    <abbr title="Kailash" style="width: 51px;">
		                        Kailash:</abbr>
		                    + (91) 9500546106
		                    <br>
		                    <abbr title="Siva" style="width: 51px;">
		                        Siva:</abbr>
		                    + (91) 9176676758 
		                </address>
		                <address>
		                	<span class="glyphicon glyphicon-envelope"></span>
		                    <strong>Send Message</strong>
		                    <br>
		                    <a href="mailto:kailas.ptr@gmail.com">kailas.ptr@gmail.com</a>
		                    <br>
		                    <a href="mailto:sivananthan2001@gmail.com">sivananthan2001@gmail.com</a>
		                </address>
		            </form>
		        </div>
		    </div>
		</section>
@stop