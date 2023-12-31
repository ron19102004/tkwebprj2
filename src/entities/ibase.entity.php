<?php
interface IEntityBase{
    public function toArray();
    public function toArrayUpdate();
    public function toArraySave();
}