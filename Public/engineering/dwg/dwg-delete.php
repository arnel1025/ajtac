<?php
require_once ('../../../private/initialize.php');
require_login();
if(!isset($_GET['id']))
	{
	redirect_to(url_for('engineering/dwg/dwg-index.php'));
	}

//sets the ID of record to be deleted
$dwg_ID = $_GET['id'];
//find the record to be deleted
$del_set = find_dwg_id($dwg_ID); //variable for the array result

//test if it is a POST or a GET request
if (is_post_request())
	{
	//delete record
	delete_dwg($del_set);
	}

$page_title = h('Engineering - Drawings - Remove Existing Data');
include (Shared_Path.'/header.php');
?>

<ul>
	<li><a href="<?php echo url_for('engineering/eng-index.php'); ?>" >	Engineering Home	</a></li>
	<li><a href="<?php echo url_for('engineering/dwg/dwg-index.php'); ?>" >	Back </a></li>
</ul>

<div id="info">
	<div id="delbox">
	<h1>Delete - Data</h1>

	<h2> Are you sure you want to delete this data ??</h2>
	<label class="dellabel"> Discipline </label>
	<label class="delinfo"> <?php  echo $del_set['Dwg_disc'] ;?> </label>
	<label class="dellabel"> Reference </label>
	<label class="delinfo"> <?php  echo $del_set['Dwg_ref'] ;?> </label>
	<label class="dellabel"> Name </label>
	<label class="delinfo"> <?php  echo $del_set['Dwg_name'] ;?> </label>

	<form action="<?php echo url_for('engineering/dwg/dwg-delete.php?id='. h(u($del_set['id']))); ?>" method="post">
		<input id="btn" type="submit" value="Delete?" />
	</form>
	</div>
</div>

<?php
include (Shared_Path.'/footer.php');
?>
