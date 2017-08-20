app.factory('PromotionsService', ['$http', 'APP', function ($http, APP) {
	return {
		get: function(authToken){
			var resource = $http({
					method:'GET',
					dataType: 'json',
					url: APP.API_URL + 'promotions',
					headers: {
						'Authorization': 'Bearer ' + authToken,
					}
				}).success(function(data){
					return data;
				}).error(function(err){
					return err;
				});

			return resource;
		},

		create: function(authToken, inputData) {
			console.log(inputData);
			var image = inputData.img[0];
			var resource = $http({
					method:'POST',
					url: APP.API_URL + 'promotions',
					processData: false,
			  		transformRequest: function (data) {
				    	var formData = new FormData();
				    	for(var p in data) {    		
				    		
				    		if(p === 'img') {
				    			formData.append(p, data[p][0]);
				    		}else {
				    			formData.append(p, data[p]);
				    		}
				    	}

				    	return formData;  
			  		},  
			  		data: inputData,
					headers: {
						'Authorization': 'Bearer ' + authToken,
						'Content-Type': undefined
					}					
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
					url: APP.API_URL + 'promotions/' + id,
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
					method:'POST',
					url: APP.API_URL + 'promotions/' + id,
					processData: false,
			  		transformRequest: function (data) {
				    	var formData = new FormData();
				    	for(var p in data) {    		
				    		
				    		if(p === 'img') {
				    			formData.append(p, data[p][0]);
				    		}else {
				    			formData.append(p, data[p]);
				    		}
				    	}

				    	console.log(formData);

				    	return formData;  
			  		},  
			  		data: inputData,
					headers: {
						'Authorization': 'Bearer ' + authToken,
						'Content-Type': undefined
					}
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
					url: APP.API_URL + 'promotions/' + id,
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