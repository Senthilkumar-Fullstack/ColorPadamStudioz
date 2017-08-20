app.controller('PromotionsController', ['myService', '$rootScope', '$scope', '$http', '$modal', 'PromotionsService', 'PromotionCategoriesService',
  function(myService, $rootScope, $scope, $http, $modal, PromotionsService, PromotionCategoriesService){

    var authToken = localStorage.getItem('auth');

    /**
     * Get Categories
     */
    $scope.categories = myService.data.data;
    
    /**
     * Get Promotions
     * 
     */
    $scope.getPromotions = function() {
        $scope.promotions = [];
        $scope.loaderPercent = 5;
        $scope.isLoading = true;

        var promotions = PromotionsService.get(authToken);

        promotions.success(function(data){
            if (data.data) {
            	$scope.promotions = data.data;
                $scope.isLoading = false;          	
            }            
        }).error(function(err){
            console.log(err);
            $scope.isLoading = false;
        }).then(function(){
            
        });

    };

    $scope.getPromotions();    

    /**
     * Add Promtion
     */
    $scope.addPromotion = function() {
    	var inputData = $scope.form;
    	if ($scope.form) {

            var promotion = PromotionsService.create(authToken, inputData);

            promotion.success(function(data){
                $scope.loaderPercent = 50;
                if (data.data) {
                    $scope.getPromotions();
                }
                
            }).error(function(err){
                console.log(err);
            }).then(function(){
                console.log('complete');
            });
    	}
    };

    /**
     * Get Promotion by ID
     */
    $scope.getPromotionById = function(id) {
        
        var promotion = PromotionsService.getByID(authToken, id);

        promotion.success(function(data){
            $scope.form = data.data;            
        }).error(function(err){
            console.log(err);
        }).then(function(){
            
        });
    };

    

    /**
     * Delete Promotion Confirmation
     */
    $scope.deletePromotionConfirm = function(id) {
        var confirmModal = $scope.openModal({
            size: 'sm',
            message: 'Are your sure to delete this promotion?',
            params: {
                id: id
            }
        });

        confirmModal.result.then(function(params){
            $scope.deletePromotion(id);
        }, function() {
            console.log('Delete cancelled!');
        });

    };

    /**
     * Delete Promotion
     */
    $scope.deletePromotion = function(id) {
        var promotion = PromotionsService.delete(authToken, id);

        promotion.success(function(data){
            $scope.getPromotions();
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


app.controller('PromotionsCreateController', ['$scope', '$http', '$state', '$modal', 'FileUploader', 'PromotionsService', 'PromotionCategoriesService',
  function($scope, $http, $state, $modal, FileUploader, PromotionsService, PromotionCategoriesService){

    var authToken = localStorage.getItem('auth');

    $scope.img = {};

    /**
     * Create Promotion
     * @return to view page on success
     */
    $scope.createPromotion = function() {
        var inputData = $scope.form;
        inputData.img = $scope.files;

        if ($scope.form) {

            var promotion = PromotionsService.create(authToken, inputData);

            promotion.success(function(data){
                if (data.data) {
                    $state.go('app.promotions.view');
                }
                
            }).error(function(err){
                console.log(err);
            }).then(function(){
                
            });
        }
    };

    /**
     * Get Categories
     */
    $scope.categories = [];
    $scope.getCategories = function() {

        var categories = PromotionCategoriesService.get(authToken);

        categories.success(function(data){
            if (data.data) {
                $scope.categories = data.data;          
            }            
        }).error(function(err){
            console.log(err);
            $scope.categories = [];
        }).then(function(){
            
        });

    };

    $scope.getCategories();

    /**
     * File Reader
     */
    $scope.files = [];
    $scope.uploadedFile = function(element) {
        $scope.currentFile = element.files[0];
        var reader = new FileReader();

        reader.onload = function(event) {
            $scope.image_source = event.target.result;
            $scope.$apply(function($scope) {
                $scope.files = element.files;
                console.log($scope.files);
            });
        }
        reader.readAsDataURL(element.files[0]);
    };

}]);

app.controller('PromotionsEditController', ['$scope', '$http', '$state', '$modal', 'APP', 'PromotionsService', 'PromotionCategoriesService', 'myService',
  function($scope, $http, $state, $modal, APP, PromotionsService, PromotionCategoriesService, myService){

    var authToken = localStorage.getItem('auth'),
        promotion_id = $state.params.promotion_id;
    $scope.formModified = false;

    $scope.form = myService.data.data;

    /**
     * Get Categories
     */
    $scope.categories = [];
    $scope.getCategories = function() {

        var categories = PromotionCategoriesService.get(authToken);

        categories.success(function(data){
            if (data.data) {
                $scope.categories = data.data;          
            }            
        }).error(function(err){
            console.log(err);
            $scope.categories = [];
        }).then(function(){
            
        });

    };

    $scope.getCategories();

    /**
     * Update Promotion by ID
     */
    $scope.updatePromotion = function() {
        var inputData = {
            name: $scope.form.name,
            description: $scope.form.description,
            price: $scope.form.price,
            img: $scope.files,
            category_id: $scope.form.category_id,
            promotion_order: $scope.form.promotion_order,
            is_active: $scope.form.is_active
        };
        var id = $scope.form.promotion_id;
        //inputData.img = $scope.files;

        var promotion = PromotionsService.updateByID(authToken, id, inputData);

        promotion.success(function(data){
            if (data.data) {
                //$scope.clearForm();
                $state.go('app.promotions.view');
            }
            
        }).error(function(err){
            console.log(err);
        }).then(function(){
            
        });
    };

    /**
     * File Reader
     */
    $scope.files = [];
    $scope.uploadedFile = function(element) {
        $scope.currentFile = element.files[0];
        var reader = new FileReader();

        reader.onload = function(event) {
            $scope.image_source = event.target.result;
            $scope.$apply(function($scope) {
                $scope.files = element.files;
                $scope.formModified = true;
                console.log($scope.files);
            });
        }
        reader.readAsDataURL(element.files[0]);
    };

    /**
     * Clear form
     */
    $scope.clearForm = function() {
        $scope.form = {};
        $scope.form.is_active = 1;
    };

    /**
     * @param {object}  event
     * @param {boolean} modified
     * @param {object}  formCtrl
     */
    $scope.$on('inputModified.formChanged', function (event, modified, formCtrl) {
        // Process the modified event,
        // use formCtrl.$name to get the form name.
        $scope.formModified = modified;
    });

}]);