<?php 

class MeserosController extends AppController
{
	public $helpers = array('Html','Form');
	public $components = array('Session');
	

	public function index()
	{
		$this -> set('meseros', $this -> Mesero -> find('all'));
	}



	//Ver detalles
	public function ver($id = null)
	{
		if (!$id){
			throw new NotFoundException('Datos inválidos');			
		}

		$mesero = $this -> Mesero -> findById($id);

		if (!$mesero) {
			throw new NotFoundException('Mesero inexistente');		
		}

		$this->set('mesero', $mesero);

	}

	public function nuevo()
	{
		if ($this->request->is('post'))
		{
			$this->Mesero->create();
			if ($this->Mesero->save($this->request->data))
			{
				 $this->Flash->set('Mesero creado');
				return $this->redirect(array('action'=>'index'));
			}

			$this->Session->setFlash('No se pudo crear el mesero');

		}
	}

	//Edicion de datos
	public function editar($id = null)
	{
		if (!$id) {
			throw new NotFoundException("Dato inválido");
			
		}

		$mesero = $this->Mesero->findById($id);
		if (!$mesero) {
			throw new NotFoundException("Mesero no encontrado");
			
		}

		if($this->request->is('post','put'))
		{
			$this->Mesero->id = $id;

			if ($this->Mesero->save($this->request->data)) {
				 $this->Flash->set('Datos editados');
				return $this->redirect(array('action'=>'index'));
			}
		}

		if (!$this->request->data) {
			$this->request->data = $mesero;
		}
	}

	public function eliminar($id)
	{
		if ($this->request->is('get')) {
 			throw new MethodNotAllowedException("Incorrecto");
 		}

 		if ($this->Mesero->delete($id)) {
 			 $this->Flash->set('Eliminado');
 			 return $this -> redirect(array('action' => 'index'));
 		}else{
 			 $this->Flash->set('No ha sido Eliminado');
 			 return $this -> redirect(array('action' => 'index'));
 		}
	}

}
 ?>