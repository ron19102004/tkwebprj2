<?php 
class Ship {
    public $id;
    public $address;
    public $phoneNumber;
    public $id_user;
    const ENTITY_NAME = 'ships';
    const FILLABLE = 'id, address,phoneNumber,id_user';

    public function import_form($address, $phoneNumber, $id_user) {
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->id_user = $id_user;
    }

    public function importDb($data) {
        $this->id = $data['id'];
        $this->address = $data['address'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->id_user = $data['id_user'];
    }
    public function toArray() {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'phoneNumber' => $this->phoneNumber,
            'id_user' => $this->id_user,
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
        ];
    }
}