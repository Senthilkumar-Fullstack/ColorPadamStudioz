<!DOCTYPE html>
<html lang="en" data-ng-app="app">
<head>
  <meta charset="utf-8" />
  <title ng-bind="'Desiflight | ' + title">1ClickStudios | Admin Login</title>
  <link rel="icon" type="image/png" href="{{ URL::asset('resources/assets/img/favicon.png') }}">
  <meta name="description" content="1ClickStudios, A wedding is one of the most auspicious and special day in a person's life. And photographing that day, to cherish the memories years after is something that any couple would expect in excellence, cause 'Hey, you can't have re-takes!'" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{ URL::asset('public/admin/src/css/bootstrap.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('public/admin/src/css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('public/admin/src/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('public/admin/src/css/simple-line-icons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('public/admin/src/css/font.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('public/admin/src/css/app.css') }}" type="text/css" />
</head>
<body ng-controller="AppCtrl">
  <div class="app" id="app" ng-class="{'app-header-fixed':app.settings.headerFixed, 'app-aside-fixed':app.settings.asideFixed, 'app-aside-folded':app.settings.asideFolded, 'app-aside-dock':app.settings.asideDock, 'container':app.settings.container}" ui-view></div>


  <!-- jQuery -->
  <script src="{{ URL::asset('public/admin/src/vendor/jquery/jquery.min.js') }}"></script>

  <!-- Angular -->
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular.js') }}"></script>
  
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-animate/angular-animate.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-cookies/angular-cookies.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-resource/angular-resource.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-sanitize/angular-sanitize.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-touch/angular-touch.js') }}"></script>
<!-- Vendor -->
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-ui-router/angular-ui-router.js') }}"></script> 
  <script src="{{ URL::asset('public/admin/src/vendor/angular/ngstorage/ngStorage.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/vendor/modules/angular-input-modified/angular-input-modified.min.js') }}"></script>

  <!-- bootstrap -->
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-bootstrap/ui-bootstrap-tpls.js') }}"></script>
  <!-- lazyload -->
  <script src="{{ URL::asset('public/admin/src/vendor/angular/oclazyload/ocLazyLoad.js') }}"></script>
  <!-- translate -->
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-translate/angular-translate.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-translate/loader-static-files.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-translate/storage-cookie.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/vendor/angular/angular-translate/storage-local.js') }}"></script>

  <!-- App -->
  <script src="{{ URL::asset('public/admin/src/js/app.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/config.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/config.lazyload.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/config.router.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/services/loadingInterceptor.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/common.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/main.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/services/ui-load.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/filters/fromNow.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/setnganimate.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-butterbar.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-focus.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-fullscreen.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-jq.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-module.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-nav.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-scroll.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-shift.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-toggleclass.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/directives/ui-validate.js') }}"></script>
  <script src="{{ URL::asset('public/admin/src/js/controllers/ConfirmModalController.js') }}"></script>

  <script src="{{ URL::asset('public/admin/src/js/services/resolveServices.js') }}"></script>
  <!-- Lazy loading -->
</body>
</html>