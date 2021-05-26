'use strict'
const Employee = use('App/Models/Empleado');

class EmpleadoController {
  async newEmployee({request, response}){
    try {
      const data = await request.all();
      const emp = new Employee();

      emp.Nombre = data.Nombre;
      emp.Apellido_Paterno = data.Apellido_Paterno;
      emp.Apellido_Materno = data.Apellido_Materno;
      emp.Correo = data.Correo;
      emp.Telefono = data.Telefono;

      //return data;

      if (await emp.save()) {
        return response.status(200).json({
          message: "Empleado Creado Correctamente"
        });
      }

    } catch (error) {
      return response.status(500).json({
        message: "Error al crear"
      });
    }
  }

  async getEmployee({response}){
    try {
      const employee = await Employee.query().select('employee as emp').fetch();
      return response.status(200),json(employee);
    } catch (error) {
      return response.status(500).json({
        message: "Operacion Erronea"
         });
      }
    }
  }

module.exports = EmpleadoController
