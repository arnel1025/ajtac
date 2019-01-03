<?php
require_once ('../../../private/initialize.php');
require_login();
$dwg_ID = $_GET['id'];
$result_dwg = find_dwg_id($dwg_ID);

$page_title = h('Engineering - Drawings Page');
include (Shared_Path.'/header.php');
?>

<ul>
	<li> <a href=" <?php echo url_for('engineering/eng-index.php'); ?>">Main</a> </li>
	<li> <a href=" <?php echo url_for('engineering/dwg/dwg-index.php'); ?>">Back</a> </li>
</ul>

<div id="info">
	<div id="formbox">
	<dl>
		<dt> Drawing ID </dt>
		<dd> <?php echo h($result_dwg['id']);?> </dd>
	</dl>

	<dl>
		<dt> Drawing Discipline </dt>
		<dd> <?php echo h($result_dwg['Dwg_disc']);?> </dd>
	</dl>

	<dl>
		<dt> Drawing Referemce </dt>
		<dd> <?php echo h($result_dwg['Dwg_ref']);?> </dd>
	</dl>

	<dl>
		<dt> Drawing Name </dt>
		<dd> <?php echo h($result_dwg['Dwg_name']);?> </dd>
	</dl>
	</div>
</div>



<?php
include (Shared_Path.'/footer.php');
?>
