const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser')

const server = express();


server.use(bodyParser.urlencoded({ extended: true }));
server.use(bodyParser.json());

server.use(express.static(__dirname + '/public'))

// var clientes = [];

// server.get("/", function(req, res){
//     res.send("OLA MUNDO");
// })

server.get("/clientes", function(req, res){
    
    // cliente1 = {
    //     nome: 'Fulano',
    //     idade: 45,
    //     email: 'fulano@uol'
    // };
    // cliente2 = {
    //     nome: 'Ciclana',
    //     idade: 23,
    //     email: 'ciclana@bol'
    // };

    // clientes.push(cliente1);
    // clientes.push(cliente2);

    res.send(clientes);

})

server.post("/clientes", function(req, res) {
    var clienteNovo = req.body;
    // console.log(clienteNovo.nome)
    clientes.push(req.body);
    res.sendStatus(200);
})

server.delete("/clientes/:id", function(req, res) {
    var id = req.params.id;
    //...
})

server.put("/clientes/:id", function(req, res) {

})


server.listen(8000, function() {
    console.log("FUNCIONANDO!!");
})

