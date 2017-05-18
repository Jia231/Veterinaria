/**
 * Created by Jia Ming Liou on 3/19/2017.
 */
(function() {

    function CitaCtrl($scope,$q,$timeout,$log,$http,CitaFactory,$routeParams) {

        this.myDate = new Date();
        this.minDate = new Date();
        this.isOpen = false;
        $scope.currentPage1 = 0;
        $scope.pageSize1 = 2;
        $scope.age;
        $scope.citas = [];
        $scope.fecha = new Date();
        $scope.diagnostico = 'N/A';
        $scope.Person = [];

        $scope.numberOfPages1 = function () {
            return Math.ceil($scope.citas.length / $scope.pageSize1);
        }
        $scope.searchText = "";

        $scope.selectedItem = [];
        $scope.isDisabled = false;
        $scope.noCache = false;

        $scope.eliminarUnaCita = (x)=>{
            var id = x;
            CitaFactory.eliminiarCita(id)
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

        $scope.selectedItemChange = function (item) {
            if (item != undefined) {
                $scope.raza = item.raza;
                $scope.peso = item.peso;
                $scope.edad = item.edad;
                $scope.dueno = item.dueno;
                $scope.tel = Number(item.telefono);
                $scope.alergias = item.alergias;
                $scope.sexo = item.sexo;
                $scope.paciente = item.nombre;
                //$log.info('Item changed to ' + JSON.stringify(item));
                //console.log('Item changed to ' + JSON.stringify(item))
            }
        }
        $scope.searchTextChange = function () {

            $log.info($scope.searchText);
            $http({
                url: 'PHP/Controller/Filtrar_Paciente.php',
                method: 'POST',
                data: {'texto': $scope.searchText},
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })

                .success(function (response) {
                    $scope.Person = response;
                });


        }

            $scope.actualizarCita = ()=>{
            $log.info('Guardando cita')
            var paciente = $scope.searchText;
            var raza = $scope.raza;
            var edad = $scope.edad;
            var sexo = $scope.sexo;
            var fecha = $scope.fecha;
            var fecha_cita = fecha.toDateString().split('T');
            var dueno = $scope.dueno;
            var peso = $scope.peso;
            var telefono = $scope.tel;
            var parasito = $scope.parasito;
            var alergias = $scope.alergias;
            var diagnostico = $scope.diagnostico;
            var tratamiento = $scope.tratamiento;
            var hora = $scope.hora;
            var id = $routeParams.id;
            CitaFactory.actualizarUnaCita(id,paciente, raza, peso, edad, sexo, dueno, telefono, alergias, tratamiento, parasito, fecha_cita[0], diagnostico, hora)
                .success((data)=>{
                $log.info(data)
                $('.exito_msg').show();
            setTimeout(function(){
                location.href='#/';
            },5000)
            })
                .error((data)=>{
                $log.info(data);
            })
        }
        $scope.Guardar = () =>
        {
            var paciente = $scope.searchText;
            var raza = $scope.raza;
            var edad = $scope.edad;
            var sexo = $scope.sexo;
            var fecha = $scope.fecha;
            var fecha_cita = fecha.toDateString().split('T');
            var dueno = $scope.dueno;
            var peso = $scope.peso;
            var telefono = $scope.tel;
            var parasito = $scope.parasito;
            var alergias = $scope.alergias;
            var diagnostico = $scope.diagnostico;
            var tratamiento = $scope.tratamiento;
            var hora = $scope.hora;
            //$log.info('Se va a guardar!')
            CitaFactory.guadarCita(paciente, raza, peso, edad, sexo, dueno, telefono, alergias, tratamiento, parasito, fecha_cita[0], diagnostico, hora)
                .success((data) => {
                $log.info(data);
        }).error((data) => {
                $log.info(data);
        })


        }


        $scope.redirect = (x) =>
        {
            var text = '#/Editar_Cita/' + x;
            location.href = text;
        }

        $scope.mostarTodasCitas = () =>
        {
            CitaFactory.mostarCitas()
                .success((data) => {
                var datos = data;

            for (var i = 0; i < datos.length; i++) {
                $scope.citas.push(datos[i]);
            }
        }).error((data) => {
                $log.info(data);
        })
        }
        $scope.cargarCita = () =>
        {
            $log.info('Buscar una cita')
            CitaFactory.buscarUnaCita($routeParams.id)
                .success((item) => {
                $log.info(item);
                $scope.searchText = item[0].paciente;
            $scope.raza = item[0].raza;
             $scope.peso = item[0].peso;
             $scope.edad = item[0].edad;
             $scope.dueno = item[0].dueno;
             $scope.tel = Number(item[0].telefono);
             $scope.alergias = item[0].alergias;
             $scope.sexo = item[0].sexo.toLowerCase();
             $scope.nombre = item[0].paciente;
             $scope.tratamiento = item[0].tratamiento;
             $scope.parasito = item[0].parasito;
             $scope.hora =  item[0].hora;
             $scope.fecha = new Date(item[0].fecha);
            $log.info(item[0].fecha)
             $scope.diagnostico = item[0].diagnostico;

        }).error((data) => {
                $log.info(data)
        })
        }
    }


    function startFrom1(){
        return function(input,start){
            start = + start;
            return input.slice(start);
        }
    }


    CitaCtrl.$inject = ['$scope','$q','$timeout','$log','$http','CitaFactory','$routeParams'];
    angular.module('myApp')
        .controller('CitaCtrl', CitaCtrl);
    angular.module('myApp')
        .filter('startFrom1',startFrom1);
}())