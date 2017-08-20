app.factory('UserService', ['$http', 'APP', function ($http, APP) {
	return function(authToken){
		var resource = $http({
				method:'GET',
				dataType: 'json',
				url: APP.API_URL + 'user',
				headers: {
					'Authorization': 'Bearer ' + authToken
				}
			}).success(function(data){
				return data;
			}).error(function(err){
				return err;
			});

		return resource;
	}
}]);