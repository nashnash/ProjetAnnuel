module.exports = function(sequelize, Type) {
    const produit = sequelize.define(
        "produit",
        {
            nom: {
                type: Type.STRING(255),
                alllowNull: false,
                primaryKey : true,
            },
            quantité:  {
                type: Type.INTEGER,
                alllowNull: false
            },
            peremption: {
                type: Type.DATEONLY,
                alllowNull: false
            },
        },{
            timestamps: false,
            tableName: 'produit'
        }
    );

    return produit;
}