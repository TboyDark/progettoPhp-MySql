<?php

namespace App\Controllers;
use App\Core\Database\{Connection, QueryBuilder};
use PDO;


class ServicesTypeController
{
    public function createType()
    {
        $db = Connection::make();
        $servicetypes = new QueryBuilder($db);
        $data = json_decode(file_get_contents("php://input"));
        if( !empty($data->name) && !empty($data->timeSaved)){
            $servicetypes->name = $data->name;
            $servicetypes->timeSaved = $data->timeSaved;
            if($servicetypes->createType()){
                http_response_code(201);
                echo json_encode(array("message"=>"service type created successfuly."));
            }else{
                http_response_code(503);
                echo json_encode(array("message"=>"Impossible to create a service type."));
            }
        }else {
        http_response_code(404);
        echo json_encode(array("message"=>"Impossible to create a service type, the data are incomplete."));
        }

    }

    public function readType()
    {
        $db = Connection::make();

        $servicetype = new QueryBuilder($db);

        $stmt = $servicetype->readType();
        $num = $stmt->rowCount();

        if($num>0){
            $tipologie_arr = array();
            $tipologie_arr['records'] = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $servicetype_item = array(
                    'id'=>$id,
                    'name'=>$name,
                    'timeSaved'=>$timeSaved
                );
                array_push($tipologie_arr['records'], $servicetype_item);
            }
            echo json_encode($tipologie_arr);
        }else{
            http_response_code(404);
            echo json_encode(array('message'=>"No service type Found."));
        }
    }

    public function updateType()
    {
        $db = Connection::make();
        $serviceType = new QueryBuilder($db);

        $data = json_decode(file_get_contents("php://input"));

        $serviceType->name = $data->name;
        $serviceType->timeSaved = $data->timeSaved;
        $serviceType->typeId = $data->typeId;

        if($serviceType->updateType()){
            http_response_code(200);
            echo json_encode(array("answer"=>"service type updated"));
        }else{
            http_response_code(503);
            echo json_encode(array("answer"=>"Impossible to update service type"));
        }
    }

    public function deleteType()
    {
        $db = Connection::make();
        $servicetypes = new QueryBuilder($db);

        $data = json_decode(file_get_contents("php://input"));

        $servicetypes->typeId = $data->typeId;

        if($servicetypes->deleteType()){
            http_response_code(200);
            echo json_encode(array("answer"=>"The service type has been deleted successfuly."));
        }else{
            http_response_code(503);
            echo json_encode(array("answer"=>"Impossible to eliminate the service type."));
        }
    }

    public function filterSavedTime()
    {
        $db = Connection::make();

        $servicetype = new QueryBuilder($db);


        $stmt = $servicetype->filterSavedTime();
        $num = $stmt->rowCount();

        if($num>0){
            $savedHours_arr = array();    
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $oreItem = array(
                    "time saved"=> $timeSaved,
                    "quantity"=> $quantity);        
                array_push($savedHours_arr, $oreItem);
            }
            $totalHours_arr = array();    
            foreach($savedHours_arr as $savedHoursItem){
                $result = $savedHoursItem['time saved'] * $savedHoursItem['quantity'];
                array_push($totalHours_arr, $result);
            }
            echo "Total hours saved by the users:  " . array_sum($totalHours_arr) . " Hours";
        }else{
            echo json_encode(array('message'=>"No servicetype found."));
        }
    }

}