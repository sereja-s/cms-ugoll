<div class="container">
	<section class="section-top js-callback" style='background: url("<?= $this->img($section_top['img']) ?>") center center/cover no-repeat fixed; margin-top: 15px'>
		<div class="section-top__container">
			<p class="section-top__info"><?= $section_top['short_content'] ?></p>
			<h1 class="section-top__title"><?= $section_top['name'] ?></h1>
			<div class="section-top__btn">
				<button class="btn" type="button">Получить консультацию</button>
			</div>
		</div>
	</section>

	<section8 class="page-eight eight">
		<div class="eight__container">
			<div class="eight__leftside">
				<div class="eight-leftside__title" style="text-align: center;"><?= $section_top['title'] ?></div>
				<div class="eight-leftside__block">
					<div class="eight-leftside__question"><?= $section_top['content'] ?></div>
				</div>
			</div>

			<div class="spollers__title" style="color:chocolate; text-align: center;"><?= $section_top['description'] ?></div>

			<?php if (!empty($questions)) : ?>

				<div class="eight__rightside">
					<div data-spollers class="spollers">

						<?php foreach ($questions as $item) : ?>

							<div class="spollers__item">
								<button type="button" data-spoller class="spollers__title"><?= $item['name'] ?></button>
								<div class="spollers__body"><?= $item['content'] ?></div>
							</div>

						<?php endforeach; ?>

					</div>
				</div>

			<?php endif; ?>

		</div>
	</section8>

	<sectionn7 id="services" class="page-seven seven">

		<?php if (!empty($services)) : ?>

			<div class="seven__container">
				<div class="eight-leftside__title" style="text-align: center;">
					<div class="tree__title block__title">Фото наших работ</div>
					<!--  <div class="tree__text bl0ck__text">Find lots of insights and information on our blog. Explore, learn, and get inspired today.</div> -->
				</div>
				<div class="seven__block">
					<div class="seven__items">

						<?php foreach ($services as $service) : ?>

							<div class="seven__item">
								<div class="seven__image">
									<img src="<?= $this->img($service['img']) ?>" alt="<?= $service['name'] ?>">
								</div>
								<!-- <div class="seven__date">19 Jan 2023</div> -->
								<div class="seven__subtitle"><?= $service['name'] ?></div>
								<div class="seven__text"><?= $service['short_content'] ?></div>
								<!-- <div class="seven__buttons">
                                    <div class="seven__btn">Plumbing</div>
                                    <div class="seven__btn">Architecture</div>
                                    <div class="seven__btn">Maintenance</div>
                                </div> -->
							</div>

						<?php endforeach; ?>

					</div>
				</div>

			</div>

		<?php endif; ?>

	</sectionn7>
</div>