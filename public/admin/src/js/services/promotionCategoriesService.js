app.factory('PromotionCategoriesService', ['$http', 'APP', function ($http, APP) {
	return {
		get: function(authToken){
			var resource = $http({
					method:'GET',
					dataType: 'json',
					url: APP.API_URL + 'promotion-categories',
					headers: {
						'Authorization': 'Bearer ' + authToken
					}
				}).success(function(data){
					return data;
				}).error(function(err){
					return err;
				});

			return resource;
		},

		create: function(authToken, inputData) {
			var resource = $http({
					method:'POST',
					dataType: 'json',
					url: APP.API_URL + 'promotion-categories',
					headers: {
						'Authorization': 'Bearer ' + authToken
					},
					data: inputData
				}).success(function(data){
					return data;
				}).error(function(err){
					return err;
				});

			return resource;
		},

		getByID: function(authToken, id){
			var resource = $http({
					method:'GET',
					dataType: 'json',
					url: APP.API_URL + 'promotion-categories/' + id,
					headers: {
						'Authorization': 'Bearer ' + authToken
					}
				}).success(function(data){
					return data;
				}).error(function(err){
					return err;
				});

			return resource;
		},

		updateByID: function(authToken, id, inputData){
			var resource = $http({
					method:'PATCH',
					dataType: 'json',
					url: APP.API_URL + 'promotion-categories/' + id,
					headers: {
						'Authorization': 'Bearer ' + authToken
					},
					data: inputData
				}).success(function(data){
					return data;
				}).error(function(err){
					return err;
				});

			return resource;
		},

		delete: function(authToken, id){
			var resource = $http({
					method:'DELETE',
					dataType: 'json',
					url: APP.API_URL + 'promotion-categories/' + id,
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
	};
}]);