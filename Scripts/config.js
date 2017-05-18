/**
 * Created by Jia Ming Liou on 3/19/2017.
 */

(function () {
    angular.module('myApp')
        .config(function ($routeProvider) {
            var baseUrl = "View/"
            $routeProvider
                .when('/', {
                    controller: "",
                    templateUrl:baseUrl + "Index.html"
                })
                .when('/Agregar_Cita',{
                    controller:"",
                    templateUrl:baseUrl + "Agregar_Cita.html"
                })
                .when('/Agregar_Paciente',{
                    controller:"",
                    templateUrl:baseUrl + "Agregar_Paciente.html"
                })
                .when('/Mostrar_Pacientes',{
                    controller:"PacienteCtrl",
                    templateUrl:baseUrl + "Mostrar_Pacientes.html"
                })
                .when('/Editar_Paciente/:id',{
                    controller:"",
                    templateUrl:baseUrl + "Editar_Paciente.html"
                })
                .when('/Mostrar_Citas',{
                    controller:"CitaCtrl",
                    templateUrl:baseUrl + "Mostrar_Citas.html"
                })
                .when('/Editar_Cita/:id',{
                    controller:"",
                    templateUrl:baseUrl + "Editar_Cita.html"
                })
                .otherwise({
                    redirectTo: '/'
                })
        })
}())