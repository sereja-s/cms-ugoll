<h2>Параметры заказы</h2>

<table id="table">
	<tbody>
		<tr>
			<td>Номер заказа</td>
			<td>#id#</td>
		</tr>
		<tr>
			<td>Тип доставки</td>
			<td>#delivery#</td>
		</tr>
		<tr>
			<td>Тип оплаты </td>
			<td>#payments#</td>
		</tr>
		<tr>
			<td>Сумма заказа</td>
			<td>#total_sum#, ₽</td>
		</tr>
		<tr>
			<td>Количество товаров</td>
			<td>#total_qty#</td>
		</tr>
		<tr>
			<td>Адрес:</td>
			<td>#address#</td>
		</tr>
		<tr>
			<td>Дополнительная информация:</td>
			<td>#info#</td>
		</tr>
	</tbody>
</table>

<style type="text/css">
	#table {
		border: 1px solid #dddddd;
		border-collapse: collapse;
		width: 100%;
	}

	#table th {
		font-weight: bold;
		padding: 5px;
		background: #efefef;
		border: 1px solid #dddddd;
		text-align: left;
		vertical-align: middle;
	}

	#table td {
		border: 1px solid #dddddd;
		padding: 5px;
		text-align: left;
		vertical-align: middle;
	}

	/* Строки 1,4,7... */
	#table tbody tr:nth-child(3n+1) {
		background: #f2fff5;
	}

	/* Строки 2,5,8... */
	#table tbody tr:nth-child(3n+2) {
		background: #ffeaea;
	}

	/* Строки 3,6,9... */
	#table tbody tr:nth-child(3n+3) {
		background: #eeecff;
	}
</style>