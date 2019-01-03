<?php
require_once ('../../../private/initialize.php');
require_login();
if(!isset($_GET['id']))
	{
	redirect_to(url_for('engineering/mat/mat-index.php'));
	}

$MatId = $_GET['id'];
$del_set = find_mat_id($MatId);

//TRUE or FALSE //test if it is a POST or a GET request
if (is_post_request())
	{
	delete_mat($del_set);
	}

$page_title = h('Engineering - Materials - Remove Existing Data');
include (Shared_Path.'/header.php');
?>

<ul>
	<li><a href="<?php echo url_for('engineering/eng-index.php'); ?>" >	Engineering Home	</a></li>
	<li><a href="<?php echo url_for('engineering/mat/mat-index.php'); ?>" >	Back </a></li>
</ul>

<div id="info">
	<div id="delbox">
	<h1>Delete - Data</h1>

	<h2> Are you sure you want to delete this data ??</h2>
	<label class="dellabel"> Material Type </label>
	<label class="delinfo"> <?php  echo $del_set['Mat_type'] ;?> </label>
	<label class="dellabel"> Reference </label>
	<label class="delinfo"> <?php  echo $del_set['Mat_ref'] ;?> </label>
	<label class="dellabel"> Name </label>
	<label class="delinfo"> <?php  echo $del_set['Mat_name'] ;?> </label>
		<form action="<?php echo url_for('engineering/mat/mat-delete.php?id='. h(u($del_set['id']))); ?>" method="post">
			<input id="btn" type="submit" value="Delete?" />
		</form>
	</div>
</div>

<?php
include (Shared_Path.'/footer.php');
?>
