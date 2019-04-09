module.exports = function(sequelize, Type) {
    const interagir = sequelize.define(
        "interagir",
        {

            demander:  {
                type: Type.INTEGER,
                alllowNull: false
            },
            valider:  {
                type: Type.INTEGER,
                alllowNull: false
            },
        },{
            timestamps: false,
            tableName: 'interagir'
        }
    );

    return interagir;
}