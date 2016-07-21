$.mobile.linkBindingEnabled = false;
$.mobile.hashListeningEnabled = false;
angular.module('app', ['ngRoute', 'controller'])
.config(function($routeProvider) {
	$routeProvider
	.when('/', {
		templateUrl: 'templates/home.html'
	})
	.when('/blog', {
		templateUrl: 'templates/blog.html',
		controller: 'BlogCtrl'
	})
	.when('/afirmacion', {
		templateUrl: 'templates/afirmacion.html',
		controller: 'BlogCtrl'
	})
	.when('/registro', {
		templateUrl: 'templates/registro.html',
		controller: 'BlogCtrl'
	})
	.when('/detalles/:id', {
		controller: 'detalles',
		templateUrl: 'templates/detalles.html'
	})
	
	.otherwise({
		templateUrl: 'templates/404.html'
	})
})

