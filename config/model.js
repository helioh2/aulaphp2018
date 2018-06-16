const mongoose = require('mongoose')
const Schema = mongoose.Schema

mongoose.connect('mongodb://localhost:27017/clientes')

const itemSchema = new Schema({
    nome: {type: String, required: true},
    preco: {type: Number, required: true}
})

const pedidoSchema = new Schema({
    quantidade: {type: Number, required: true},
    frete: Number,
    item: {type: Schema.ObjectId, ref: 'Item', required: true}
})

const clienteSchema = new Schema({
    nome: {type: String, required: true}, 
    idade: Number, 
    sexo: {type: String, enum: ['M', 'F']}, 
    // dataNascimento: Date, 
    email: String, 
    endereco: String,
    pedidos: [pedidoSchema]
});

const Item = mongoose.model('Item', itemSchema)
// const Pedido = mongoose.model('Pedido', clienteSchema)
const Cliente = mongoose.model('Cliente', clienteSchema)

module.exports = {Item, Cliente};
