module.exports = function(sequelize, Type) {
  const user = sequelize.define(
    "user",
    {
      email: {
        type: Type.STRING(255),
        alllowNull: false
      },
      nom: {
        type: Type.STRING(55),
        alllowNull: false
      },
      prenom: {
        type: Type.STRING(55),
        alllowNull: false
      },
      role: {
        type: Type.INTEGER,
        alllowNull: false
      },
      rue: {
        type: Type.STRING(55),
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
      code_postal: {
        type: Type.STRING(5),
        alllowNull: false
      },
      password: {
        type: Type.STRING(255),
        alllowNull: false
      }
    },
    {
      timestamps: false,
      tableName: "user"
    }
  );

  return user;
};
