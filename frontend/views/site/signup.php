<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>






<section class="shopping-cart">
    <!-- .shopping-cart -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Sign Up</li>
                </ol>
            </div>
            <div class="col-md-6 contact-info">
                <div class="contact-form">
                    <?php $form = ActiveForm::begin(['id' => 'commentform', 'options' => ['class' => 'comment-form']]); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="lable">Name <span>*</span></div>
                            <p class="comment-form-author">
                                <?= $form->field($model, 'username')->textInput(['maxlength' => 30, 'class' => 'form-control heigh_47'])->label(false); ?>
                                <input type="hidden" name="SignupForm[home_signup]" value="0">
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="lable">Email <span>*</span></div>
                            <p class="comment-form-email">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => 30, 'class' => 'form-control heigh_47'])->label(false); ?>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="lable">Password <span>*</span></div>
                            <p class="comment-form-comment">
                                <?= $form->field($model, 'password')->passwordInput(['maxlength' => 30, 'class' => 'form-control heigh_47'])->label(false); ?>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="form-submit">
                                <?= Html::submitInput('Signup', ['id' => 'submit', 'class' => 'btn btn-secondary', 'name' => 'signup-button']) ?>
                            </p> 
                        </div>                      
                    </div>                              
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-6 contact-info">
                <br /><br />
                <div class="col-md-12">
                    <div class="contact-bg">                 
                        <h2>Contact Us</h2>
                        <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
                    </div>
                </div>
                <div class="col-sm-3 col-md-6">
                    <div class="contact-bg">                 
                        <h6>Office Address</h6>Urip Sumoharjo 123 Bukir Pasuruan, INA.
                    </div>
                </div>
                <div class="col-sm-3 col-md-6">
                    <div class="contact-bg">                      
                        <h6>Email Address </h6>info@website.com<br>www.website.com                       
                    </div>
                </div>
                <div class="col-sm-3 col-md-6">
                    <div class="contact-bg">                       
                        <h6>Phone Number</h6>1 234 567 890<br>9 876 543 210                       
                    </div>
                </div>
                <div class="col-sm-3 col-md-6">
                    <div class="contact-bg">                        
                        <h6>Time Hourss</h6>
                        Monday to Friday: 10h:00 Am to 7h:00 Pm<br/>
                        Saturday: 10h:00 Am to 4h:00 Pm<br/>
                        Sunday: 12h:00 Am to 4h:00 Pm
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.shopping-cart -->
</section>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO2fJ8DfdyKRIvmxp96MAG6BeNiCX27lQ&callback=initMap"></script>

<script type="text/javascript">
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 11,
            scrollwheel: false,
            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(40.6700, -73.9400), // New York

            // How you would like to style the map. 
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#e9e9e9"}, {"lightness": 17}]}, {"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 20}]}, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}, {"lightness": 17}]}, {"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]}, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 18}]}, {"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 16}]}, {"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]}, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#dedede"}, {"lightness": 21}]}, {"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]}, {"elementType": "labels.text.fill", "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]}, {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]}, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#fefefe"}, {"lightness": 20}]}, {"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]}]
        };

        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.6700, -73.9400),
            map: map,
            title: 'Snazzy!'
        });
    }
</script>








