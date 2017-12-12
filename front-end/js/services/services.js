const backendUri = 'http://localhost:90/'
angular.module('services', ['ngResource'])
	.factory('clientResource', function($resource) {
		return $resource(backendUri+'client/:cli_id', null, {
			'update' : {
				method: 'PUT'
			},
			'show' : {
				method: 'GET'
			}
		});
	})
	.factory("clientInsertion", function(clientResource, $q, $rootScope) {
		var event = 'clientInserted';

		var service = {};

		service.insert = function(client) {
			return $q(function(resolve, reject) {
				if(client.cli_id) {
					clientResource.update({cli_id: client.cli_id}, client, function() {
						$rootScope.$broadcast(event);
						resolve({
							message: 'Cliente ' + client.name + ' atualizado com sucesso',
							inclusao: false
						});
					}, function(erro) {
						console.log(erro);
						reject({
							message: 'Não foi possível atualizar o cliente ' + client.name
						});
					});
				} else {
					clientResource.save(client, function() {
						$rootScope.$broadcast(event);
						resolve({
							message: 'Cliente ' + client.name + ' inserido com sucesso',
							inclusao: true
						});
					}, function(erro) {
						console.log(erro);
						reject({
							message: 'Não foi possível inserir o cliente ' + client.name
						});
					});
				}
			});
		};
		return service;
    })
		.factory("getClient", function(clientResource, $q, $rootScope) {
			var event = 'clientGot';

			var service = {};

			service.get = function(client) {
				return $q(function(resolve, reject) {
					if(client.cli_id) {
						clientResource.get({cli_id: client.cli_id}, function() {
							$rootScope.$broadcast(event);
							resolve();
						}, function(erro) {
							console.log(erro);
							reject({
								message: 'Não foi possível obter o cliente ' + client.name
							});
						});
					}
				});
			};
			return service;
	    });
