module.exports = function(sequelize, Type) {
    const societe = sequelize.define(
        "societé",
        {
            nom: {
                type: Type.STRING(55),
                alllowNull: false,
                
            },
            adresse: {
                type: Type.STRING(255),
                alllowNull: false,
                
            },
            telephone:  {
                type: Type.INTEGER,
                alllowNull: false
            },
            
        },{
            timestamps: false,
            tableName: 'society'
        }
    );

    return societe;
}