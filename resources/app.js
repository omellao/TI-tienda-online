const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const app = express();

const bcrypt = require('bcrypt');
const mongoose = require('mongoose');
const user = require('./user');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false}));

app.use(express.static(path.join(__dirname, 'public')));

const mongo_uri = 'mongodb://mongoadmin:123456@localhost/users';

mongoose.connect(mongo_uri, function(err){
    if (err) {
        throw err;
    } else {
        console.log(`Succesfully connected to ${mongo_uri}`);       
    }
});

app.post('/register', (req, res) => {
    const {name, pass} = req.body;
    
    const user = new user({name, pass});

    user.save(err => {
        if(err){
         res.status(500).send('ERROR AL REGISTRAR AL USUARIO');
        }else{
         res.status(200).send('USUARIO REGISTRADO');
        }
    })
});
app.post('/authenticate', (req, res) => {
    const {name, pass} = req.body;
    user.findOne({name}, (err, user) =>{
        if(err){
            res.status(500).send('ERROR AL AUTENTICAR AL USUARIO');
        }else if(!user){
            res.status(500).send('EL USUARIO NO EXISTE');
        }else{
            user.isCorrectPassword(pass, (err, result) =>{
                if(err){
                    res.status(500).send('ERROR AL AUTENTICAR');
                }else if(result){
                    res.status(200).send('USUARIO AUTENTICADO CORRECTAMENTE');
                }else{
                    res.status(500).send('USUARIO Y/O CONTRASEÑA INCORRECTA');
                }
            });
        }
    });
});
app.listen(3000, () => {
    console.log('server started');
})
module.exports = app;