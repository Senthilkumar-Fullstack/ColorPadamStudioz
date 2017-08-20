'use strict';

/**
 * Config for the router
 */
angular.module('app')
    .run(
        ['$rootScope', '$state', '$stateParams', '$cookieStore',
            function($rootScope, $state, $stateParams, $cookieStore) {
                $rootScope.$state = $state;
                $rootScope.$stateParams = $stateParams;
                $rootScope.$on('$stateChangeStart', function(e, toState, toParams, fromState, fromParams) {
                    $rootScope.title = toState.title;
                    if (toState.authenticate) {
                        console.log(true);
                        if (!$cookieStore.get('_dfu') || $cookieStore.get('_dfu') === undefined) {
                            e.preventDefault(); // do not remove
                            $state.go('access.signin');
                        }
                    } else {
                        if ($cookieStore.get('_dfu')) {
                            e.preventDefault(); // do not remove this                            
                            $state.go('app.dashboard');
                        }
                    }
                });
            }
        ]
    )
    .config(
        ['$stateProvider', '$urlRouterProvider', 'APP',
            function($stateProvider, $urlRouterProvider, APP) {
                $urlRouterProvider
                    .otherwise('/access/signin');
                $stateProvider
                    .state('app', {
                        abstract: true,
                        url: '/app',
                        templateUrl: APP.TMPL_URL + 'tpl/app.html',
                        resolve: {
                            deps: ['$ocLazyLoad',
                                function($ocLazyLoad) {
                                    return $ocLazyLoad.load(['ngGrid']);
                                }
                            ]
                        },
                    })
                    .state('app.dashboard', {
                        title: 'Home',
                        url: '/dashboard',
                        templateUrl: APP.TMPL_URL + 'tpl/app_dashboard.html',
                        resolve: {
                            deps: ['$ocLazyLoad',
                                function($ocLazyLoad) {
                                    return $ocLazyLoad.load([APP.TMPL_URL + 'js/controllers/chart.js']);
                                }
                            ]
                        },
                        authenticate: true
                    })
                    .state('app.profile', {
                        title: 'Profile',
                        url: '/profile',
                        templateUrl: APP.TMPL_URL + 'tpl/app_profile.html',
                        controller: 'UserController',
                        resolve: {
                            deps: ['$ocLazyLoad',
                                function($ocLazyLoad) {
                                    return $ocLazyLoad.load([APP.TMPL_URL + 'js/controllers/userController.js', APP.TMPL_URL + 'js/services/userService.js']);
                                }
                            ]
                        },
                        authenticate: true
                    })
                    .state('app.promotion-categories', {
                        title: 'Categories',
                        url: '/promotion-categories',
                        templateUrl: APP.TMPL_URL + 'tpl/app_promotion_categories.html',
                        controller: 'PromotionCategoriesController',
                        resolve: {
                            deps: ['$ocLazyLoad',
                                function($ocLazyLoad) {
                                    return $ocLazyLoad.load([APP.TMPL_URL + 'js/controllers/promotionCategoriesController.js', APP.TMPL_URL + 'js/services/promotionCategoriesService.js']);
                                }
                            ]
                        },
                        authenticate: true
                    })
                    .state('app.promotions', {
                        title: 'Promotions',
                        url: '/promotions',
                        template: '<div class="fade-in-up" ui-view></div>',
                        resolve: {
                            deps: ['$ocLazyLoad',
                                function($ocLazyLoad) {
                                    return $ocLazyLoad.load(['ngGrid', 'angularFileUpload', APP.TMPL_URL + 'js/controllers/promotionsController.js', APP.TMPL_URL + 'js/services/promotionsService.js', APP.TMPL_URL + 'js/services/promotionCategoriesService.js']);
                                }
                            ]
                        },
                        authenticate: true
                    })
                    .state('app.promotions.view', {
                        title: 'Promotions View',
                        url: '/view',
                        templateUrl: APP.TMPL_URL + 'tpl/app_promotions.html',
                        controller: 'PromotionsController',
                        resolve: {
                            myService: function(ResolveService) {
                                var authToken = localStorage.getItem('auth'),
                                    categories = ResolveService.categories(authToken).get();

                                console.log(categories);
                                categories.then(function(result) {
                                    return result.data;
                                });

                                return categories;
                            }
                        },
                        authenticate: true
                    })
                    .state('app.promotions.create', {
                        title: 'Promotion Create',
                        url: '/create',
                        templateUrl: APP.TMPL_URL + 'tpl/app_promotions_create.html',
                        controller: 'PromotionsCreateController',
                        authenticate: true
                    })
                    .state('app.promotions.edit', {
                        title: 'Promotion Edit',
                        url: '/edit/{promotion_id}',
                        templateUrl: APP.TMPL_URL + 'tpl/app_promotions_edit.html',
                        controller: 'PromotionsEditController',
                        resolve: {
                            myService: function($stateParams, ResolveService) {

                                var authToken = localStorage.getItem('auth'),
                                    promotion_id = $stateParams.promotion_id,
                                    promotion = ResolveService.getByID(authToken, promotion_id);

                                var myData;
                                promotion.success(function(data) {
                                    if (data.data) {
                                        data.data['displayImg'] = APP.STORAGE_URL + data.data.promotion_img;

                                        myData = data.data;
                                    } else {
                                        myData = data;
                                    }
                                }).error(function(err) {
                                    myData = err;
                                }).then(function(result) {
                                    return result.data;
                                });

                                return promotion;
                            }
                        },
                        authenticate: true
                    })
                    .state('access', {
                        url: '/access',
                        template: '<div ui-view class="fade-in-right-big smooth"></div>'
                    })
                    .state('access.signin', {
                        title: 'Login',
                        url: '/signin',
                        templateUrl: APP.TMPL_URL + 'tpl/page_signin.html',
                        resolve: {
                            deps: ['uiLoad',
                                function(uiLoad) {
                                    return uiLoad.load([APP.TMPL_URL + 'js/controllers/signin.js']);
                                }
                            ]
                        }
                    })
                    .state('access.signup', {
                        url: '/signup',
                        templateUrl: 'tpl/page_signup.html',
                        resolve: {
                            deps: ['uiLoad',
                                function(uiLoad) {
                                    return uiLoad.load([APP.TMPL_URL + 'js/controllers/signup.js']);
                                }
                            ]
                        }
                    })
                    .state('access.forgotpwd', {
                        url: '/forgotpwd',
                        templateUrl: APP.TMPL_URL + 'tpl/page_forgotpwd.html'
                    })
                    .state('access.404', {
                        url: '/404',
                        templateUrl: APP.TMPL_URL + 'tpl/page_404.html'
                    })
            }
        ]
    );