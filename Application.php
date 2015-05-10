<?php
	namespace MolecularCore;
	class Application{
		private $core;
		public function __construct(){
			$this->core = new Core();
		}
		
		public function addMolecule($molecule){
			$this->core->addMolecule($molecule);
		}
		
		public function run(){
			$this->core->run();
		}
	}