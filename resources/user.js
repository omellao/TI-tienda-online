const bcrypt = require('bcrypt');
const mongoose = require('mongoose');

const saltRounds = 10;

const UserSchema = new mongoose.Schema({
    name: { type: String, required: true, unique: true },
    pass: { type: String, required: true },
});

UserSchema.pre('save', function(next){
    if(this.isNew || this.isModified('pass')){
        
        const document = this;
        bcrypt.hash(document.pass, saltRounds, (err, hashedPassword) =>{
            if(err){
                next(e);
            }else{
                document.pass = hashedPassword;
                next();
            }
        });
    }else{
        next();
    }
});

UserSchema.methods.isCorrectPassword = function(pass, callback){
    bcrypt.compare(pass, this.pass, function(err, same){
       if(err){
        callback(err);
       }else{
            callback(err, same);
       }
    });
}

module.exports = mongoose.model('User', UserSchema);