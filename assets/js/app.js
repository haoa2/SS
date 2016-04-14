var app = angular.module("SS", []);
$(document).ready(function () {
    var n = $("#nav");
    $.get("/partials/menu.php", function (d) {
        n.html(d);
    });
});
app.controller("main_controller", function ($scope, $http) {
    $scope.secrets = [];
    $scope.search_in_ss = function () {
        var query = { query: $scope.search };
        console.log(query);
        $.post("/php/controller/search_engine.php", query).always(function (data) {
            console.log(data);
        });
    };
    $scope.get_all_secrets = function () {
        var params = { "limit": 20, "offset": 0 };
        $.post("/php/controller/secrets.php?action=all", params).always(function (data) {
            $scope.secrets = JSON.parse(data);
            console.log($scope.secrets);
            $scope.$apply();
            $scope.init();
        });
    };
    $scope.get_secrets = function () {
        var params = { category: $scope.cat_f };
        console.log("Params: ", params);
        $.post("/php/controller/secrets.php?action=get", params).always(function (data) {
            console.log(data);
            $scope.secrets = data;
            $scope.init();
        });
    };
    $scope.new_post = function () {
        var post = { content: $("#n_content").val(), category: $("#n_cat").val() };
        $.post("/php/controller/secrets.php?action=new", post).always(function (data) {
            console.log(data);
            $scope.get_all_secrets();
        });
    };
    $scope.toggle_like = function (id) {
        var post = { secret_id: id };
        $.post("/php/controller/likes.php?action=new", post).always(function (data) {
            console.log(data);
        });
    };
    $scope.toggle_ward = function (id) {
        var post = { secret_id: id };
        $.post("/php/controller/ward.php?action=new", post).always(function (data) {
            console.log(data);
        });
    };
    $scope.login = function () {
        var post = { username: $("#username").val(), category: $("#password").val(), action: "log_in" };
        $.post("/php/controller/user.php?action=log_in", post).always(function (data) {
            console.log(data);
        });
    };
    $scope.signup = function () {
        var post = { username: $("#username").val(), category: $("#password").val(), action: "new" };
        $.post("/php/controller/user.php?action=new", post).always(function (data) {
            console.log(data);
        });
    };
    $scope.init = function () {
        var container = document.querySelector('#container');
        var pckry = new Packery(container, {
            // options
            itemSelector: '.item',
            gutter: 10,
            percentPosition: true
        });
    };
});
function toggle_overlay() { $(".overlay").fadeToggle('slow'); }
function in_overlay() { $(".overlay").fadeIn('slow'); }
function out_overlay() { $(".overlay").fadeOut('slow'); out_all(); }
function toggle_popup() { $(".popup").fadeToggle('slow'); }
function in_popup() { $(".popup").fadeIn('slow'); }
function out_popup() { $(".popup").fadeOut('slow'); }
function toggle_menu() { $("#menu").fadeClass('MenuOn'); }
function in_menu() { $("#menu").addClass('MenuOn'); }
function out_menu() { $("#menu").removeClass('MenuOn'); }
var contents = {
    login: '<input type="text" placeholder="Usuario" id="username"><br><input type="password" placeholder="Contraseña" id="password"><br><input type="button" value="Enviar" onclick="angular_trigger(\'login\')">',
    signup: '<input type="text" placeholder="Usuario" id="username"><br><input type="password" placeholder="Contraseña" id="password"><br><input type="button" value="Enviar" onclick="angular_trigger(\'signup\')">',
    new_secret: ' <input type="text" id="n_content" placeholder="Secret"><input type="text" id="n_cat" placeholder="School"><input type="button" onclick="angular_trigger(\'new_post\')" value="Enviar">'
};
var show = {
    login: function () {
        in_overlay();
        popup_set("Inicio", contents.login);
    },
    signup: function () {
        in_overlay();
        popup_set("Registro", contents.signup);
    },
    new_secret: function () {
        in_overlay();
        popup_set("Nuevo Zelda", contents.new_secret);
    },
    menu: function () {
        in_overlay();
        in_menu();
    }
};
function popup_set(title, content) {
    $("#p_title").text(title);
    $("#p_content").html(content);
    in_popup();
}
function out_all() {
    out_popup();
    out_menu();
}
function angular_trigger(m) {
    var t = "angular.element(document.getElementById('body')).scope()." + m + "();";
    eval(t);
}
///<reference path='GLOBAL.ts' />
///<reference path='main_controller.ts' />
///<reference path='user.ts' /> 
