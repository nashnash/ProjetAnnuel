module.exports = function(sequelize, Type) {
    const centre = sequelize.define(
        "centre",
        {
            rue: {
                type: Type.STRING(255),
                alllowNull: false
            },
            numero: {
                type: Type.INTEGER,
                alllowNull: false
            },
            ville: {
                type: Type.STRING(255),
                alllowNull: false
            },
            code_postale: {
                type: Type.STRING(5),
                alllowNull: false
            }
        },{
            timestamps: false,
            tableName: 'centre'
        }
    );

    return centre;
}