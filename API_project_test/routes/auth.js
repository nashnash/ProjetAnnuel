var authController = require("../controller/auth");

module.exports = function(app) {
    app.post('/login',authController.login);
    app.post('/verifyToken',authController.verifyToken);
}