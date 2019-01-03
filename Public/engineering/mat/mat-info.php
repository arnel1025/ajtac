<?php
require_once ('../../../private/initialize.php');
require_login();
$mat_ID = $_GET['id'];
$result_mat = find_mat_id($mat_ID);

$page_title = h('Engineering - Materials Page');
include (Shared_Path.'/header.php');
?>

<ul>
	<li> <a href=" <?php echo url_for('engineering/eng-index.php'); ?>">Main</a> </li>
	<li> <a href=" <?php echo url_for('engineering/mat/mat-index.php'); ?>">Back</a> </li>
</ul>

<div id="info">
	<div id="formbox">
	<dl>
		<dt> Material ID </dt>
		<dd> <?php echo h($result_mat['id']);?> </dd>
	</dl>

	<dl>
		<dt> Material Type </dt>
		<dd> <?php echo h($result_mat['Mat_type']);?> </dd>
	</dl>

	<dl>
		<dt> Material Referemce </dt>
		<dd> <?php echo h($result_mat['Mat_ref']);?> </dd>
	</dl>

	<dl>
		<dt> Material Name </dt>
		<dd> <?php echo h($result_mat['Mat_name']);?> </dd>
	</dl>
	</div>
</div>

<?php
include (Shared_Path.'/footer.php');
?>
