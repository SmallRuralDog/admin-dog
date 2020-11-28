<?php


namespace SmallRuralDog\AdminDog\Traits;


interface AdminDogResource
{
    public function index();

    public function create();

    public function store();

    public function show();

    public function edit();

    public function update();

    public function destroy();

    public function form();

}
