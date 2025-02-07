<!doctype html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, shrink-to-fit=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- <title>Купить уголь, антрацит, дрова, песок, щебень, шлак в Донецке, Макеевке, ДНР | ТДК УГЛЕТРАКТ</title> -->
	<title><?= $title ?? $this->set['title'] ?></title>

	<meta name="description" content="<?= $description ?? $this->set['description'] ?>" />
	<meta name="keywords" content="<?= $keywords ?? $this->set['keywords'] ?>" />

	<!-- Совет. Используйте формат 120 × 120 пикселей или SVG, чтобы сделать логотип сайта более четким и заметным в сервисах Яндекса -->

	<!-- <link rel="icon" href="https://example.com/favicon.ico" type="image/x-icon"> -->
	<!-- <link rel="icon" href="https://example.com/favicon.svg" type="image/svg+xml"> -->
	<link rel="icon" href="https://tdkugletrakt.ru/favicon.ico" type="image/x-icon">

	<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
	<!-- <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png"> -->
	<link rel="manifest" href="/favicon/site.webmanifest">
	<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<meta property="og:title" content="<?= $this->set['name'] ?>" />
	<meta property="og:description" content="<?= $this->set['description'] ?>" />
	<meta property="og:image" content="<?= $this->img($this->set['img']) ?>" />

	<?php $this->getStyles() ?>

</head>

<body>
	<header class="header">
		<div class="container">
			<div class="header__wrapper">

				<div class="header__logo">
					<a href="<?= $this->alias() ?>"><img src="<?= $this->img($this->set['img']) ?>" alt="<?= $this->set['name'] ?>"></a>
					<span><?= $this->set['name'] ?></span>
				</div>
				<div class="header__topbar">
					<div class="header__contacts">
						<div><a href="mailto:<?= $this->set['email'] ?>"><?= $this->set['email'] ?></a></div>
						<div><a href="tel:<?= preg_replace('/[^+\d]/', '', $this->set['phone']) ?>"><?= $this->set['phone'] ?></a></div>
						<div><a class="js-callback">Связаться с нами</a></div>
					</div>
					<nav class="header__nav">
						<ul class="header__nav-list">

							<?php if (!empty($this->menu['catalog'])) : ?>

								<li class="header__nav-parent">
									<a href="<?= $this->alias('catalog') ?>"><span>Каталог</span></a>

									<ul style="z-index: 999" class="header__nav-sublist">

										<?php foreach ($this->menu['catalog'] as $item) : ?>

											<li>
												<a href="<?= $this->alias(['catalog' => $item['alias']]) ?>"><span><?= $item['name'] ?></span></a>
											</li>

										<?php endforeach; ?>

									</ul>
								</li>

							<?php endif; ?>

						</ul>

						<ul style="flex-wrap:wrap" class="header__nav-list">

							<?php if (!empty($this->menu['information'])) : ?>

								<?php foreach ($this->menu['information'] as $item) : ?>

									<li style="padding-bottom: 10px;">
										<a href="<?= $this->alias(['information' => $item['alias']]) ?>"><span><?= $item['name'] ?></span></a>
										<ul class="header__nav-sublist">

										</ul>
									</li>

								<?php endforeach; ?>

							<?php endif; ?>

							<?php if ($this->getController() === 'index') : ?>

								<?php if (!empty($news)) : ?>

									<li>
										<a href="#news"><span>Новости</span></a>
										<ul class="header__nav-sublist">
										</ul>
									</li>

								<?php endif; ?>

							<?php endif; ?>

						</ul>
					</nav>
				</div>
				<div class="overlay"></div>
				<div class="header__sidebar">
					<div class="header__sidebar_btn">
						<a href="<?= $this->alias('cart') ?>" class="cart-btn-wrap">
							<svg class="inline-svg-icon svg-basket">
								<use href="<?= PATH . TEMPLATE ?>assets/img/icons.svg#basket"></use>
							</svg>
							<span data-totalQty><?= $this->cart['total_qty'] ?? 0 ?></span>
						</a>
					</div>

					<div class="header__sidebar_btn burger-menu">
						<div class="burger-menu__link">
							<span class="burger"></span>
							<span class="burger-desc">меню</span>
						</div>
					</div>

					<div class="header__sidebar_btn">
						<a href="tel:<?= preg_replace('/[^+\d]/', '', $this->set['phone']) ?>">
							<img src="<?= PATH . TEMPLATE ?>/assets/img/phone.png" alt="phone">
						</a>
					</div>
					<div class="header__sidebar_btn">
						<a class="js-callback">
							<img src="<?= PATH . TEMPLATE ?>/assets/img/email.png" alt="phone" style="max-width: 47px;">
						</a>
					</div>

					<?php if (!empty($this->socials)) : ?>

						<?php foreach ($this->socials as $item) : ?>

							<div class="header__sidebar_btn">
								<a href="<?= $this->alias($item['external_alias']) ?>">
									<img src="<?= $this->img($item['img']) ?>" alt="<?= $item['name'] ?>">
								</a>
							</div>

						<?php endforeach; ?>

					<?php endif; ?>

				</div>

				<div class="header__menu _hidden">
					<div class="header__menu_close close_modal"></div>
					<ul class="header__menu_burger">

						<?php if (!empty($this->menu['catalog'])) : ?>

							<li>
								<a href="<?= $this->alias('catalog') ?>"><span style="font-size: 23px; ">Каталог</span></a>

								<ul class="header__menu_sublist" style="padding-top: 20px">

									<?php foreach ($this->menu['catalog'] as $item) : ?>

										<li style="padding-bottom: 25px">
											<a href="<?= $this->alias(['catalog' => $item['alias']]) ?>"><span><?= $item['name'] ?></span></a>
										</li>

									<?php endforeach; ?>

								</ul>

							</li>

						<?php endif; ?>

						<li>
							<div class="contact" style="color: #1f2421; padding-bottom: 25px">
								<h2 style="margin-bottom: 25px;">Контакты:</h2>
								<div><a href="mailto:<?= $this->set['email'] ?>" style="display: inline-block; text-transform: none; padding-bottom: 20px"><?= $this->set['email'] ?></a></div>

								<div><a href="tel:<?= preg_replace('/[^+\d]/', '', $this->set['phone']) ?>"><?= $this->set['phone'] ?></a></div>
							</div>
						</li>

						<?php if (!empty($this->menu['information'])) : ?>

							<?php foreach ($this->menu['information'] as $item) : ?>

								<li style="line-height: 25px; padding-bottom: 15px;">
									<a href="<?= $this->alias(['information' => $item['alias']]) ?>"><span><?= $item['name'] ?></span></a>
								</li>

							<?php endforeach; ?>

						<?php endif; ?>

						<?php if ($this->getController() === 'index') : ?>

							<?php if (!empty($news)) : ?>

								<li>
									<a href="#news"><span>Новости</span></a>
									<ul class="header__nav-sublist">
									</ul>
								</li>

							<?php endif; ?>

						<?php endif; ?>

					</ul>
				</div>

				<div class="header__callback _hidden">
					<div class="header__callback_close close_modal"></div>
					<div class="header__callback_header">
						Оставьте сообщение и мы вам перезвоним
					</div>
					<form class="header__callback_form" method="post" action="<?= $this->alias('contactform') ?>">
						<input type="text" name="name" class="input-text header__callback_input" placeholder="Ваше имя" value="<?= $this->setFormValues('name', 'userData') ?>">
						<input type="email" name="email" class="input-text header__callback_input" placeholder="E-mail" value="<?= $this->setFormValues('email', 'userData') ?>">
						<input type="tel" name="phone" class="input-text header__callback_input" placeholder="Телефон" value="<?= $this->setFormValues('phone', 'userData') ?>">
						<textarea name="info" rows="5" placeholder="Укажите интересуемый товар (уголь, дрова, песок, щебень, шлак или цемент) и количество"><?= $this->setFormValues('info', 'userData') ?></textarea>
						<div class="header__callback_privacy">
							<label class="checkbox">
								<input type="checkbox" required>
								<div class="checkbox__text">Соглашаюсь с правилами обработки персональных данных</div>
							</label>
						</div>
						<button type="submit" class="form-submit header__callback_submit">Отправить</button>
					</form>
				</div>
			</div>
		</div>
	</header>

	<?php if ($this->getController() !== 'index') : ?>

		<div class="search search-internal" style="position: relative" id="searchButton">
			<button>
				<svg class="inline-svg-icon svg-search">
					<use xlink:href="<?= PATH . TEMPLATE ?>assets/img/icons.svg#search"></use>
				</svg>
			</button>
			<input type="search" name="search" placeholder="поиск">
			<input type="hidden" name="search_table" value="goods">
			<div class="dropdown-content search_res">
				<!-- <a href="#">Ссылка 1</a>
				<a href="#">Ссылка 2</a>
				<a href="#">Ссылка 3</a> -->
			</div>

			<style>
				.search-internal.vg-search-reverse .dropdown-content {
					display: block;
					z-index: 999999999;
					overflow: auto;
				}


				.dropdown-content {
					display: none;
					position: absolute;
					background-color: #f9f9f9;
					min-width: auto;
					box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
					z-index: 1;
					top: 55px;
					left: 55px;
				}

				/* Ссылки внутри выпадающего списка */
				.dropdown-content a {
					color: black;
					padding: 10px 15px;
					text-decoration: none;
					display: block;
				}

				/* Изменить цвет выпадающих ссылок при наведении */
				.dropdown-content a.search_act {
					background-color: #e5e5e5
				}
			</style>


		</div>

	<?php endif; ?>

	<main class="main">