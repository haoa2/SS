app.controller("main_controller", function($scope, $http) {
	$scope.secrets = [];

    $scope.search_in_ss = function() {
        var query = { query: $scope.search };
        console.log(query);
        $.post("/php/controller/search_engine.php", query).always(function(data) {
            console.log(data);
        });
    };

	$scope.get_all_secrets = function() {
        var params = { "limit": 20, "offset": 0 };
        $.post("/php/controller/secrets.php?action=all", params).always(function(data){
            $scope.secrets = JSON.parse(data);
            console.log($scope.secrets);
            $scope.$apply();
            $scope.init();
        });

	};
    $scope.get_secrets = function() {
        var params = {category: $scope.cat_f};
        console.log("Params: ", params);
         $.post("/php/controller/secrets.php?action=get", params).always(function(data){
            console.log(data);
            $scope.secrets = data;
            $scope.init();
        });
	};

	$scope.new_post = function() {
		var post = {content: $("#n_content").val(), category: $("#n_cat").val()};
        $.post("/php/controller/secrets.php?action=new", post).always(function(data){
            console.log(data);
            $scope.get_all_secrets();
        });
	};

    $scope.toggle_like = function(id) {
        var post = {secret_id: id};
        $.post("/php/controller/likes.php?action=new", post).always(function(data){
            console.log(data);
        });
    };
    
    $scope.login = function(){
        var post = {username: $("#username").val(), category: $("#password").val(), action: "log_in"};
        $.post("/php/controller/user.php?action=log_in", post).always(function(data){
            console.log(data);
        });
    };

    $scope.signup = function(){
        var post = {username: $("#username").val(), category: $("#password").val(), action: "new"};
        $.post("/php/controller/user.php?action=new", post).always(function(data){
            console.log(data);
        });
    };
    
    
    
    
    $scope.init = function(){
        var container = document.querySelector('#container');
        var pckry = new Packery( container, {
        // options
        itemSelector: '.item',
        gutter: 10,
        percentPosition: true
        });
    }
});