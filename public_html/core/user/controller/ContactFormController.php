<?php

namespace core\user\controller;

use core\base\model\UserModel;
use core\user\helpers\ValidationHelper;

class ContactFormController extends BaseUser
{

	use ValidationHelper;

	protected function inputData()
	{
		parent::inputData();

		if ($this->isPost()) {

			$this->contactForm();
		}
	}

	protected function contactForm()
	{

		if (empty($_POST)) {

			$this->sendError('Отсутствуют данные пользователя для обратной связи');
		}

		// валидационный массив:
		$validation = [

			'name' => [

				'translate' => 'Ваше имя', // перевод поля формы
				'methods' => ['emptyField', 'russianField'] // методы ожидаемые от валидатора для обработки поля
			],
			'phone' => [

				'translate' => 'Телефон',
				'methods' => ['emptyField', 'phoneField', 'numericField']
			],
			'email' => [

				'translate' => 'E-mail',
				'methods' => ['emptyField', 'emailField']
			],
			'info' => [

				'translate' => 'Сообщение',
				'methods' => ['russianField']
			]

		];

		$messageContactForm = [];

		// массив для посетителей:
		$visitorContactForm  = [];

		$columnsMessagesContactForm = $this->model->showColumns('messages_contact_form');

		$columnsVisitorsContactForm = $this->model->showColumns('visitors_contact_form');

		foreach ($_POST as $key => $item) {

			if (!empty($validation[$key]['methods'])) {

				foreach ($validation[$key]['methods'] as $method) {

					$_POST[$key] = $item = $this->$method($item, $validation[$key]['translate'] ?? $key);
				}
			}

			if (!empty($columnsMessagesContactForm[$key])) {

				$messageContactForm[$key] = $item;
			}

			if (!empty($columnsVisitorsContactForm[$key])) {

				$visitorContactForm[$key] = $item;
			}
		}

		// Выпуск №149 | Пользовательская часть | сохранение заказа
		if (empty($visitorContactForm['email']) && empty($visitorContactForm['phone'])) {

			$this->sendError('Отсутствуют данные пользователя для обратной связи');
		}

		$visitorsWhere = $visitorsCondition = [];

		if (!empty($visitorContactForm['email']) && !empty($visitorContactForm['phone'])) {

			$visitorsWhere = [
				'email' => $visitorContactForm['email'],
				'phone' => $visitorContactForm['phone']
			];

			$visitorsCondition = ['OR'];
		} else {

			$visitorsKey = !empty($visitorContactForm['email']) ? 'email' : 'phone';

			$visitorsWhere[$visitorsKey] = $visitorContactForm[$visitorsKey];
		}

		$resVisitor = $this->model->get('visitors_contact_form', [
			'where' => $visitorsWhere,
			'condition' => $visitorsCondition,
			'limit' => 1
		]);

		if ($resVisitor) {

			$resVisitor = $resVisitor[0];

			$messageContactForm['visitors_id'] = $resVisitor['id'];
		} else {

			$messageContactForm['visitors_id'] = $this->model->add('visitors_contact_form', [
				'fields' => $visitorContactForm,
				'return_id' => true // указали ключ, чтобы вернулся
			]);
		}


		$messageContactForm['id'] = $this->model->add('messages_contact_form', [
			'fields' => $messageContactForm,
			'return_id' => true
		]);


		if (!$messageContactForm['id']) {

			$this->sendError('Ваше сообщение не удалось отправить. Свяжитесь с администрацией сайта по телефону - ' . $this->set['phone']);
		}


		// если у нас не было такого пользователя и мы его добавляли
		/* if (!$resVisitor) {

			UserModel::instance()->checkUser($messageContactForm['visitors_id']);
		} */

		$this->sendSuccess('Спасибо за то что обратились в ТДК УГЛЕТРАКТ! В ближайшее время наш специалист свяжется с Вами для уточнения деталей');

		$this->sendOrderEmail(['messageContactForm' => $messageContactForm]);

		$this->redirect();

		//$a = 1;
	}

	protected function sendOrderEmail(array $orderData)
	{
		// Интернет магазин с нуля на php Выпуск №151 | Пользовательская часть | подготовка почтовых шаблонов
		$dir = TEMPLATE . 'include/contactFormTemplates/';

		$templatesArr = [];

		if (is_dir($dir)) {

			$list = scandir($dir);

			foreach ($orderData as $name => $item) {

				// используем поиск в массиве по регулярному выражению
				if ($file = preg_grep('/^' . $name . '\./', $list)) {

					$file = array_shift($file);


					$template = file_get_contents($dir . $file);


					/* if (!is_numeric(key($item))) { */

					$templatesArr[] = $this->renderOrderMailTemplate($template, $item);

					/* } else {

						if (($common = preg_grep('/' . $name . 'Header\./', $list))) {

							$common = array_shift($common);

							$templatesArr[] = $this->renderOrderMailTemplate(file_get_contents($dir . $common), []);
						}


						foreach ($item as $value) {

							$templatesArr[] = $this->renderOrderMailTemplate($template, $value);
						}


						if (($common = preg_grep('/' . $name . 'Footer\./', $list))) {

							$common = array_shift($common);

							$templatesArr[] = $this->renderOrderMailTemplate(file_get_contents($dir . $common), []);
						}
					} */
				}
			}

			$sender = new SendMailController();

			$sender->setMailBody($templatesArr)->send($orderData['messageContactForm']['email']);
		}
	}

	protected function renderOrderMailTemplate(string $template, array $data): string
	{

		foreach ($data as $key => $item) {

			$template = preg_replace('/#' . $key . '#/i', $item, $template);
		}

		return $template;
	}
}
