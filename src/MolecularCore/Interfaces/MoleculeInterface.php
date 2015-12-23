<?php

namespace MolecularCore\Interfaces;

interface MoleculeInterface
{
    public function register(\MolecularCore\Core &$app);

    public function run();
}
