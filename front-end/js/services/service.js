angular.module('service', ['ngResource'])
	.factory('clientResource', function($resource) {
		return $resource('/v1/client/:clientId', null, {
			'update' : {
				method: 'PUT'
			}
		});
	})

	
