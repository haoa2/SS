function toggle_overlay(){ $(".overlay").fadeToggle('slow'); }
function in_overlay(){ $(".overlay").fadeIn('slow'); }
function out_overlay(){ $(".overlay").fadeOut('slow'); out_all();}

function toggle_popup(){ $(".popup").fadeToggle('slow'); }
function in_popup(){ $(".popup").fadeIn('slow'); }
function out_popup(){ $(".popup").fadeOut('slow'); }

function toggle_menu(){ $("#menu").fadeClass('MenuOn'); }
function in_menu(){ $("#menu").addClass('MenuOn'); }
function out_menu(){ $("#menu").removeClass('MenuOn'); }

var contents = {
	login: '<input type="text" placeholder="Usuario" id="username"><br><input type="password" placeholder="Contraseña" id="password"><br><input type="button" value="Enviar" onclick="angular_trigger(\'login\')">',
	signup: '<input type="text" placeholder="Usuario" id="username"><br><input type="password" placeholder="Contraseña" id="password"><br><input type="button" value="Enviar" onclick="angular_trigger(\'signup\')">',
	new_secret: ' <input type="text" id="n_content" placeholder="Secret"><input type="text" id="n_cat" placeholder="School"><input type="button" onclick="angular_trigger(\'new_post\')" value="Enviar">'
}

var show = {
	login: function(){
		in_overlay();
		popup_set("Inicio", contents.login);
	},
	signup: function(){
		in_overlay();
		popup_set("Registro", contents.signup);
	},
	new_secret: function(){
		in_overlay();
		popup_set("Nuevo Zelda", contents.new_secret);
	},
	menu: function () {
		in_overlay();
		in_menu();
	}
}

function popup_set(title, content){
	$("#p_title").text(title);
	$("#p_content").html(content);
	in_popup();
}

function out_all(){
	out_popup();
	out_menu();
}

function angular_trigger(m){
	var t = "angular.element(document.getElementById('body')).scope()."+m+"();"
	eval(t);
}