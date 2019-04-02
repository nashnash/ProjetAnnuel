var express = require("express");
var bodyParser = require("body-parser");
var db = require("./config/database");
var app = express();
app.use(bodyParser.json());

//db.sequelize.sync({force:true});

// Routes
require("./routes/auth")(app);
require("./routes/produit")(app);

app.listen(8081,function() {
    console.log("Je tourne sur le port 8081");
});