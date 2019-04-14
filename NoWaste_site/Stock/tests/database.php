<?php

ini_set('display_errors', 1);

require_once __DIR__ . '/../utils/DatabaseManager.php';
require_once __DIR__ . '/../models/Stock.php';
require_once __DIR__ . '/../services/StockService.php';

$db = DatabaseManager::getManager();
$product_select = StockService::getAllStock();
/*foreach ($product_select as $key) {
	echo $key['Url'];
	echo '<br>';
	print_r($key);
	echo '<br>';
}*/

?>
<div class="content-title">
	    <div class="content-show">
	    	<table>
	    		<thead>
	    			<tr>
					    <th>Url</th>
					    <th>Date de Peremption</th>
					    <th>Quantité</th>
					</tr>
	    		</thead>
	    		<tbody>
	    			<?php foreach($product_select as $_product_select){ 
					echo '<td>'.$_product_select['Url'].'</td>';
					echo '<td>'.$_product_select['Peremption'].'</td>';
					echo '<td>'.$_product_select['Quantite'].'</td>';
					echo '<td> <input type="submit" id="delete" src="croix.jpg" width=20 > </td>';
					echo '<td> <input type="submit" id="modifie" src="plus.png" width=20> </td>';
					?>
					<tr>
			    		<td><?echo $Per;?></td>
			    		<td><?echo $Quant;?></td>
					</tr>
					<?php } ?>
	    		</tbody>
	    	</table>
			
			
			
        </div>
</div>
<?php
//echo '<br><br>';

//$res = $db->getAll('SELECT * FROM stock');
//print_r($res);
//echo '<br><br>';

//$first = $db->findOne('SELECT * FROM stock WHERE ID_Stock > ?', [2]);
 ?>

