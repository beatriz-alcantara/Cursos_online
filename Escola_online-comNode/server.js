const express = require('express');
const app = express();
const fs = require('fs');


app.use(express.static('public'));

app.get('/', (req, res)=>{
    res.send("public/index.html"); 
});

app.listen(process.env.port);