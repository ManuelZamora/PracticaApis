from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_marshmallow import Marshmallow

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'postgresql://postgres:alex2503@localhost/SistemaDB'
app.config['SQLACHEMY_TRACK_MODIFICATION'] = False
db = SQLAlchemy(app)
ma = Marshmallow(app)


class Empleados(db.Model):
       id = db.Column(db.Integer, primary_key=True)
       Nombre = db.Column(db.String(120))
       Apellido_Paterno = db.Column(db.String(120))
       Apellido_Materno = db.Column(db.String(120))
       Correo = db.Column(db.String(120))
       Telefono = db.Column(db.String(80))

       def __init__(self, Nombre, Apellido_Paterno, Apellido_Materno, Correo, Telefono):
           self.Nombre = Nombre
           self.Apellido_Paterno = Apellido_Paterno
           self.Apellido_Materno = Apellido_Materno
           self.Correo = Correo
           self.Telefono = Telefono

db.create_all()

class EmpleadoSchema(ma.Schema):
       class Meta:
           fields=('id','Nombre','Apellido_Paterno','Apellido_Materno','Correo','Telefono')

empleado_schema = EmpleadoSchema()
empleados_schema = EmpleadoSchema(many=True)      

@app.route('/newFlask', methods=['Post'])
def create_employee():
    
    Nombre = request.json['Nombre']
    Apellido_Paterno = request.json['Apellido_Paterno']
    Apellido_Materno = request.json['Apellido_Materno']
    Correo = request.json['Correo']
    Telefono = request.json['Telefono']
    
    newEmployee = Empleados(Nombre,Apellido_Paterno,Apellido_Materno,Correo,Telefono)

    db.session.add(newEmployee)
    db.session.commit()

    return empleado_schema.jsonify(newEmployee)

@app.route('/getFlask',methods=['Get'])
def get_employee():
    all_employees = Empleados.query.all()
    result = empleados_schema.dump(all_employees)
    return jsonify(result)
    
@app.route('/employee/<id>',methods=['Get']) 
def get_task(id):
    emp = Empleados.query.get(id)
    return empleados_schema.jsonify(emp)

@app.route('/modFlask/<id>',methods=['Put'])
def upd_employees(id):
    employee = Empleados.query.get(id)

    Nombre = request.json['Nombre']
    Apellido_Paterno = request.json['Apellido_Paterno']
    Apellido_Materno = request.json['Apellido_Materno']
    Correo = request.json['Correo']
    Telefono = request.json['Telefono']

    employee.Nombre = Nombre
    employee.Apellido_Paterno = Apellido_Paterno
    employee.Apellido_Materno = Apellido_Materno
    employee.Correo = Correo
    employee.Telefono = Telefono

    db.session.commit()

    return empleado_schema.jsonify(employee)

@app.route('/deleteFlask/<id>',methods=['Delete'])
def delete_task(id):
    employee = Empleados.query.get(id)
    db.session.delete(employee)
    db.session.commit()
    return empleado_schema.jsonify(employee)

if __name__ == "__main__":
    app.run(debug=True)

@app.route('/')
def index():
   return "This is my flask project"
   
