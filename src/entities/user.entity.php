<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/ibase.entity.php");

class User implements IEntityBase
{
    public $id;
    private $firstName;
    private $lastName;
    private $phoneNumber;
    private $email;
    private $address;
    private $vip;
    private $deleted;
    private $avatar;
    private $role;
    private $password;

    const ENTITY_NAME = 'users';
    const FILLABLE = 'firstName, lastName, phoneNumber, email, address, vip, avatar, role, password';

    public function import_form($firstName, $lastName, $phoneNumber, $email, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->password = Validator::hashPassword($password);
    }
    public function importdb(
        $id,
        $firstName,
        $lastName,
        $phoneNumber,
        $email,
        $address,
        $vip,
        $deleted,
        $avatar,
        $role,
        $password
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->address = $address;
        $this->vip = $vip;
        $this->deleted = $deleted;
        $this->avatar = $avatar;
        $this->role = $role;
        $this->password = $password;
    }
    public function __construct()
    {
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
