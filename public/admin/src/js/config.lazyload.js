// lazyload config

angular.module('app')
    /**
   * jQuery plugin config use ui-jq directive , config the js and css files that required
   * key: function name of the jQuery plugin
   * value: array of the css js file located
   */
  .constant('JQ_CONFIG', {
      easyPieChart:   ['public/admin/src/vendor/jquery/charts/easypiechart/jquery.easy-pie-chart.js'],
      sparkline:      ['public/admin/src/vendor/jquery/charts/sparkline/jquery.sparkline.min.js'],
      plot:           ['public/admin/src/vendor/jquery/charts/flot/jquery.flot.min.js', 
                          'public/admin/src/vendor/jquery/charts/flot/jquery.flot.resize.js',
                          'public/admin/src/vendor/jquery/charts/flot/jquery.flot.tooltip.min.js',
                          'public/admin/src/vendor/jquery/charts/flot/jquery.flot.spline.js',
                          'public/admin/src/vendor/jquery/charts/flot/jquery.flot.orderBars.js',
                          'public/admin/src/vendor/jquery/charts/flot/jquery.flot.pie.min.js'],
      slimScroll:     ['public/admin/src/vendor/jquery/slimscroll/jquery.slimscroll.min.js'],
      sortable:       ['public/admin/src/vendor/jquery/sortable/jquery.sortable.js'],
      nestable:       ['public/admin/src/vendor/jquery/nestable/jquery.nestable.js',
                          'public/admin/src/vendor/jquery/nestable/nestable.css'],
      filestyle:      ['public/admin/src/vendor/jquery/file/bootstrap-filestyle.min.js'],
      slider:         ['public/admin/src/vendor/jquery/slider/bootstrap-slider.js',
                          'public/admin/src/vendor/jquery/slider/slider.css'],
      chosen:         ['public/admin/src/vendor/jquery/chosen/chosen.jquery.min.js',
                          'public/admin/src/vendor/jquery/chosen/chosen.css'],
      TouchSpin:      ['public/admin/src/vendor/jquery/spinner/jquery.bootstrap-touchspin.min.js',
                          'public/admin/src/vendor/jquery/spinner/jquery.bootstrap-touchspin.css'],
      wysiwyg:        ['public/admin/src/vendor/jquery/wysiwyg/bootstrap-wysiwyg.js',
                          'public/admin/src/vendor/jquery/wysiwyg/jquery.hotkeys.js'],
      dataTable:      ['public/admin/src/vendor/jquery/datatables/jquery.dataTables.min.js',
                          'public/admin/src/vendor/jquery/datatables/dataTables.bootstrap.js',
                          'public/admin/src/vendor/jquery/datatables/dataTables.bootstrap.css'],
      vectorMap:      ['public/admin/src/vendor/jquery/jvectormap/jquery-jvectormap.min.js', 
                          'public/admin/src/vendor/jquery/jvectormap/jquery-jvectormap-world-mill-en.js',
                          'public/admin/src/vendor/jquery/jvectormap/jquery-jvectormap-us-aea-en.js',
                          'public/admin/src/vendor/jquery/jvectormap/jquery-jvectormap.css'],
      footable:       ['public/admin/src/vendor/jquery/footable/footable.all.min.js',
                          'public/admin/src/vendor/jquery/footable/footable.core.css']
      }
  )
  // oclazyload config
  .config(['$ocLazyLoadProvider', function($ocLazyLoadProvider) {
      // We configure ocLazyLoad to use the lib script.js as the async loader
      $ocLazyLoadProvider.config({
          debug:  false,
          events: true,
          modules: [
              {
                  name: 'ngGrid',
                  files: [
                      'public/admin/src/vendor/modules/ng-grid/ng-grid.min.js',
                      'public/admin/src/vendor/modules/ng-grid/ng-grid.min.css',
                      'public/admin/src/vendor/modules/ng-grid/theme.css'
                  ]
              },
              {
                  name: 'ui.select',
                  files: [
                      'public/admin/src/vendor/modules/angular-ui-select/select.min.js',
                      'public/admin/src/vendor/modules/angular-ui-select/select.min.css'
                  ]
              },
              {
                  name:'angularFileUpload',
                  files: [
                    'public/admin/src/vendor/modules/angular-file-upload/angular-file-upload.min.js'
                  ]
              },
              {
                  name:'ui.calendar',
                  files: ['public/admin/src/vendor/modules/angular-ui-calendar/calendar.js']
              },
              {
                  name: 'ngImgCrop',
                  files: [
                      'public/admin/src/vendor/modules/ngImgCrop/ng-img-crop.js',
                      'public/admin/src/vendor/modules/ngImgCrop/ng-img-crop.css'
                  ]
              },
              {
                  name: 'angularBootstrapNavTree',
                  files: [
                      'public/admin/src/vendor/modules/angular-bootstrap-nav-tree/abn_tree_directive.js',
                      'public/admin/src/vendor/modules/angular-bootstrap-nav-tree/abn_tree.css'
                  ]
              },
              {
                  name: 'toaster',
                  files: [
                      'public/admin/src/vendor/modules/angularjs-toaster/toaster.js',
                      'public/admin/src/vendor/modules/angularjs-toaster/toaster.css'
                  ]
              },
              {
                  name: 'textAngular',
                  files: [
                      'public/admin/src/vendor/modules/textAngular/textAngular-sanitize.min.js',
                      'public/admin/src/vendor/modules/textAngular/textAngular.min.js'
                  ]
              },
              {
                  name: 'vr.directives.slider',
                  files: [
                      'public/admin/src/vendor/modules/angular-slider/angular-slider.min.js',
                      'public/admin/src/vendor/modules/angular-slider/angular-slider.css'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular',
                  files: [
                      'public/admin/src/vendor/modules/videogular/videogular.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.controls',
                  files: [
                      'public/admin/src/vendor/modules/videogular/plugins/controls.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.buffering',
                  files: [
                      'public/admin/src/vendor/modules/videogular/plugins/buffering.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.overlayplay',
                  files: [
                      'public/admin/src/vendor/modules/videogular/plugins/overlay-play.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.poster',
                  files: [
                      'public/admin/src/vendor/modules/videogular/plugins/poster.min.js'
                  ]
              },
              {
                  name: 'com.2fdevs.videogular.plugins.imaads',
                  files: [
                      'public/admin/src/vendor/modules/videogular/plugins/ima-ads.min.js'
                  ]
              },
              {
                  name: 'confirmModal',
                  files: [
                      'public/admin/src/js/controllers/ConfirmModalController.js'
                  ]
              }
          ]
      });
  }])
;