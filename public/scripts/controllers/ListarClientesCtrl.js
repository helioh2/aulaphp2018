
angular.module('clientesApp').controller('ListarClientesCtrl', 
                function($scope, $http, $interval, clientesService) {
                
    //FUNCAO QUE ATUALIZA LISTA
    $scope.refresh = function() {
        clientesService.loadClientes(function(clientes) {
            $scope.clientes = clientes;
            console.log($scope.clientes);
        });                 
    }

    $scope.delete = function(id) {
        $http.delete("/clientes/"+id)
        .then(function success(response) {
            $scope.clientes = clientesService.deleteCliente(id);                     
        });
    }

    $scope.refresh()

    // //ATUALIZA A CADA 2 SEGUNDOS
    // $interval(function () {
    //     $scope.refresh()
    // }, 2000);
    
});