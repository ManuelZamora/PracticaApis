'use strict'
const User = use('App/Models/User');

class UserController {
  async userNew ({ request, response }){
    try {
      const data = await request.all();
      const us = new User();

      us.username = data.username;
      us.email = data.email;
      us.password = data.password;

      if (await us.save()) {
        return response.status(200).json(us);
      }

    } catch (error) {
      return error;
      return response.status(500).json({
        message: "Operacion Erronea"
      });
    }
  }
  async getUserByUsername ({response}){
    try {
      const user = await User.query().select('username as user').fetch();
      return response.status(200).json(user);
    } catch (error) {
      return response.status(500).json({
        message: "Operacion Erronea"
      });
    }
  }
}

module.exports = UserController
