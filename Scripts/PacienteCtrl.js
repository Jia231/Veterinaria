/**
 * Created by Jia Ming Liou on 3/27/2017.
 */

(function () {

    function PacienteCtrl($scope,$log,PacienteFactory,$routeParams) {
        $scope.pacientes = [];
        $scope.currentPage = 0;
        $scope.pageSize = 2;
         $scope.agregarPaciente = () => {
            var paciente = $scope.nombre;
            var raza = $scope.raza;
            var peso = $scope.peso;
            var edad = $scope.edad;
            var sexo = $scope.sexo;
            var dueno = $scope.dueno;
            var telefono = $scope.tel;
            var alergias = $scope.alergias;
            PacienteFactory.agregarUnPaciente(paciente,raza,peso,edad,sexo,dueno,telefono,alergias)
                .success(function(data){
                    $log.info(data)
                    if (data == true){
                        $log.info('Record successfully added.')
                    }
                })
                .error(function(data){
                    $log.info(data)
                    $log.info('Error ocurred')
                })
        }
        $scope.numberOfPages=function(){
            return Math.ceil($scope.pacientes.length/$scope.pageSize);
        }
        $scope.mostrarPacientes = ()=>{
             PacienteFactory.mostrarPacientes()
                 .success((data)=>{

                 var datos = data;

                 for (var i=0; i<datos.length; i++) {
                    $scope.pacientes.push(datos[i]);
                 }

             })
                .error((data)=>{
                 $log.info(data);
            })
        }
        $scope.buscarPaciente = () =>{
            var texto = $scope.search;
            PacienteFactory.buscarPaciente(texto)
                .success((data)=>{
                $log.info(data)
                $scope.pacientes = data;
                $scope.search = "";
            })
                .error((data)=>{
                $log.info(data)
        })

        }
        $scope.redirect = (x) =>{
            var text = '#/Editar_Paciente/'+x;
            location.href=text;
        }

        $scope.cargarPaciente = () =>{
            PacienteFactory.buscarUnPaciente($routeParams.id)
                .success((item)=>{
                $log.info(item);
                $scope.raza = item[0].raza;
                $scope.peso = item[0].peso;
                $scope.edad = item[0].edad;
                $scope.dueno = item[0].dueno;
                $scope.tel = Number(item[0].telefono);
                $scope.alergias = item[0].alergias;
                $scope.sexo = item[0].sexo.toLowerCase();
                $scope.nombre = item[0].paciente;
            })
                .error((data)=>{
                $log.info(data)
            })
        }

        $scope.actualizarPaciente = () => {
            var id = $routeParams.id;
            var paciente = $scope.nombre;
            var raza = $scope.raza;
            var peso = $scope.peso;
            var edad = $scope.edad;
            var sexo = $scope.sexo;
            var dueno = $scope.dueno;
            var telefono = $scope.tel;
            var alergias = $scope.alergias;
            //$log.info(id,paciente,raza,peso,edad,sexo,dueno,telefono,alergias)
            PacienteFactory.actualizarPaciente(id,paciente,raza,peso,edad,sexo,dueno,telefono,alergias)
                .success((data)=>{
                $('.exito_msg').show();
                setTimeout(function(){
                    location.href='#/';
                },5000)
            })
                .error((data)=>{

            })

        }
        $scope.eliminarUnPaciente = (x)=>{
            var id = x;
            PacienteFactory.eliminarPaciente(id)
                .success((data)=>{
                $log.info(data);
            setTimeout(function(){
                location.href='#/';
            },5000)
        })
        .error((data)=>{
                $log.info(data);
        })

        }
    }

    function startFrom(){
        return function(input,start){
            start = + start;
            return input.slice(start);
        }
    }

    PacienteCtrl.$inject = ['$scope','$log','PacienteFactory','$routeParams'];
    angular.module('myApp')
        .controller('PacienteCtrl', PacienteCtrl);
    angular.module('myApp')
        .filter('startFrom',startFrom);
}())