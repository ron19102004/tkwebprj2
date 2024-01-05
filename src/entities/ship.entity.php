<?php 
class Ship {
    public $id;
    public $address;
    public $phoneNumber;
    public $id_user;
    public $deleted;
    const ENTITY_NAME = 'ships';
    const FILLABLE = 'ships.id, ships.address,ships.phoneNumber,ships.id_user,ships.deleted';

    public function import_form($address, $phoneNumber, $id_user,$deleted) {
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->id_user = $id_user;
        $this->deleted = $deleted;
    }

    public function importDb($data) {
        $this->id = $data['id'];
        $this->address = $data['address'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->id_user = $data['id_user'];
        $this->deleted = $data['deleted'];
    }
    public function toArray() {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'phoneNumber' => $this->phoneNumber,
            'id_user' => $this->id_user,
            'deleted'=> $this->deleted
        ];
    }

    public function toArraySave() {
        return [
            'address' => $this->address,
            'phoneNumber' => $this->phoneNumber,
            'id_user' => $this->id_user,
        ];
    }

    public function toArrayUpdate() {
        return [
            'address' => $this->address,
            'phoneNumber' => $this->phoneNumber,
            'deleted'=> $this->deleted
        ];
    }
}