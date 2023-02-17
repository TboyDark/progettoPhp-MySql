<?php

namespace App\Core\Database;

class QueryBuilder
{
    private $pdo;
    private $serviceTable = 'deliveredServices';
    private $typeTable = 'serviceTypes';

    // deliveredServices parameters

    public $serviceId;
    public $serviceType;
    public $salesData;
    public $quantity;

    //serviceType parameters

    public $typeId;
    public $name;
    public $timeSaved;

    // Construct
    
    public function __construct($db)
    {
        $this->pdo=$db;
    }

    // deliveredServices CRUD

    public function readService()
    {
        $query = "SELECT a.id, a.serviceType, a.salesData, a.quantity FROM " . $this->serviceTable . " a ";
        $stmt = $this->pdo->prepare($query);    
        $stmt->execute();
        return $stmt;
    }
    public function createService()
    {
        $query = "INSERT INTO " . $this->serviceTable . " SET serviceType=:serviceType, salesData=:salesData, quantity=:quantity ";
        $stmt = $this->pdo->prepare($query);

        $this->serviceType = htmlspecialchars(strip_tags($this->serviceType));
        $this->salesData = htmlspecialchars(strip_tags($this->salesData));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));

        $stmt->bindParam(":serviceType",$this->serviceType);
        $stmt->bindParam(":salesData",$this->salesData);
        $stmt->bindParam(":quantity",$this->quantity);
        
        if($stmt->execute()){
            return true;
        }        
        return false;
    }
    public function updateService()
    {
        $query = "UPDATE " . $this->serviceTable . "
        SET 
            serviceType=:serviceType, 
            salesData=:salesData, 
            quantity=:quantity 
        WHERE 
            id=:serviceId";
        $stmt = $this->pdo->prepare($query);

        $this->serviceType = htmlspecialchars(strip_tags($this->serviceType));
        $this->salesData = htmlspecialchars(strip_tags($this->salesData));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->serviceId = htmlspecialchars(strip_tags($this->serviceId));
        $stmt->bindParam(":serviceType",$this->serviceType);
        $stmt->bindParam(":salesData",$this->salesData);
        $stmt->bindParam(":quantity",$this->quantity);
        $stmt->bindParam(":serviceId",$this->serviceId);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function deleteService()
    {
        $query = "DELETE FROM " . $this->serviceTable . " WHERE id=?";
        $stmt = $this->pdo->prepare($query);
        $this->serviceId = htmlspecialchars(strip_tags($this->serviceId));
        $stmt->bindParam(1, $this->serviceId);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function filterType($data)
    {
        $query = "SELECT * FROM ". $this->serviceTable . " WHERE serviceType=". $data ;
        $stmt = $this->pdo->prepare($query);
        $this->serviceType = $data;
        $this->serviceType = htmlspecialchars(strip_tags($this->serviceType));    
        $stmt->execute();
        return $stmt;   
    }
    public function filterDateOfSale($data)   
    {
        $query = "SELECT * FROM ". $this->serviceTable . " WHERE salesData='" . $data ."'";
        $stmt = $this->pdo->prepare($query);
        $this->salesData = $data;
        $this->salesData = htmlspecialchars(strip_tags($this->salesData));           
        $stmt->execute();
        return $stmt;   
    }

    // ServiceTypes CRUD

    public function readType()
    {
        $query = "SELECT a.id, a.name, a.timeSaved FROM " . $this->typeTable . " a ";
        $stmt = $this->pdo->prepare($query);    
        $stmt->execute();
        return $stmt;
    }
    public function createType()
    {
        $query = "INSERT INTO " . $this->typeTable . " SET name=:name, timeSaved=:timeSaved ";
        $stmt = $this->pdo->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->timeSaved = htmlspecialchars(strip_tags($this->timeSaved));

        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":timeSaved",$this->timeSaved);
        $stmt->execute();
        if($stmt->execute()){
            return true;
        }        
        return false;
    }
    public function updateType()
    {
        $query = "UPDATE " . $this->typeTable . "
        SET 
            name=:name, 
            timeSaved=:timeSaved 
        WHERE 
            id=:typeId";
        $stmt = $this->pdo->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->timeSaved = htmlspecialchars(strip_tags($this->timeSaved,));
        $this->typeId = htmlspecialchars(strip_tags($this->typeId));       

        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":timeSaved",$this->timeSaved);
        $stmt->bindParam(":typeId",$this->typeId);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function deleteType()
    {
        $query = "DELETE FROM " . $this->typeTable . " WHERE id=?";
        $stmt = $this->pdo->prepare($query);
        $this->typeId = htmlspecialchars(strip_tags($this->typeId));
        $stmt->bindParam(1, $this->typeId);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function filterSavedTime()
    {
        $query = "SELECT ". "quantity, timeSaved"." FROM " . $this->typeTable . " LEFT JOIN deliveredServices ON serviceTypes.id = deliveredServices.servicetype ORDER BY quantity";
        $stmt = $this->pdo->prepare($query);    
        $stmt->execute();
        return $stmt;     
    }
    
}