<?php

namespace MolecularCore;

class Application
{
    private $core;

    public function __construct()
    {
        $this->core = new Core();
    }

    public function addMolecule($molecule)
    {
        $this->core->addMolecule($molecule);
    }

    public function setConfig($conf, $value = null)
    {
        $this->core->setConfig($conf, $value);
    }

    public function getConfig($conf)
    {
        return $this->core->getConfig($conf);
    }

    public function run()
    {
        $this->core->run();
    }
}
