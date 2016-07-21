$.mobile.linkBindingEnabled = false;
$.mobile.hashListeningEnabled = false;
angular.module('controller',[])

.controller('BlogCtrl', ['$scope', '$http', '$log', function($scope, $http, $log) {
	
	$scope.frmToggle = function() {
		$('#blogForm').slideToggle();
	}

	$http.get('./js/popData.php')
	.success(function(data) {

		$scope.personas = data;
		
	})
	.error(function(err) {
		$log.error(err);
	})
	

	$scope.pushData = function($params) 
	{
		$http.post('./js/pushData.php',{'nombre':$params.nombre, 'appaterno':$params.appaterno, 'apmaterno':$params.apmaterno, 'edad':$params.edad, 'sexo':$params.sexo, 'red':$params.red, 'direccion':$params.direccion})
			.success(function(data) {
				$scope.personas = data;
				alert('Registro realizado');
				//location.reload();
			})
			.error(function(err) {
				$log.error(err);
			})
		// Recargamos el formulario, dejamos vacio el arreglo que se inserto
		$scope.frm ={};
			
	}
	
	$scope.removeData = function($params) {
		var cnfrm = confirm("Deseas Eliminar este registro?");
		if(cnfrm) {
			$http.post('./js/removeData.php', {'IdPersona':$params})
			.success(function(data) {
				$scope.personas = data;
				
			})
			.error(function(err) {
				$log.error(err);
			})
		} 
	}
	/*$scope.cargar = function($params) {
		alert($params);

		$http.post('./js/loadData.php', {'IdPersona':$params})
		.success(function(data) {
			alert(data);
			$scope.personasDetalles = data;
			alert(data);

		})
		.error(function(err) {
			
			$log.error(err);
		})
		
				
	}*/

}])
.controller('detalles', ['$scope', '$http','$routeParams',
	function($scope, $http, $routeParams)
	{
       //$detallesPersona ={};
		$http.get('./js/loadData.php?param='+$routeParams.id+'&tipo=cargaDetalle')
		.success(function(data,status, headers, config) {
			
			$scope.detallesPersona = data;
			
		})
		.error(function(err) {
			
			$log.error(err);
		})

		$scope.frmToggle = function() {
		$('#formDetalle').slideToggle();
		}

		$scope.updatePersona = function($params) 
		{
			var cnfrm = confirm("Deseas validar la escuela Seleccionada?, Despues de aceptar no podrá dar reversa al cambio.");
			if(cnfrm) 
			{
				$http.post('./js/loadData.php?idpersona='+$routeParams.id+'&tipo=updatePersona', {'idescuela':$params.idescuela})
				.success(function(data) {
					
					$scope.detallesPersona = data[0];
					alert(data[1]);
					
				})
				.error(function(err) {
					$log.error(err);
				})
			}

		
		}

		


	}])
.controller('cargaRedes',['$scope', '$http','$routeParams',
	function($scope, $http, $routeParams)
	{
       
		$http.get('./js/loadData.php?tipo=cargaRed')
		.success(function(data,status, headers, config) {
			
			$scope.redes = data;
			
		})
		.error(function(err) {
			
			$log.error(err);
		})
		


	}])