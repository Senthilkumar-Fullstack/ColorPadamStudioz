app.controller('UserController', ['$scope', '$http', 'UserService',
  function($scope, $http, UserService){

    var authToken = localStorage.getItem('auth');
    var userProfile = UserService(authToken);
    userProfile.success(function(data){
        console.log(data);
    }).error(function(err){
        console.log(err);
    });
}]);
