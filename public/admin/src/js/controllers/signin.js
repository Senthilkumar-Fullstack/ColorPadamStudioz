'use strict';

/* Controllers */
// signin controller
app.controller('SigninFormController', ['$scope', '$http', '$state', '$cookieStore', 'APP', function($scope, $http, $state, $cookieStore, APP) {
    $scope.user = {};
    $scope.authError = null;
    $scope.login = function() {
        $scope.authError = null;
        // Try to login
        $http.post(APP.API_URL + 'login', { email: $scope.user.email, password: $scope.user.password })
            .then(function(response) {
                console.log(response.data.data);
                if (!response.data.data) {
                    $scope.authError = response.data.message ? response.data.message : 'Email or Password not right';
                    localStorage.removeItem('u');
                    $cookieStore.remove('_dfu');
                } else {
                    localStorage.setItem('u', response.data.data.email);
                    localStorage.setItem('auth', response.data.data.oauth_token);
                    $cookieStore.put('_dfu', response.data.data.oauth_token);
                    $state.go('app.dashboard', {}, {reload: true});
                }
            }, function(x) {
                $scope.authError = 'Server Error';
            });
    };

    $scope.$watch('access.signin', function(newValue, oldValue, scope) {
        console.log(newValue);
        console.log(oldValue);
        console.log(scope);
    });
}]);