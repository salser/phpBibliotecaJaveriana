
<?php if (!defined("UBER")) exit;
$file = 'http://images.habboinn.com/gamedata/furnidata.xml';

echo '<h1>New furni finder</h1>';
echo '<p>This tool will scan Habbo US\'s furni data file for furniture that is missing from our defs.</p><br />';
echo '<p><a href="'.$file.'">'.$file.'</a></p><br />';

if(!$xml = simplexml_load_file($file))
  exit('Failed to open '.$file);
$whatWeKnow = Array();
$getWhatWeKnow = dbquery("SELECT item_name FROM items_base");

while ($row = mysqli_fetch_assoc($getWhatWeKnow))
{
	$whatWeKnow[] = $row['item_name'];
}

$ij = 0;
$stuffWeDontKnow = Array();

 foreach($xml->roomitemtypes->furnitype as $post)
 {

  		$name = $post['classname'];
  		
  		$sprite = $post['id'];
  		
  	if (in_array($name, $whatWeKnow))
	{
		continue;
	}	
	$stuffWeDontKnow[] = $name;
	$ij++;


	$sql = "INSERT INTO `items_base` (`sprite_id`, `public_name`,`item_name`, `type`,`width`,`length`, `stack_height`, `allow_stack`,`allow_walk`,`allow_sit`,`allow_lay`, `allow_recycle`, `allow_trade`, `allow_marketplace_sell`, `allow_gift`, `allow_inventory_stack`, `interaction_type`, `interaction_modes_count`, `vending_ids`, `effect_id_male`,`effect_id_female`,`multiheight`) VALUES ('".$sprite."', '".$name."','".$name."', 's', '1','0','0','0', '0','0','0', '1', '1', '1', '1', '1', 'default', '1', '0', '0', '0','0');";
	echo $sql;
}
foreach($xml->wallitemtypes->furnitype as $post)
{
  		$name = $post['classname'];
  		$sprite = $post['id'];
  	if (in_array($name, $whatWeKnow))
	{
		continue;
	}	
	$stuffWeDontKnow[] = $name;
	$ij++;

	
	$sql = "INSERT INTO `items_base` (`sprite_id`, `public_name`,`item_name`, `type`,`width`,`length`, `stack_height`, `allow_stack`,`allow_walk`,`allow_sit`,`allow_lay`, `allow_recycle`, `allow_trade`, `allow_marketplace_sell`, `allow_gift`, `allow_inventory_stack`, `interaction_type`, `interaction_modes_count`, `vending_ids`, `effect_id_male`,`effect_id_female`,`multiheight`) VALUES ('".$sprite."', '".$name."','".$name."', 'i', '1','0','0','0', '0','0','0', '1', '1', '1', '1', '1', 'default', '1', '0', '0', '0','0');";
	echo $sql;
}
echo '<h2>New/missing furni (' . $ij . ')</h2><br />';

if ($ij == 0)
{
	echo '<Br /><br /><center style="font-size: 120%;"><i><b>Good news!</b><br />I have no new furni for you today.</i></center>';
}


?>								