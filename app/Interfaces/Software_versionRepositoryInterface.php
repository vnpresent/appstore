<?php
namespace App\Interfaces;

interface Software_versionRepositoryInterface
{
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);
}
