<h2>Данные покупателя</h2>

<table id="table">
	<tbody>
		<tr>
			<td>Имя:</td>
			<td>#name#</td>
		</tr>
		<tr>
			<td>Телефон</td>
			<td>#phone#</td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td>#email#</td>
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