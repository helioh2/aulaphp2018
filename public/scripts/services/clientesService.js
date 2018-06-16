
angular.module('clientesApp').service('clientesService', function($http) {
    var clientes = [];

    var loadClientes = function(callback) {
        $http.get("/clientes")
        .then(function success(response) {
            clientes = response.data;
            callback(clientes);
        }, function error(response) {
            clientes = [{nome: "Erro"}];
        });                   
    };

    var getClientes = function(){
        return clientes;
    };

    var deleteCliente = function(id){
        clientes = clientes.filter((cliente) => cliente._id != id);
        return clientes;
    }

    var getCliente = function(id) {
        return clientes.find((cliente) => cliente._id == id);
    }

    var addCliente = function(cliente) {
        clientes.push(cliente);
    }

    return {
        loadClientes: loadClientes,
        getClientes: getClientes,
        deleteCliente: deleteCliente,
        getCliente: getCliente,
        addCliente: addCliente
    };

});