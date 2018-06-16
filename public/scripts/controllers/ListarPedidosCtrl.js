

angular.module('clientesApp').controller('ListarPedidosCtrl', 
                function($scope, $http, $routeParams, clientesService) {
            
    $scope.cliente = clientesService.getCliente($routeParams.id)
    
    //FUNCAO QUE ATUALIZA LISTA
    $scope.refresh = function() {
        $http.get("/clientes/"+$scope.cliente._id+"/pedidos")
        .then(function success(response) {
            $scope.pedidos = response.data; 
            // $scope.cliente.pedidos
        }, function error(response) {
            $scope.pedidos = [{nome: "Erro"}];
        });                   
    }
                    
    $scope.delete = function(id) {
        $http.delete("/clientes/"+$scope.cliente._id+"/pedidos/"+id)
        .then(function success(response) {
            $scope.pedidos = $scope.pedidos.filter(
                (pedido) => pedido._id != id
            )
        });
    }

    $scope.refresh()
    
});