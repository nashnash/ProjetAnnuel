var db = require("../config/database");

var produit = db.produit;

exports.insertProduit = (req, res) => {
  if (req.body.nom && req.body.peremption) {
    produit
      .findOne({
        where: {
          nom: req.body.nom,
          userId: req.idUser
        }
      })
      .then(produit => {
        if (produit) {
          produit.quantité = produit.quantité + 1;
          produit
            .save()
            .then(() => {
            res.status(200).send({
                message: "Le produit a bien été ajouté"
              });
            });
        } else {
          const p = db.produit.build({
            nom: req.body.nom,
            quantité: 1,
            peremption: req.body.peremption,
            userId: req.idUser
          });
          p.save()
            .then(() => {
              res.status(200).send({
                message: "Le produit " + p.nom + " a bien été ajouté"
              });
            })
            .catch(error => {
              res.status(200).send({
                message: "Une erreur technique est survenue"
              });
            });
        }
      });
  } else {
    return res.status(500).send("Des informations sont manquantes");
  }
};
