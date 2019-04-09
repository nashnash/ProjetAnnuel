module.exports = function(sequelize, Type) {
    const vehicule = sequelize.define(
        "vehicule",
        {
            autonomie:  {
                type: Type.INTEGER,
                alllowNull: false
            },
            cout:  {
                type: Type.INTEGER,
                alllowNull: false
            },
            volumetrie:  {
                type: Type.INTEGER,
                alllowNull: false
            },
        },{
            timestamps: false,
            tableName: 'vehicule'
        }
    );

    return vehicule;
}