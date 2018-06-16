var app = angular.module('clientesApp', ["ngRoute"]);

app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl: "../views/listarClientes.html",
        controller: "ListarClientesCtrl"
    })
    .when("/alterar/:id", {
        templateUrl: "../views/formAlterar.html",
        controller: "AlterarClienteCtrl"
    })               
    .when("/inserir", {
        templateUrl: "../views/formAlterar.html",
        controller: "InserirClienteCtrl"
    })
    .when("/listarPedidos/:id", {
        templateUrl: "../views/listarPedidos.html",
        controller: "ListarPedidosCtrl"
    })
    .when("/novoPedido/:id", {
        templateUrl: "../views/inserirPedido.html",
        controller: "InserirPedidoCtrl"
    });
})
