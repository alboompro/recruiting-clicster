// Controller responsible to manage client
angular.module('agenda')
	.controller('ClientController', ['$scope', 'clientResource', '$routeParams', 'clientInsertion', function($scope, clientResource, $routeParams, clientInsertion) {

		$scope.client = {};
		$scope.clients = {};
		$scope.clientFilter = '';
		$scope.message = '';

		clientResource.query(function(clients) {
			$scope.clients = clients;
		}, function(erro) {
			console.log(erro);
		});

		if($routeParams.cli_id) {
			clientResource.get({cli_id: $routeParams.cli_id}, function(client) {
				$scope.client = client;
			}, function(erro) {
				console.log(erro);
				$scope.message = 'Não foi possível obter o cliente'
			});
		}

		$scope.submit = function() {
			if ($scope.clientForm.$valid) {
				clientInsertion.insert($scope.client)
				.then(function(dados) {
					$scope.message = dados.message;
					if (dados.inclusao) $scope.client = {};
				})
				.catch(function(erro) {
					$scope.message = erro.message;
				});
			}
		};
	}]);
