<?php
require_once ('../../../private/initialize.php');
require_login();
$query_set = find_all_mat();

$page_title = h('Engineering - Materials Page');
include (Shared_Path.'/header.php');
?>

<ul>
	<li> <a href=" <?php echo url_for('engineering/eng-index.php'); ?>">Back to Engineering Main Page</a> </li>
</ul>

<div id="content">
	<h1>Materials Listing</h1>

	<li><a href="<?php echo url_for('engineering/mat/mat-new.php'); ?>" >	Create New Entry	</a></li>
	<table class="Tableclass">
		<tr>
			<th>Short Code</th>
			<th>Material Reference</th>
			<th>Material Type</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>

		<?php while($mat = mysqli_fetch_assoc($query_set)) { ?>
		<tr>
			<td class="colid"><?php echo h($mat['Mat_type']); ?></td>
			<td class="colid"><?php echo h($mat['Mat_ref']); ?></td>
			<td><?php echo h($mat['Mat_name']); ?></td>
			<!--Link that pass the value of ID or any other value to the a second page (two form submission)
			Multiple values are separated by an &-->
			<td><a class="action" href="<?php echo url_for('/engineering/mat/mat-info.php?id='.h(u($mat['id'])).
				   '&Mat_type='.h(u($mat['Mat_type'])).
				   '&Mat_ref='.h(u($mat['Mat_ref'])).
				   '&Mat_name='.h(u($mat['Mat_name']))); ?>">View
				 </a>
			</td>
			<td><a class="action" href="<?php echo url_for('/engineering/mat/mat-edit.php?id='.h(u($mat['id'])).
				   '&Mat_type='.h(u($mat['Mat_type'])).
				   '&Mat_ref='.h(u($mat['Mat_ref'])).
				   '&Mat_name='.h(u($mat['Mat_name']))); ?>">Edit</a></td>
			<td><a class="action" href="<?php echo url_for('/engineering/mat/mat-delete.php?id='.h(u($mat['id'])).
				   '&Mat_type='.h(u($mat['Mat_type'])).
				   '&Mat_ref='.h(u($mat['Mat_ref'])).
				   '&Mat_name='.h(u($mat['Mat_name']))); ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php
mysqli_free_result($query_set);
include (Shared_Path.'/footer.php');
?>
