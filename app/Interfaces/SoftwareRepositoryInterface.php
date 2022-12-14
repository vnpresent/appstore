<?php
namespace App\Interfaces;

interface SoftwareRepositoryInterface
{
    public function index();
    public function store(array $data);
    public function update(array $data,$id);
    public function show($id);
    public function delete($id);
}
