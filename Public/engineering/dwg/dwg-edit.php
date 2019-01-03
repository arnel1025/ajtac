<?php
require_once ('../../../private/initialize.php');
require_login();
if(!isset($_GET['id']))
	{
	redirect_to(url_for('engineering/dwg/dwg-index.php'));
	}

$dwg_ID = $_GET['id'];
$class_set = find_class();

if (is_post_request())
	{

	$edit_set = [];
	$edit_set['id'] = $dwg_ID;
	$edit_set['Dwg_disc'] = $_POST['Dwg_disc'];
	$edit_set['Dwg_ref'] = $_POST['Dwg_ref'];
	$edit_set['Dwg_name'] = $_POST['Dwg_name'];

	$query_set = change_dwg($edit_set);

	if($query_set === TRUE)
		{
		redirect_to(url_for('engineering/dwg/dwg-info.php?id='.$edit_set['id']));
		}
	else
		{
		$error = $query_set;
		}
	}
else
	{
	$edit_set = find_dwg_id($dwg_ID); //array of values to be edited
	}

$page_title = h('Engineering - Drawings - Append Existing Data Entry');
include (Shared_Path.'/header.php');
?>

<ul>
	<li><a href="<?php echo url_for('engineering/eng-index.php'); ?>" >	Engineering Home	</a></li>
	<li><a href="<?php echo url_for('engineering/dwg/dwg-index.php'); ?>" >	Back </a></li>
</ul>

<div id="content">
	<div id="formbox">

	<h1>Modify Existing - Data Entry</h1>

	<?php echo show_errors($error) ;?>
	<form action="<?php echo url_for('engineering/dwg/dwg-edit.php?id='. h(u($dwg_ID))); ?>" method="post">

		<label for="Dwg_ref"> Drawing Reference </label>
		<input  type="text" name="Dwg_ref" value="<?php echo $edit_set['Dwg_ref'] ?? '' ;?>" />

		<label for="Dwg_name"> Drawing Name </label>
		<input type="text" name="Dwg_name" value="<?php echo $edit_set['Dwg_name'] ?? '' ;?>" />

		<label for="Dwg_disc"> Discipline </label>
		<select required name="Dwg_disc" >
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
