var db = require("../config/database");

var jwt = require("jsonwebtoken");
var md5 = require("md5");

var User = db.user;

var crypto = require("../plugins/crypt");

exports.login = (req, res) => {
  if (req.body.email && req.body.password) {
    User.findOne({
      where: {
        email: req.body.email
      }
    }).then(user => {
      if (!user) {
        return res.status(500).send("L'utilisateur n'existe pas");
      } else {
        var passwordValid =
          crypto.cryptMD5(req.body.password, "erXgIjX7") === user.password;
        if (passwordValid) {
          var token = jwt.sign(
            {
              nom: user.nom,
              prenom: user.prenom,
              idUser: user.id
            },
            "erXgIjXXXXX",
            {
              expiresIn: "1h"
            }
          );
          return res.status(200).send({
            token: token
          });
        } else {
          return res.status(500).send("Le mot de passe est invalide");
        }
      }
    });
  } else {
    return res
      .status(404)
      .send("L'adresse mail ou le mot de passe n'est pas renseigné");
  }
};

exports.verifyToken = (req,res,next) => {
    let token = req.headers['token'];
    if(!token) {
        return res.status(500).send("Token non présent");
    } else {
        jwt.verify(token,"erXgIjXXXXX",(err,decoded) => {
            if(err) {
                return res.status(500).send(err);
            } else {
                req.idUser = decoded.idUser;
                next();
            }
        })
    }
}