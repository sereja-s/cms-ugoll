<?php

namespace core\user\controller;

use core\admin\model\Model;
use core\base\controller\BaseController;


class ArboristicsController extends BaseUser
{

	protected function inputData()
	{
		// Выпуск №120
		parent::inputData();

		$section_top = $this->model->get('section_top', ['limit' => 1]);

		$section_top = $section_top[0];

		$questions = $this->model->get('questions', [
			'where' => ['visible' => 1],
			'order' => ['menu_position'],
		]);

		$services = $this->model->get('services', [
			'where' => ['visible' => 1],
			'order' => ['menu_position'],
			'limit' => 21
		]);

		$title = "Вырубка деревьев Донецк Макеека ДНР | ТДК УГЛЕТРАКТ";
		$description = "В ТДК УГЛЕТРАКТ Вы можете заказать удаление, спил, вырубку и обрезку деревьев в Донецке, Макеевке.";

		$keywords = "Вырубка, дерево, спил, обрезка, Донецк, Макеевка, ДНР, ЛНР";

		return compact('section_top', 'questions', 'services', 'title', 'description', 'keywords');
	}
}
