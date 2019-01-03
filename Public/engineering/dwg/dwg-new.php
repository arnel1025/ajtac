<?php
require_once ('../../../private/initialize.php');
require_login();
$class_set = find_class();

if (is_post_request())
	{
	$create_set = [];
	$create_set['Dwg_name']	= $_POST['Dwg_name'];
	$create_set['Dwg_disc'] = $_POST['Dwg_disc'];
	$create_set['Dwg_ref'] = $_POST['Dwg_ref'];

	$query_set = insert_new_dwg($create_set);
		if ($query_set === TRUE)
		{
		$new_dwg = mysqli_insert_id($PD);
		redirect_to(url_for('engineering/dwg/dwg-info.php?id=' . $new_dwg));
		}
		else
		{
		$error = $query_set;
		echo $error;
		}
	}

//page content
$page_title = h('Engineering - Drawings - New Data Entry');
include (Shared_Path.'/header.php');
?>

<ul>
	<li><a href="<?php echo url_for('engineering/eng-index.php'); ?>" >	Engineering Home	</a></li>
	<li><a href="<?php echo url_for('engineering/dwg/dwg-index.php'); ?>" >	Back </a></li>
</ul>

<div id="content">
	<div id="formbox">

	<h1>New Drawing Received - Data Entry</h1>

	<?php echo show_errors($error) ;?>
	<form action="<?php echo url_for('engineering/dwg/dwg-new.php'); ?>" method="post">

	<label for"Dwg_ref"> Drawing Reference </label>
	<input required type="text" name="Dwg_ref" value="<?php echo $create_set['Dwg_ref'] ?? '' ;?>" />

	<label for"Dwg_name"> Drawing Name </label>
	<input required type="text" name="Dwg_name" value="<?php echo $create_set['Dwg_name'] ?? '' ;?>" />

	<label for"Dwg_disc"> Discipline </label>
	<select required name="Dwg_disc" >
		<?php while($class = mysqli_fetch_assoc($class_set)) { ?>
		<?php echo "<option value =".$class['code'].">";?>  <?php echo  $class['name']."</option>" ;?>
		<?php } ?>
	</select>

	<input id="btn" type="submit" value="Add" />

	</form>
	</div>
</div>

<?php
include (Shared_Path.'/footer.php');
?>
