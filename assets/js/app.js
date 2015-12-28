var app = angular.module("SS", []);
app.controller("main_controller", function ($scope, $http) {
    $scope.secrets = [];
    $scope.get_secrets = function () {
        $http({
            method: 'get',
            url: '/php/controller/secrets.php?action=get'
        }).then(function successCallback(response) {
            $scope.secrets = response.data;
        }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });
    };
    $scope.new_post = function () {
        var post = { content: $scope.content, category: $scope.cat };
        $.post("/php/controller/secrets.php?action=new", post).always(function (data) {
            console.log(data);
            $scope.get_secrets();
        });
    };
});
///<reference path='GLOBAL.ts' />
///<reference path='main_controller.ts' /> 
