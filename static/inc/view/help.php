<html>
<head>
	<title>Bantuan - uangKU HTTP Request/Respond</title>
	<link href='static/css/bootstrap.css' rel='stylesheet'>
</head>
<body>
<div class='col-lg-10'>
<h1>Bantuan Uangku</h1>
<table class='table table-bordered '>
	<tr>
		<th colspan='2'>Opsi</th>
		<th>Keterangan</th>
	</tr>
	<tr>
		<td rowspan='10' width='20px'><b >op=</b></td>
		<td>
			<b>newuser</b>
		</td>
		<td>untuk menambahkan pengguna baru<br>
			<small>Contoh:</small><br>
			<pre>?op=newuser&username=admin&password=456b7016a916a4b178dd72b947c152b7&realname=Administrator</pre>
			<small class='text-danger'>password harus terenskrip dahulu</small>
		</td>
	</tr>
	<tr>
		<td>
			<b>login</b>
		</td>
		<td>Masuk Ke sistem / cek validasi pengguna<br>
			<small>Contoh:</small><br>
			<pre>?op=login&username=admin&password=456b7016a916a4b178dd72b947c152b7</pre>
		</td>
	</tr>
	<tr>
		<td>
			<b>updateuser</b>
		</td>
		<td>Memperbaharui user<br>
			<small>Contoh:</small><br>
			<pre>?op=updateuser&uid=1&username=admin&password=456b7016a916a4b178dd72b947c152b7&realname=Administrator2</pre>
			<small class='text-danger'>UID tidak dapat diubah</small>
		</td>
	</tr>
	<tr>
		<td>
			<b>newdata</b>
		</td>
		<td>Menambahkan data keuangan ke dalam basis data<br>
			<small>Contoh:</small><br>
			<pre>?op=newdata&uid=1&date=2015-01-01&token=1314124ARST&type=in&value=2000000&desc=pembelian komputer baru</pre>
			<small class='text-danger'>untuk mendapatkan UID ==>  ?op=get&from_data=username&value_data=[YOUR USERNAME]&select_field=uid&from_table=user</small>
		</td>
	</tr>
	<tr>
		<td>
			<b>viewdata</b>
		</td>
		<td>menampilkan data yang ada di basis data<br>
			<small>Contoh:</small><br>
			<pre>?op=viewdata&uid=1&date=2015-02-02&type=in&limit=100$search=string</pre>
			<pre>?op=viewdata&uid=1&from=2015-12-01&to=2015-12-31&type=out&limit=10</pre>
			<pre>?op=viewdata&uid=1&uid=1</pre>
			<small class='text-danger'>uid*</small>
		</td>
	</tr>
	<tr>
		<td>
			<b>totaldata</b>
		</td>
		<td>Menampilkan total(uang) baik <i>in/out</i><br>
			<small>Contoh:</small><br>
			<pre>?op=totaldata?uid=1&date=2015-01-01&type=in&limit=10</pre>
			<pre>?op=totaldata&uid=1&from=2015-12-01&to=2015-12-31&type=out&limit=10</pre>
			<small class='text-danger'>uid*</small>
		</td>
	</tr>
	<tr>
		<td>
			<b>saldodata</b>
		</td>
		<td>Menampilkan total uang (saldo) setelah data <i>in</i> di kurangi data <i>out</i><br>
			<small>Contoh:</small><br>
			<pre>?op=saldodata?uid=1&date=2015-01-01&limit=10</pre>
			<pre>?op=saldodata&uid=1&from=2015-12-01&to=2015-12-31&limit=10&search=string</pre>
			<small class='text-danger'>uid*</small>
		</td>
	</tr>
	<tr>
		<td>
			<b>deletedata</b>
		</td>
		<td>menghapus data<br>
			<small>Contoh:</small><br>
			<pre>?op=deletedata&did=1&desc=salah masukan data</pre>
			<small class='text-danger'>did*</small>
		</td>
	</tr>
	<tr>
		<td>
			<b>updatedata</b>
		</td>
		<td>memperbaharui data<br>
			<small>Contoh:</small><br>
			<pre>?op=updatedata&uid=21&did=11&date=2015-11-16&token=udah diganti&type=out&value=16000&desc=di ganti</pre>
			<small class='text-danger'>uid*</small>
		</td>
	</tr>
	<tr>
		<td colspan='3'><small class='text-danger'>*harus(required)</small></td>
	</tr>
</table>
</div>
</body>
</html>
