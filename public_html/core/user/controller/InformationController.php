<?php

namespace core\user\controller;

use core\admin\model\Model;
use core\base\controller\BaseController;


class InformationController extends BaseUser
{

	protected function inputData()
	{
		// Выпуск №120
		parent::inputData();

		$data = [];

		if (!empty($this->menu['information'])) {

			foreach ($this->menu['information'] as $item) {

				if ($item['alias'] === ($this->parameters['alias'])) {

					$data['name'] = $item['name'];
					$data['content'] = $item['content'];
				}
			}
		}

		$title = $data['name'] . ". Уголь, дрова, строительные сыпучие материалы в Донецке, Макеевке в ТДК УГЛЕТРАКТ";
		$description = "На сайте компании ТДК УГЛЕТРАКТ Вы можете заказать уголь любых марок, дрова, песок, шлак, щебень, цемент от производителя по лучшей цене в ДНР. Заходите на сайт в удобное для Вас время, выбирайте необходимый товар из широкого ассортимента, оформляйте заказ и мы доставим его по адресу. Мы экономим ваше время, средства и заинтересованы в дальнейшем сотрудничестве. Полезная информация на странице — " . $data['name'];
		$keywords = $data['name'] . ", уголь, антрацит, песок, щебень, шлак, цемент, дрова, Донецк, Макеевка, ДНР, ЛНР";

		return compact('data', 'title', 'description', 'keywords');
	}
}
