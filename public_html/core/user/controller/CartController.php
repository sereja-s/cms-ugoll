<?php

namespace core\user\controller;

/** 
 * Контроллер корзины товаров (Выпуск №143)
 */
class CartController extends BaseUser
{
	// Выпуск №144 | Пользовательская часть | удаление и очистка корзины

	// получим оплату и доставку (объявим свойства)
	protected $delivery;
	protected $payments;

	// Выпуск №143 | Пользовательская часть | Корзина товаров | ч 1
	protected function inputData()
	{
		parent::inputData();

		/* $_SESSION['res']['phone'] = '9999999999999';

		$this->userData = [
			'name' => 'Masha',
			'phone' => '78965411223',
			'email' => 'mail@mail.ru'
		]; */
		$title = "Закажите уголь, антрацит, дрова, сыпучие строительные материалы на сайте ТДК УГЛЕТРАКТ";
		$description = "Заходите на сайт в удобное для Вас время, выбирайте необходимый товар из широкого ассортимента, оформляйте заказ и мы доставим его по адресу. Мы экономим ваше время, средства и заинтересованы в дальнейшем сотрудничестве. С нами вы приобретаете надёжного партнёра";
		$keywords = "Заказать, приобрести, скидка, купить, доставка, Донецк, Макеевка, ДНР, ЛНР, цена, песок, щебень, шлак,дрова, уголь";

		$this->delivery = $this->model->get('delivery');
		$this->payments = $this->model->get('payments');

		if (!empty($this->parameters['alias']) && $this->parameters['alias'] === 'remove') {

			if (!empty($this->parameters['id'])) {

				$this->deleteCartData($this->parameters['id']);
			} else {

				$this->clearCart();
			}

			$this->redirect($this->alias('cart'));
		}

		return compact('title', 'description', 'keywords');
	}
}
