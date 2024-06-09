<div class="container">

	<?= $this->breadcrumbs ?>

	<?php if (!empty($this->menu['information'])) : ?>

		<?php foreach ($this->menu['information'] as $item) : ?>

			<?php if ($item['alias'] === ($this->parameters['alias'])) : ?>

				<h1 class="page-title h1"><?= $item['name'] ?></h1>

				<?= $item['content'] ?>

			<?php endif; ?>

		<?php endforeach; ?>

	<?php endif; ?>

</div>