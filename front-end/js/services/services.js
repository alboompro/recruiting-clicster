const backendUri = 'http://localhost:90/'
angular.module('services', ['ngResource'])
	.factory('clientResource', function($resource) {
		return $resource(backendUri+'client/:clientId', null, {
			'update' : {
				method: 'PUT'
			}
		});
	})
	.factory("clientInsertion", function(clientResource, $q, $rootScope) {
		var event = 'clientInserted';

		var service = {};

		service.insert = function(client) {
			return $q(function(resolve, reject) {

				if(client._id) {
					clientResource.update({clientId: client._id}, client, function() {
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
    });
