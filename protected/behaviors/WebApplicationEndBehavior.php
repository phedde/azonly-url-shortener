<?php
class WebApplicationEndBehavior extends CBehavior
{
	private $_endName;

	public function getEndName()
	{
		return $this->_endName;
	}

	public function runEnd($name)
	{
		$this->_endName = $name;
		$this->onModuleCreate = array($this, 'changeModulePaths');
		$this->onModuleCreate(new CEvent ($this->owner));
		$this->owner->run();
	}

	public function onModuleCreate($event)
	{
		$this->raiseEvent('onModuleCreate', $event);
	}

	protected function changeModulePaths($event)
	{
		//VarDumper::dump($event);
		$event->sender->controllerPath .= DIRECTORY_SEPARATOR.$this->_endName;
		$event->sender->viewPath .= DIRECTORY_SEPARATOR.$this->_endName;
		//echo $event->sender->controllerPath. ' '. $event->sender->viewPath;
	}
}
