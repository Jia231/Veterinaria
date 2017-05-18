/**
 * Created by Jia Ming Liou on 3/27/2017.
 */
(function(){
    var CitaFactory = function ($http,$log){
        let url = "PHP/Controller/";
        var factory = {};
        factory.guadarCita = (...params) =>{
            return $http({
                url: url + 'Crear_Cita.php',
                method:'POST',
                data:{'paciente':params[0],'raza':params[1],'peso':params[2],
                    'edad':params[3],'sexo':params[4],'dueno':params[5],'telefono':params[6],
                    'alergias':params[7],'tratamiento':params[8],'parasito':params[9],'fecha':params[10],'diagnostico':params[11],'hora':params[12]},
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            })
        }
        factory.mostarCitas = ()=>{
            return $http.get(url + 'VerTodosCitas.php');
        }
        factory.actualizarUnaCita = (...params) => {
            return $http({
                url: url + 'Actualizar_Cita.php',
                method:'POST',
                data:{'id':params[0],'paciente':params[1],'raza':params[2],'peso':params[3],
                    'edad':params[4],'sexo':params[5],'dueno':params[6],'telefono':params[7],
                    'alergias':params[8],'tratamiento':params[9],'parasito':params[10],'fecha':params[11],'diagnostico':params[12],'hora':params[13]},
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            })
        }
        factory.eliminiarCita = (...params)=>{
            return $http({
                url: url + 'Eliminar_Cita.php',
                method:'POST',
                data:{'id':params[0]},
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            })
        }
        factory.buscarUnaCita = (...params) =>{

            return $http({
                url: url + 'Buscar_Una_Cita.php',
                method:'POST',
                data:{'id':params[0]},
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            })
        }

        return factory;
    }
    CitaFactory.$inject = ['$http','$log'];
    angular.module('myApp')
        .factory('CitaFactory', CitaFactory);
}())