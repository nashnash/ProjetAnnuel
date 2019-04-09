module.exports = function(sequelize, Type) {
    const lister = sequelize.define(
        "lister",
        {
            url: {
                type: Type.STRING(255),
                alllowNull: false,
            },
        },{
            timestamps: false,
            tableName: 'lister'
        }
    );

    return lister;
}