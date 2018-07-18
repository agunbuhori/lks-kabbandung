<?php

class Controller extends Database
{
	protected function view($file, $data = [])
	{
		if ($data) {
			extract($data);
		}
		
		require PATH."app/views/".$file.".php";
	}

	protected function model($file)
	{
		require PATH."app/models/".$file.".php";

		$this->{$file} = new $file;

		return $this;
	}
}