
angular.module('clientesApp').controller('InserirPedidoCtrl', 
                function($scope, $routeParams, $http, $location, clientesService) {
      
    $scope.cliente = clientesService.getCliente($routeParams.id);
    $scope.pedido = {};

    $scope.loadItems = function () {
        $http.get("/itens").
        then(function success(response) {
            console.log(response.data);
            $scope.itens = response.data;
        });
    }
    
    $scope.loadItems();

    $scope.adicionaItem = function(id) {
        $scope.pedido.item = id
        $http.post("/clientes/"+$scope.cliente._id+"/pedidos", $scope.pedido)
        .then(function success(response) {
            $location.path("/listarPedidos/"+$scope.cliente._id);
        });
    }
});