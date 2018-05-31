const port = 3003

const bodyParser = require('body-parser')
const express = require('express')
const server = express()

server.use(bodyParser.urlencoded({ extended: true }))
server.use(bodyParser.json())


// router.use((req, res, next) => {
//     const init = Date.now()
//     next()
//     console.log(`Tempo = ${Date.now() - init} ms.`)
// })

// router.get('/cliente/:id', (req, res) => {
//     res.send({id: req.params.id, name: 'Joao' })
//     //...
// })

// router.get('/clientes', (req, res) => {
//     res.send({id: req.params.id, name: 'Joao' })
// })

// server.use('/api', router)


// server.route('/clientes')
//     .get((req, res) => res.send('Lista de clientes'))
//     .post((req, res) => res.send('Novo cliente'))
//     .put((req, res) => res.send('Altera cliente'))
//     .delete((req, res) => res.send('Deleta cliente'))

server.listen(port, () => {
    console.log('Executando.')
})

module.exports = server