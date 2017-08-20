app.controller('PromotionCategoriesController', ['$scope', '$http', '$modal', 'PromotionCategoriesService',
  function($scope, $http, $modal, PromotionCategoriesService){

    var authToken = localStorage.getItem('auth');

    $scope.getCategories = function() {
        $scope.categories = [];
        $scope.isLoading = true;

        var categories = PromotionCategoriesService.get(authToken);

        categories.success(function(data){
            if (data.data) {
            	$scope.categories = data.data;
                $scope.isLoading = false;          	
            }            
        }).error(function(err){
            console.log(err);
            $scope.isLoading = false;
        }).then(function(){
            
        });

    };

    $scope.getCategories();

    /**
     * Add Category
     */
    $scope.addCategory = function() {
    	var inputData = $scope.form;
    	if ($scope.form) {

            var category = PromotionCategoriesService.create(authToken, inputData);

            category.success(function(data){
                if (data.data) {
                    $scope.getCategories();
                }
                
            }).error(function(err){
                console.log(err);
            }).then(function(){
                console.log('complete');
            });
    	}
    };

    /**
     * Get Category by ID
     */
    $scope.getCategoryById = function(id) {
        
        var category = PromotionCategoriesService.getByID(authToken, id);

        category.success(function(data){
            $scope.form = data.data;            
        }).error(function(err){
            console.log(err);
        }).then(function(){
            
        });
    };

    /**
     * Update Category by ID
     */
    $scope.updateCategory = function() {
        var inputData = $scope.form;
        var id = $scope.form.category_id;
        var category = PromotionCategoriesService.updateByID(authToken, id, inputData);

        category.success(function(data){
            $scope.clearForm();
            $scope.getCategories();
        }).error(function(err){
            console.log(err);
        }).then(function(){
            
        });
    };

    /**
     * Delete Category Confirmation
     */
    $scope.deleteCategoryConfirm = function(id) {
        var confirmModal = $scope.openModal({
            size: 'sm',
            message: 'Are your sure to delete this category?',
            params: {
                id: id
            }
        });

        confirmModal.result.then(function(params){
            $scope.deleteCategory(id);
        }, function() {
            console.log('Delete cancelled!');
        });

    };

    /**
     * Delete Category
     */
    $scope.deleteCategory = function(id) {
        var category = PromotionCategoriesService.delete(authToken, id);

        category.success(function(data){
            $scope.getCategories();
        }).error(function(err){
            console.log(err);
        }).then(function(){
            
        });
    }

    /**
     * Clear form
     */
    $scope.clearForm = function() {
        $scope.form = {};
        $scope.form.is_active = 1;
    };

    /**
     * Open Modal
     */
    $scope.openModal = function(options) {
        console.log(options.message);
        $scope.options = options;
        $scope.message = options.message;
        $scope.params = options.params;
        console.log($scope.message);
        var modalInstance = $modal.open({
            templateUrl: 'confirmModal.html',
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
}]);
