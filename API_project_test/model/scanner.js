module.exports = function(sequelize, Type) {
    const scanner = sequelize.define(
        "scanner",
        {
            url: {
                type: Type.STRING(255),
                alllowNull: false,
            },
            email: {
                type: Type.STRING(255),
                alllowNull: false,
            },
        },{
            timestamps: false,
            tableName: 'scanner'
        }
    );

    return scanner;
}