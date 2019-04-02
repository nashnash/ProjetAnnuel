var produitController = require("../controller/produit");
var authController = require("../controller/auth");

module.exports = function(app) {
    app.post('/insererProduit',[authController.verifyToken],produitController.insertProduit);
}