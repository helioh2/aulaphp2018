const express = require('express')
const mongoose = require('mongoose')
const bodyParser = require('body-parser')
const Schema = mongoose.Schema
const server = express()

server.use(bodyParser.urlencoded({ extended: true }))
server.use(bodyParser.json())


server.set('views', __dirname + '/views')
server.set('view engine', 'jade')
server.use(express.static(__dirname + '/public'))

mongoose.connect('mongodb://localhost:27017/clientes')

const clienteSchema = new Schema({
    nome: String, 
    idade: Number, 
    sexo: {type: String, enum: ['M', 'F']}, 
    dataNascimento: Date, 
    email: String, 
    endereco: String
})
const Cliente = mongoose.model('Cliente', clienteSchema)


server.get('/', function(req, res){
    res.send('Olá, mundo')
})

server.get('/clientes', function(req, res) {
    Cliente.find(function(err, clientes){
        res.send(clientes)
    })
})

server.get('/clientes/:id', function(req, res) {
    // console.log(req.params._id)
    Cliente.find({_id: req.params.id}, function(err, cliente){
        // console.log(cliente)
        res.send(cliente)
    })
})

server.post('/clientes', function(req, res) {
    var cliente = new Cliente(req.body)
    cliente.save(() => res.sendStatus(200))
    // Cliente.create(req.body, function(err, cliente) {
    //     res.sendStatus(200)
    //})
})

server.put('/clientes/:id', function(req, res) {
    var cliente = (new Cliente(req.body))
    Cliente.update({_id: req.params.id}, cliente, (err, raw) => {
        console.log(raw)
        res.sendStatus(200)
    })
})

server.delete('/clientes/:id', function(req, res) {
    Cliente.remove({_id: req.params.id}, () => {
        res.sendStatus(200)
    })
})

server.listen(8000, function() {
    console.log('Executando')
})

