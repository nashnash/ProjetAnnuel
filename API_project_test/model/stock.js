module.exports = function(sequelize, Type) {
    const stock = sequelize.define(
        "stockage",
        {
            taille:  {
                type: Type.INTEGER,
                alllowNull: false
            },
        },{
            timestamps: false,
            tableName: 'stock'
        }
    );

    return stock;
}