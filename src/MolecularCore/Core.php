<?php
	namespace MolecularCore;
	class Core {
		private $molecules =[];
		public $request;
		
		public function __construct(){
			$this->request = new Request();
		}
		
		public function addMolecule($molecule){
			foreach($molecule as $k => $v){
				$this->registerMolecule($k,$v);
			}
		}
		
		private function registerMolecule($alias,$molecule){
			class_alias($molecule,$alias);
			$atom = new $alias();
			$atom->register($this);
			$this->molecules[$alias] = $atom;			
		}
		
		public function run(){
			foreach($this->molecules as $molecule ){
				$molecule->run();
			}
		}
	}