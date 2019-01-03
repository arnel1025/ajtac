<?php
require_once ('../../../private/initialize.php');
require_login();
if(!isset($_GET['id']))
	{
	redirect_to(url_for('engineering/mat/mat-index.php'));
	}

$edMatId = $_GET['id'];
$class_set = find_class();

if (is_post_request())
	{

	$edit_set = [];
	$edit_set['id'] = $edMatId;
	$edit_set['Mat_type'] = $_POST['Mat_type'];
	$edit_set['Mat_ref'] =  $_POST['Mat_ref'];
	$edit_set['Mat_name'] =  $_POST['Mat_name'] ;

	$query_set = change_mat($edit_set);

	if($query_set === TRUE)
		{
		redirect_to(url_for('engineering/mat/mat-info.php?id='.$edit_set['id']));
		}
	else
		{
		$error = $query_set;
		}

	}
else
	{
	$edit_set = find_mat_id($edMatId);
	}

$page_title = h('Engineering - Material - Append Existing Data Entry');
include (Shared_Path.'/header.php');
?>

<ul>
	<li><a href="<?php echo url_for('engineering/eng-index.php'); ?>" >	Engineering Home	</a></li>
	<li><a href="<?php echo url_for('engineering/mat/mat-index.php'); ?>" >	Back </a></li>
</ul>

<div id="content">
	<div id="formbox">

	<h1>Modify Existing - Data Entry</h1>

	<?php echo show_errors($error) ;?>
	<form action="<?php echo url_for('engineering/mat/mat-edit.php?id=' . h(u($edMatId)))   ; ?>" method="post">

		<label for="Mat_ref">Material Reference </label>
		<input type="text" name="Mat_ref" value="<?php echo $edit_set['Mat_ref'] ?? '' ;?>" />

		<label for="Mat_name">Material Name </label>
		<input type="text" name="Mat_name" value="<?php echo $edit_set['Mat_name'] ?? '' ;?>" />

		<label for="Mat_type">Material Type </label>
		<select required name="Mat_type" >
			<?php while($class = mysqli_fetch_assoc($class_set)) { ?>
			<?php echo "<option value =".$class['code'].">";?>  <?php echo  $class['name']."</option>" ;?>
			<?php } ?>
		</select>

		<input id="btn" type="submit" value="Save" />
	</form>
	</div>
</div>

<?php
include (Shared_Path.'/footer.php');
?>
