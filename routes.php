<?php

use App\Core\Router;

$router = new Router();
$router->get('ProgettoPHPeMySQL/deliveredServices', 'DeliveredServicesController@readService');
$router->get('ProgettoPHPeMySQL/serviceTypes', 'ServicesTypeController@readType');

$router->post('ProgettoPHPeMySQL/addService', 'DeliveredServicesController@createService');
$router->post('ProgettoPHPeMySQL/addType', 'ServicesTypeController@createType');

$router->put('ProgettoPHPeMySQL/updateService', 'DeliveredServicesController@updateService');
$router->put('ProgettoPHPeMySQL/updateType', 'ServicesTypeController@updateType');

$router->delete('ProgettoPHPeMySQL/deleteService', 'DeliveredServicesController@deleteService');
$router->delete('ProgettoPHPeMySQL/deletesType', 'ServicesTypeController@deleteType');

$router->post('ProgettoPHPeMySQL/filterType', 'DeliveredServicesController@filterType');
$router->post('ProgettoPHPeMySQL/filterDate', 'DeliveredServicesController@filterDate');
$router->get('ProgettoPHPeMySQL/filterSavedTime', 'ServicesTypeController@filterSavedTime');
