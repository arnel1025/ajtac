<?php
require_once ('../../private/initialize.php');
require_login();
$page_title = h('Administrator Page');
include (Shared_Path.'/header.php');
?>

<div id="mainpagenav">
	<ul>
		<li><a href="<?php echo url_for('engineering/eng-index.php'); ?>" >	Engineering Area	</a></li>

		<?php // while($class = mysqli_fetch_assoc($class_set)) { ?>
		<!--	<li><a href="<?php //echo url_for('admin/temp.php'); ?>" target="_blank">	<?php // echo $class['name'];?>	</a></li> -->
		<?php// } ?>
	</ul>
</div>

<?php
if (is_post_request())
	{
	//pupulate array from $_POST Super Global
	$create_set = [];
	$create_set['fullName'] = $_POST['fullName'];
	$create_set['Position'] = $_POST['Position'];
	$create_set['Email'] = $_POST['Email'];
	$create_set['Username'] = $_POST['Username'];
	$create_set['Password'] = $_POST['Password'];
	$create_set['Verify'] = $_POST['Verify'];

	If ($create_set['Password'] === $create_set['Verify'] )
		{
		//call function passing array as parameter
		$new_user = insert_user($create_set);
		if ($new_user === TRUE)
			{
			 redirect_to(url_for('main-index.php'));
			}
		}
	else
		{
		echo "<script> alert('Password and Verify does not Match'); </script>";
		}
	}
?>

<div id="mainpagecontent">
	<form method="post" action="admin-index.php">
		<label class="log"> Enter Full Name </label>
		<input required name="fullName" type="text" placeholder="Enter Full Name" value="<?php echo $create_set['fullName'] ?? '' ;?>"> </input>
		<label class="log"> Enter Designation </label>
		<input required name="Position" type="text" placeholder="Enter Designation" value="<?php echo $create_set['Position'] ?? '' ;?>"> </input>
		<label class="log"> Enter your Email </label>
		<input required name="Email" type="email" placeholder="Enter a Valid Email address" value="<?php echo $create_set['Email'] ?? '';?>"> </input>
		<label class="log"> Enter your Username </label>
		<input required name="Username" type="text" placeholder="Enter Username" value="<?php echo $create_set['Username'] ?? '';?>"> </input>
		<label class="log"> Enter Password </label>
		<input required name="Password" type="password" placeholder="Enter Password"> </input>
		<label class="log"> Re-type Password </label>
		<input required name="Verify" type="password" placeholder="Re-Enter Password"> </input>

		<input id="btn" Value="Save" type="submit"></input>
	</form>
</div>


<?php
include (Shared_Path.'/footer.php');
?>
