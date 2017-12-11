angular.module('agenda').controller('ClientsController', [ '$scope', '$http', 'clientResource', function($scope, $http, clientResource) {

	$scope.clients = [];
	$scope.clientFilter = '';
	$scope.message = '';

	clientResource.query(function(clients) {
		$scope.clients = clients;
	}, function(erro) {
		console.log(erro);
	});

}]);
