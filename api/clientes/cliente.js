const restful = require('node-restful')
const mongoose = restful.mongoose

const clienteSchema = new mongoose.Schema({
    nome: {type: String, required: true},
    idade: {type: Number, required: false},
    sexo: {type: String, required: false, uppercase: true, 
        enum: ['F', 'M']},
    dataNascimento: {type: Date, required: true},
    email: {type: String, required: true},
    endereco: {type: String, required: false}
})

module.exports = restful.model('Cliente', clienteSchema)