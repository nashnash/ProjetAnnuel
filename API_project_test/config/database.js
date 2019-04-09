var Sequelize = require("sequelize");

var sequelize = new Sequelize('test_bdd','root','theocharlotte', {
    host: '127.0.0.1',
    dialect: 'mysql',
    operatorsAliases: false,
    pool: {
        max: 5,
        min: 1,
        acquire: 30000,
        idle: 10000
    }
});

var db = { };

db.Sequelize = Sequelize;
db.sequelize = sequelize;

db.centre = require("../model/centre")(sequelize,Sequelize);
db.produit = require("../model/produit")(sequelize,Sequelize);
db.deplacement = require("../model/deplacement")(sequelize,Sequelize);
db.interagir = require("../model/interagir")(sequelize,Sequelize);
db.lister = require("../model/lister")(sequelize,Sequelize);
db.scanner = require("../model/scanner")(sequelize,Sequelize);
db.societe = require("../model/societe")(sequelize,Sequelize);
db.stock = require("../model/stock")(sequelize,Sequelize);
db.user = require("../model/user")(sequelize,Sequelize);
db.vehicule = require("../model/vehicule")(sequelize,Sequelize);

db.stock.belongsTo(db.centre);
db.interagir.belongsTo(db.societe);
db.deplacement.belongsTo(db.vehicule);
db.produit.belongsTo(db.user);

module.exports = db;