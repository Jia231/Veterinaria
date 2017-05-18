/**
 * Created by Jia Ming Liou on 3/27/2017.
 */
(function(){
    var PacienteFactory = function ($http,$log){
        let url = "PHP/Controller/";
        var factory = {};
        factory.agregarUnPaciente = function(...params){
            return $http({
                url: url + 'Crear_Paciente.php',
                method:'POST',
                data:{'paciente':params[0],'raza':params[1],'peso':params[2],
                    'edad':params[3],'sexo':params[4],'dueno':params[5],'telefono':params[6],
                    'alergias':params[7]},
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            })
        }

        factory.mostrarPacientes = function(){
            return $http.get(url + 'VerTodosPacientes.php');
        }
        factory.buscarPaciente = (...params) =>{
           return $http({
                url: url + 'Filtrar_Paciente.php',
                method:'POST',
                data:{'texto':params[0]},
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            })
        }
        factory.buscarUnPaciente = (...params) =>{
            return $http({
                url: url + 'Buscar_Un_Paciente.php',
                method:'POST',
                data:{'id':params[0]},
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            })
        }
        factory.eliminarPaciente = (...params)=>{
            return $http({
                url: url + 'Eliminar_Paciente.php',
                method:'POST',
                data:{'id':params[0]},
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            })
        }

        factory.actualizarPaciente = (...params) =>{

            return $http({
                url: url + 'Actualizar_Paciente.php',
                method:'POST',
                data:{'id':params[0],'paciente':params[1],'raza':params[2],'peso':params[3],
                    'edad':params[4],'sexo':params[5],'dueno':params[6],'telefono':params[7],
                    'alergias':params[8]},
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            })
        }
        return factory;
    }
    PacienteFactory.$inject = ['$http','$log'];
    angular.module('myApp')
        .factory('PacienteFactory', PacienteFactory);
}())