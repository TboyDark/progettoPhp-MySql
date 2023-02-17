<?php

namespace App\Controllers;
use App\Core\Database\{Connection, QueryBuilder};
use PDO;



class DeliveredServicesController
{
    public function createService()
    {
        $db = Connection::make();
        var_dump($db);
        $deliveredService = new QueryBuilder($db);
        var_dump($deliveredService);
        $data = json_decode(file_get_contents("php://input"));
        if( !empty($data->serviceType) && !empty($data->salesData) && !empty($data->quantity)){
            $deliveredService->serviceType = $data->serviceType;
            $deliveredService->salesData = $data->salesData;
            $deliveredService->quantity = $data->quantity;
            if($deliveredService->createService()){
                http_response_code(201);
                echo json_encode(array("message"=>"Service created successfuly."));
            }else{
                http_response_code(503);
                echo json_encode(array("message"=>"Impossible to create the Service."));
            }
        }else {
            http_response_code(404);
            echo json_encode(array("message"=>"Impossible to create the Service, the data are incomplete."));
        }
    }

    public function readService()
    {
        $db = Connection::make();

        $deliveredService = new QueryBuilder($db);

        $stmt = $deliveredService->readService();
        $num = $stmt->rowCount();

        if($num>0){
            $deliveredService_arr = array();
            $deliveredService_arr['records'] = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $delivered_item = array(
                    'id'=>$id,
                    'serviceType'=>$serviceType,
                    'salesData'=>$salesData,
                    'quantity'=>$quantity
                );
                array_push($deliveredService_arr['records'], $delivered_item);
            }
            echo json_encode($deliveredService_arr);
        }else{
            http_response_code(404);
            echo json_encode(array('message'=>"No Service found."));
        }
    }

    public function updateService()
    {
        $db = Connection::make();
        $deliveredService = new QueryBuilder($db);

        $data = json_decode(file_get_contents("php://input"));

        $deliveredService->serviceType = $data->serviceType;
        $deliveredService->salesData = $data->salesData;
        $deliveredService->quantity = $data->quantity;
        $deliveredService->serviceId = $data->serviceId;

        if($deliveredService->updateService()){
            http_response_code(200);
            echo json_encode(array("answer"=>"Service Updated"));
        }else{
            http_response_code(503);
            echo json_encode(array("answer"=>"Impossible to update the Service"));
        }
    }

    public function deleteService()
    {
        $db = Connection::make();
        $deliveredService = new QueryBuilder($db);

        $data = json_decode(file_get_contents("php://input"));

        $deliveredService->serviceId = $data->serviceId;

        if($deliveredService->deleteService()){
            http_response_code(200);
            echo json_encode(array("answer"=>"The Service has been deleted."));
        }else{
            http_response_code(503);
            echo json_encode(array("answer"=>"Impossible to delete the Service."));
        }
    } 

    public function filterType()
    {
        $db = Connection::make();
        $delivered = new QueryBuilder($db);

        $data = json_decode(file_get_contents("php://input"));
        $stringType = $data->serviceType;
        $stmt = $delivered->filterType($stringType);
        $num = $stmt->rowCount();

        if($num>0){
            $delivered_arr = array();
            $delivered_arr['records'] = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $delivered_item = array(
                    'serviceIid'=>$serviceId,
                    'serviceType'=>$serviceType,
                    'salesData'=>$salesData,
                    'quantity'=>$quantity
                );
                array_push($delivered_arr['records'], $delivered_item);
            }
            echo json_encode($delivered_arr);
        }else{
            http_response_code(404);
            echo json_encode(array('message'=>"No Service Found."));
        }
    }

    public function filterDateOfSale()
    {
        $db = Connection::make();
        $delivered = new QueryBuilder($db);

        $data = json_decode(file_get_contents("php://input"));
        $stringType = $data->salesData;
        $stmt = $delivered->filterDateOfSale($stringType);
        $num = $stmt->rowCount();

        if($num>0){
            $delivered_arr = array();
            $delivered_arr['records'] = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $delivered_item = array(
                    'serviceIid'=>$serviceId,
                    'serviceType'=>$serviceType,
                    'salesData'=>$salesData,
                    'quantity'=>$quantity
                );
                array_push($delivered_arr['records'], $delivered_item);
            }
            echo json_encode($delivered_arr);
        }else{
            http_response_code(404);
            echo json_encode(array('message'=>"No Service Found."));
        }
    }
}