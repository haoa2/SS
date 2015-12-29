app.controller("main_controller", function($scope, $http) {
	$scope.secrets = [];

	$scope.get_all_secrets = function() {
        $http({
            method: 'get',
            url: '/php/controller/secrets.php?action=all'
            }).then(function successCallback(response) {
                $scope.secrets = response.data;
            }, function errorCallback(response) {
                console.log(response);
            });
	};
    $scope.get_secrets = function() {
        var params = {category: $scope.cat_f};
        console.log("Params: ", params);
         $.post("/php/controller/secrets.php?action=get", params).always(function(data){
            console.log(data);
            $scope.secrets = data;
        });
	};

	$scope.new_post = function() {
		var post = {content: $scope.content, category: $scope.cat};
        $.post("/php/controller/secrets.php?action=new", post).always(function(data){
            console.log(data);
            $scope.get_all_secrets();
        });
	};
});