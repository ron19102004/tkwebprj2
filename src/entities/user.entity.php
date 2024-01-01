<?php
class User 
{
    public $id;
    public $firstName;
    public $lastName;
    public $phoneNumber;
    public $email;
    public $address;
    public $vip;
    public $deleted;
    public $avatar;
    public $role;
    public $password;

    const ENTITY_NAME = 'users';
    const FILLABLE = 'id,firstName, lastName, phoneNumber, email, address, vip, avatar, role, password';

    public function import_form($firstName, $lastName, $phoneNumber, $email, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->password = Validator::hashPassword($password);
    }
    public function importDb($data) {
        $this->id = $data['id'];
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->email = $data['email'];
        $this->address = $data['address'];
        $this->vip = $data['vip'];
        $this->deleted = $data['deleted'];
        $this->avatar = $data['avatar'];
        $this->role = $data['role'];
        $this->password = $data['password'];
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'phoneNumber' => $this->phoneNumber,
            'email' => $this->email,
            'address' => $this->address,
            'vip' => $this->vip,
            'deleted' => $this->deleted,
            'avatar' => $this->avatar,
            'role' => $this->role,
        ];
    }

    public function toArrayUpdate()
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'phoneNumber' => $this->phoneNumber,
            'email' => $this->email,
            'address' => $this->address,
            'vip' => $this->vip,
            'avatar' => $this->avatar,
            'role' => $this->role,
        ];
    }

    public function toArraySave()
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'phoneNumber' => $this->phoneNumber,
            'email' => $this->email,
            "password" => $this->password,
        ];
    }
}
