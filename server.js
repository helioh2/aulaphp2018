const express = require('express')
const mongoose = require('mongoose')
const bodyParser = require('body-parser')
const Schema = mongoose.Schema
const server = express()
const model= require("./config/model")
const Cliente = model.Cliente
const Item = model.Item

server.use(bodyParser.urlencoded({ extended: true }))
server.use(bodyParser.json())

// server.set('views', __dirname + '/views')
// server.set('view engine', 'jade')
server.use(express.static(__dirname + '/public'))

server.get('/clientes', function(req, res) {
    var Query = Cliente.find();
    Query.select("-pedidos");  //para excluir os pedidos (desnecessário carregar pedidos para todos os clientes)
    Query.exec(function(err, clientes) {
        res.send(clientes);
    })
})

server.get('/clientes/:id', function(req, res) {
    Cliente.findOne({_id: req.params.id}, function(err, cliente){
        res.send(cliente)
    })
})

server.post('/clientes', function(req, res) {
    var cliente = new Cliente(req.body)
    cliente.save(() => res.sendStatus(200))
    // Cliente.create(req.body, function(err, cliente) { //outro jeito
    //     res.sendStatus(200)
    //})
})

server.put('/clientes/:id', function(req, res) {
    var cliente = req.body;
    Cliente.update({_id: req.params.id}, cliente, (err, raw) => {
        res.sendStatus(200)
    })
})

server.delete('/clientes/:id', function(req, res) {
    Cliente.remove({_id: req.params.id}, () => {
        res.sendStatus(200)
    })
})


//Itens

server.get('/itens', function(req, res) {
    Item.find(function(err, itens){
        res.send(itens)
    })
})

server.get('/itens/:id', function(req, res) {
    // console.log(req.params._id)
    Item.findOne({_id: req.params.id}, function(err, item){
        res.send(item)
    })
})

server.post('/itens', function(req, res) {
    var item = new Item(req.body)
    item.save(() => res.sendStatus(200))

})

server.put('/itens/:id', function(req, res) {
    var item = req.body;
    Item.update({_id: req.params.id}, item, (err, raw) => {
        res.sendStatus(200)
    })
})

server.delete('/itens/:id', function(req, res) {
    Item.remove({_id: req.params.id}, () => {
        res.sendStatus(200)
    })
})


//Pedidos
server.get('/clientes/:idCliente/pedidos', function(req, res) {
    Cliente.findOne({_id: req.params.idCliente})
            .populate("pedidos.item")
            .exec(function(err, cliente){
        res.send(cliente.pedidos)
    })
})

server.get('/clientes/:idCliente/pedidos/:idPedido', function(req, res) {
    Cliente.findOne({_id: req.params.idCliente}, function(err, cliente){
        var pedido = cliente.pedidos.find((pedido) => pedido._id == req.params.idPedido);
        res.send(pedido)
    })
})

server.post('/clientes/:idCliente/pedidos', function(req, res) {
    Cliente.update({_id: req.params.idCliente},
                    {$push: {pedidos: req.body}},
                    (err, raw) => res.send(200));
})

server.put('/clientes/:idCliente/pedidos/:idPedido', function(req, res) {
    Cliente.update({_id: req.params.idCliente, "pedido._id": req.params.idPedido},
                    {$set: {"pedidos.$": req.body}},
                    (err, raw) => res.send(200));
})

server.delete('/clientes/:idCliente/pedidos/:idPedido', function(req, res) {
    Cliente.update({_id: req.params.idCliente},
                    {$pull: {pedidos: {_id: req.params.idPedido}}},
                    (err, raw) => res.send(200));
})


server.listen(8000, function() {
    console.log('Executando')
})