<?php
require_once ('../../../private/initialize.php');
require_login();
$class_set = find_class();

if (is_post_request())
	{

	$create_set = [];
	$create_set['Mat_type'] = $_POST['Mat_type'];
	$create_set['Mat_ref'] = $_POST['Mat_ref'];
	$create_set['Mat_name'] = $_POST['Mat_name'];

	$query_set = insert_new_mat($create_set);
		if ($query_set === TRUE)
		{
		$new_mat = mysqli_insert_id($PD);
		redirect_to(url_for('engineering/mat/mat-info.php?id=' . $new_mat));
		}
		else
		{
		$error = $query_set;
		}
	}

//page content

$page_title = h('Engineering - Material - New Data Entry');
include (Shared_Path.'/header.php');
?>

<ul>
	<li><a href="<?php echo url_for('engineering/eng-index.php'); ?>" >	Engineering Home	</a></li>
	<li><a href="<?php echo url_for('engineering/mat/mat-index.php'); ?>" >	Back </a></li>
</ul>

<div id="content">
	<div id="formbox">

	<h1>New Material Received - Data Entry</h1>

	<?php echo show_errors($error) ;?>
	<form action="<?php echo url_for('engineering/mat/mat-new.php'); ?>" method="post">

	<label for "Mat_ref"> Material Reference </label>
	<input  type="text" name="Mat_ref" value="<?php echo $create_set['Mat_ref'] ?? '' ;?>" />

	<label for "Mat_name"> Material Name </label>
	<input  type="text" name="Mat_name" value="<?php echo $create_set['Mat_name'] ?? '' ;?>" />

	<label for "Mat_type"> Material Type </label>
	<select required name="Mat_type" >
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
