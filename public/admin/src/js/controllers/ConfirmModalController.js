app.controller('ConfirmModalInstanceController', ['$scope', '$modalInstance', 'options',  function($scope, $modalInstance, options) {
    $scope.params = options.params;
    $scope.message = options.message;

    $scope.ok = function() {
        $modalInstance.close($scope.params);
    };

    $scope.cancel = function() {
        $modalInstance.dismiss('cancel');
    };
}]);

app.controller('ConfirmModalController', ['$scope', '$modal', '$log', function($scope, $modal, $log) {
    $scope.message = 'Are your sure to delete this category?';
    $scope.open = function(size) {
        var modalInstance = $modal.open({
            templateUrl: 'confirmModal.html',
            controller: 'ConfirmModalInstanceController',
            size: size,
            resolve: {
                message: function() {
                    return $scope.message;
                }
            }
        });

        modalInstance.result.then(function(selectedItem) {
            $scope.selected = selectedItem;
        }, function() {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };
}]);