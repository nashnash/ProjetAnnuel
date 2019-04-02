module.exports = function(sequelize, Type) {
    const deplacement = sequelize.define(
        "scanner",
        {
            date: {
                type: Type.DATEONLY,
                alllowNull: false
            },
            status: {
                type: Type.STRING(30),
                alllowNull: false,
            },
            etat:  {
                type: Type.INTEGER,
                alllowNull: false
            },
        },{
            timestamps: false,
            tableName: 'deplacement'
        }
    );

    return deplacement;
}