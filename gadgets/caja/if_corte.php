<form onsubmit="return false" oninput="x.value=((parseInt(a.value)*parseInt(aa.value))+
(parseInt(b.value)*parseInt(bb.value))+(parseInt(c.value)*parseInt(cc.value))+(parseInt(d.value)*parseInt(dd.value))+(parseInt(e.value)*parseInt(ee.value))+(parseInt(f.value)*parseInt(ff.value))+parseInt(gg.value)+parseInt(hh.value)).toFixed(2)">
<table>
	<tr>
		<td><input type="hidden" name="a" value="1000">
			<input type="text" class="search_m_m rounded_min" name="aa" size="5" autofocus></td>
		<td>Billetes de 1,000</td>
	</tr>
	<tr>
		<td><input type="hidden" name="b" value="500">
			<input type="text" class="search_m rounded_min" name="bb" size="5"></td>
		<td>Billetes de 500</td>
	</tr>
	<tr>
		<td><input type="hidden" name="c" value="200">
			<input type="text" class="search_m rounded_min" name="cc" size="5"></td>
		<td>Billetes de 200</td>
	</tr>
	<tr>
		<td><input type="hidden" name="d" value="100">
			<input type="text" class="search_m rounded_min" name="dd" size="5"></td>
		<td>Billetes de 100</td>
	</tr>
	<tr>
		<td><input type="hidden" name="e" value="50">
			<input type="text" class="search_m rounded_min" name="ee" size="5"></td>
		<td>Billetes de 50</td>
	</tr>
	<tr>
		<td><input type="hidden" name="f" value="20">
			<input type="text" class="search_m rounded_min" name="ff" size="5"></td>
		<td>Billetes de 20</td>
	</tr>
	<tr>
		<td><input type="text" class="search_m rounded_min" name="gg" size="5"></td>
		<td>Morralla</td>
	</tr>
	<tr>
		<td><input type="text" class="search_m rounded_min" name="hh" size="5"></td>
		<td>Documentos</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:right; font-size:1.5em;">$<output name="x" class="search_m rounded_min"></output></td>
	</tr>
</form>
<tr>
	<td><a href="caja.php?ruta=ip_cerrar.php&gt=<?php echo $ct;?>">Cerrar la caja</a></td>
</tr>

</table>
