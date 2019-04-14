<?php
class userController extends Controller{

	public $title = 'No Waste';

	protected $composants = array{
		'form'
	};

	public function create()
	{
		if($this->Use->validate())
		{
			echo'ok';
		}
		return $this->render('create', compact('data'));
	}

	public function update($id)
	{
		echo 'modifier le profil n°'.%id;
		$this->render('update');
	}

	public function show()
	{
		echo 'mon profil';
	}
}