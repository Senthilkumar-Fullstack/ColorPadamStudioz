'use strict';

/* Controllers */

angular.module('app')
    .controller('AppCtrl', ['$rootScope', '$scope', '$http', '$cookieStore', '$translate', '$localStorage', '$window', '$state', '$modal', 'APP',
        function($rootScope, $scope, $http, $cookieStore, $translate, $localStorage, $window, $state, $modal, APP) {
            $scope.APP = APP;
            // add 'ie' classes to html
            var isIE = !!navigator.userAgent.match(/MSIE/i);
            isIE && angular.element($window.document.body).addClass('ie');
            isSmartDevice($window) && angular.element($window.document.body).addClass('smart');

            // config
            $scope.app = {
                name: '1ClickStudios',
                version: '1.0.0',
                // for chart colors
                color: {
                    primary: '#7266ba',
                    info: '#23b7e5',
                    success: '#27c24c',
                    warning: '#fad733',
                    danger: '#f05050',
                    light: '#e8eff0',
                    dark: '#3a3f51',
                    black: '#1c2b36'
                },
                settings: {
                    themeID: 1,
                    navbarHeaderColor: 'bg-black',
                    navbarCollapseColor: 'bg-white-only',
                    asideColor: 'bg-black',
                    headerFixed: true,
                    asideFixed: false,
                    asideFolded: false,
                    asideDock: false,
                    container: false
                }
            }

            // save settings to local storage
            if (angular.isDefined($localStorage.settings)) {
                $scope.app.settings = $localStorage.settings;
            } else {
                $localStorage.settings = $scope.app.settings;
            }
            $scope.$watch('app.settings', function() {
                if ($scope.app.settings.asideDock && $scope.app.settings.asideFixed) {
                    // aside dock and fixed must set the header fixed.
                    $scope.app.settings.headerFixed = true;
                }
                // save to local storage
                $localStorage.settings = $scope.app.settings;
            }, true);

            // angular translate
            $scope.lang = { isopen: false };
            $scope.langs = { en: 'English', de_DE: 'German', it_IT: 'Italian' };
            $scope.selectLang = $scope.langs[$translate.proposedLanguage()] || "English";
            $scope.setLang = function(langKey, $event) {
                // set the current lang
                $scope.selectLang = $scope.langs[langKey];
                // You can change the language during runtime
                $translate.use(langKey);
                $scope.lang.isopen = !$scope.lang.isopen;
            };

            function isSmartDevice($window) {
                // Adapted from http://www.detectmobilebrowsers.com
                var ua = $window['navigator']['userAgent'] || $window['navigator']['vendor'] || $window['opera'];
                // Checks for iOs, Android, Blackberry, Opera Mini, and Windows mobile devices
                return (/iPhone|iPod|iPad|Silk|Android|BlackBerry|Opera Mini|IEMobile/).test(ua);
            }

            /**
             * Confirm Logout
             */
            $scope.confirmLogout = function() {
                var confirmModal = $scope.openModal({
                    size: 'sm',
                    message: 'Are your sure to logout?',
                    params: {

                    }
                });

                confirmModal.result.then(function(params) {
                    $scope.logout();
                }, function() {
                    console.log('Logout cancelled!');
                });
            };


            /**
             * Logout
             * @return to signin view
             */
            $scope.logout = function() {
                console.log($cookieStore.get('_dfu'));
                var auth = $cookieStore.get('_dfu');
                $http({
                    method: 'GET',
                    url: APP.API_URL + 'logout',
                    headers: {
                        'Authorization': 'Bearer ' + auth
                    }
                }).then(function(response) {
                    console.log(response.data.data);
                    localStorage.removeItem('u');
                    $cookieStore.remove('_dfu');
                    $state.go('access.signin');
                }, function(x) {
                    localStorage.removeItem('u');
                    $cookieStore.remove('_dfu');
                    $state.go('access.signin');
                });
            };

            /**
             * Open Modal
             */
            $scope.openModal = function(options) {
                $scope.options = options;
                $scope.message = options.message;
                $scope.params = options.params;
                var modalInstance = $modal.open({
                    templateUrl: 'logoutConfirmModal.html',
                    controller: 'ConfirmModalInstanceController',
                    size: options.size,
                    resolve: {
                        options: function() {
                            return $scope.options;
                        }
                    }
                });

                return modalInstance;
            };

        }
    ]);