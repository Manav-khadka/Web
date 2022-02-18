var express = require('express');
var bodyparser = require('body-parse');
var app = express();
app.set('view engine', 'ejs');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.post('signup_submit',function(req,res){

console.log(req.body);
});
app.listen(4000);