<?php
//FIND ALL record
function find_class()
	{
	global $PD;

	$sql = "SELECT * FROM classtbl ORDER BY code";
	$query_set = mysqli_query($PD, $sql);
	test_query($query_set);
	return $query_set;
	}

function find_project()
	{
	global $PD;

	$sql = "SELECT * FROM projecttbl ORDER BY code";
	$query_set = mysqli_query($PD, $sql);
	test_query($query_set);
	return $query_set;
	}

function find_content($narrative)
	{
	global $PD;

	$sql = "SELECT * FROM contenttbl ";
	$sql .= "WHERE code ="."'". de($PD, $narrative) . "'";
	$query_set = mysqli_query($PD, $sql);
	test_query($query_set);
	$result_content = mysqli_fetch_assoc($query_set); //returns associative array
	mysqli_free_result($query_set);
	return $result_content; //associative array
	}

function find_subproject($pcode)
	{
	global $PD;
	$sql = "SELECT * FROM subprojtbl WHERE pcode = "."'" . de($PD, $pcode) . "' ORDER BY code";
	$query_set = mysqli_query($PD, $sql); //returns a result set from query.
	test_query($query_set);
	return $query_set;
	}

function find_each_subproject($code)
	{
	global $PD;
	$sql = "SELECT * FROM subprojtbl WHERE code = "."'" . de($PD, $code) . "'";
	$query_set = mysqli_query($PD, $sql); //returns a result set from query.
	test_query($query_set);
	$result_subproject = mysqli_fetch_assoc($query_set); //returns associative array
	mysqli_free_result($query_set);
	return $result_subproject;
	}

function find_all_dwg()
	{
	//access database connection globally
	global $PD;

	//query variable
	$sql = "SELECT * FROM dwgtbl ";
	$sql .= "ORDER BY Dwg_ref ASC";

	//result set is the output of the query. This can be placed in an Associative array
	$query_set = mysqli_query($PD, $sql);

	test_query($query_set);
	return $query_set;
	}

function find_dwg_class($code)
	{
	global $PD;

	$sql = "SELECT * FROM dwgtbl WHERE dwg_disc = "."'" . de($PD, $code) . "'";
	$query_set = mysqli_query($PD, $sql); //returns a result set from query.
	test_query($query_set);
	return $query_set;
	}

function find_all_mat()
	{
	global $PD;

	$sql = "SELECT * FROM mattbl ";
	$sql .= "ORDER BY Mat_ref ASC";

	$query_set = mysqli_query($PD, $sql);

	test_query($query_set);
	return $query_set;
	}

function find_mat_class($code)
	{
	global $PD;

	$sql = "SELECT * FROM mattbl WHERE Mat_type = "."'" . de($PD, $code) . "'";
	$query_set = mysqli_query($PD, $sql);
	test_query($query_set);
	return $query_set;
	}

//Validation
function validate_dwg_edit($edit_set)
	{
    $errors = [];
		// fields value test
		if(is_blank($edit_set['Dwg_ref'])) {
			$errors[] = "Reference cannot be blank.";
		} if (is_blank($edit_set['Dwg_name'])) {
			$errors[] = "Name cannot be blank.";
		} if(!has_length($edit_set['Dwg_name'], ['min' => 10, 'max' => 100])) {
			$errors[] = "Name must be between 10 and 100 characters.";
		}
    return $errors;
	}

function validate_dwg_new($create_set)
	{
    $errors = [];
		// fields value test
		if(is_blank($create_set['Dwg_ref'])) {
			$errors[] = "Reference cannot be blank.";
		} if (is_blank($create_set['Dwg_name'])) {
			$errors[] = "Name cannot be blank.";
		} if(!has_length($create_set['Dwg_name'], ['min' => 10, 'max' => 100])) {
			$errors[] = "Name must be between 10 and 100 characters.";
		}
    return $errors;
	}

function validate_mat_edit($edit_set)
	{
    $errors = [];
		// fields value test
		if(is_blank($edit_set['Mat_ref'])) {
			$errors[] = "Reference cannot be blank.";
		} if (is_blank($edit_set['Mat_name'])) {
			$errors[] = "Name cannot be blank.";
		} if(!has_length($edit_set['Mat_name'], ['min' => 10, 'max' => 100])) {
			$errors[] = "Name must be between 10 and 100 characters.";
		}
    return $errors;
	}

function validate_mat_new($create_set)
	{
    $errors = [];
		// fields value test
		if(is_blank($create_set['Mat_ref'])) {
			$errors[] = "Reference cannot be blank.";
		} if (is_blank($create_set['Mat_name'])) {
			$errors[] = "Name cannot be blank.";
		} if(!has_length($create_set['Mat_name'], ['min' => 10, 'max' => 100])) {
			$errors[] = "Name must be between 10 and 100 characters.";
		}
    return $errors;
	}

//FIND a single record
function find_dwg_id($dwg_ID)
	{
	global $PD;

	$sql = "SELECT * FROM dwgtbl ";
	$sql .= "WHERE id ="."'". de($PD, $dwg_ID) . "'";
	$query_set = mysqli_query($PD, $sql); //returns a result set from query. single record
	test_query($query_set);
	$result_dwg = mysqli_fetch_assoc($query_set); //returns associative array
	mysqli_free_result($query_set);
	return $result_dwg; //associative array
	}

function find_mat_id($edMatId)
	{
	global $PD;

	$sql = "SELECT * FROM mattbl WHERE id = '" .  de($PD, $edMatId) . "'";
	$query_set = mysqli_query($PD, $sql);
	test_query($query_set);
	$result_mat = mysqli_fetch_assoc($query_set);
	mysqli_free_result($query_set);
	return $result_mat;
	}

function find_user($user)
	{
	global $PD;

	$sql = "SELECT * FROM usertbl WHERE uname = '" . $user['uname'] . "'";
	$query_set = mysqli_query($PD, $sql);
	test_query($query_set);
	$result_user = mysqli_fetch_assoc($query_set);
	mysqli_free_result($query_set);
	return $result_user;
	}

//Insert query returns TRUE or FALSE
function insert_user($create_set)
	{
	global $PD;

	$encpass = password_hash($create_set['Password'], PASSWORD_BCRYPT);

	$sql = "INSERT INTO usertbl (name, position, email, uname, pword) ";
	$sql .= "VALUES ('" .  de($PD, $create_set['fullName']). "','" .  de($PD, $create_set['Position']) . "','" .  de($PD, $create_set['Email']) . "','" ;
	$sql .=  de($PD, $create_set['Username']) . "','" .  de($PD, $encpass) . "')";
	$query_set = mysqli_query($PD, $sql);
	return $query_set;
	}


function insert_new_dwg($create_set)
	{
	global $PD;

	$error_set = validate_dwg_new($create_set);
	if (!empty($error_set))
		{
		return $error_set;
		}

	$sql = "INSERT INTO dwgtbl (Dwg_disc, dwg_ref, Dwg_name) ";
	$sql .="VALUES ('" .  de($PD, $create_set['Dwg_disc']). "','" .  de($PD, $create_set['Dwg_ref']) . "','" .  de($PD, $create_set['Dwg_name']) . "')";
	$query_set = mysqli_query($PD, $sql);
	return $query_set;
	}

function insert_new_mat($create_set)
	{
	global $PD;

	$error_set = validate_mat_new($create_set);
	if (!empty($error_set))
		{
		return $error_set;
		}

	$sql = "INSERT INTO mattbl (Mat_type, Mat_ref, Mat_name) ";
	$sql .="VALUES ('" .  de($PD, $create_set['Mat_type']) . "','" .  de($PD, $create_set['Mat_ref']) . "','" .  de($PD, $create_set['Mat_name']) . "')";
	$query_set = mysqli_query($PD, $sql);
	return $query_set;
	}

//UPDATE query returns TRUE or FLASE
function change_dwg($edit_set)
	{
	global $PD;

	$error_set = validate_dwg_edit($edit_set);

	if (!empty($error_set))
		{
		return $error_set;
		}

		$sql = " UPDATE dwgtbl SET ";
		$sql .= "Dwg_disc = '" . de($PD, $edit_set['Dwg_disc']) . "',";
		$sql .= "Dwg_ref = '" . de($PD, $edit_set['Dwg_ref']) . "',";
		$sql .= "Dwg_name = '" . de($PD, $edit_set['Dwg_name']) . "'";
		$sql .= "WHERE id = '" . de($PD, $edit_set['id']) . "'";

		$query_set = mysqli_query($PD, $sql);
		return $query_set;

	}

function change_mat ($edit_set)
	{
	global $PD;

	$error_set = validate_mat_edit($edit_set);
	if (!empty($error_set))
		{
		return $error_set;
		}

	$sql = " UPDATE mattbl SET ";
	$sql .= "Mat_type = '" . de($PD, $edit_set['Mat_type']) . "',";
	$sql .= "Mat_ref = '" . de($PD, $edit_set['Mat_ref']) . "',";
	$sql .= "Mat_name = '" . de($PD, $edit_set['Mat_name']) . "'";
	$sql .= "WHERE id = '" . de($PD, $edit_set['id']) . "'";

	$query_set = mysqli_query($PD, $sql);
	return $query_set;

	}

//DELETE query
function delete_dwg ($del_set)
	{
	global $PD;

	$sql = "DELETE FROM dwgtbl WHERE id = '" . de($PD, $del_set['id'])  . "' LIMIT 1";
	$query_set = mysqli_query($PD, $sql);

	if($query_set)
		{
		redirect_to(url_for('engineering/dwg/dwg-index.php'));
		}
	else
		{
		echo mysqli_error($PD);
		db_disconnect($PD);
		exit;
		}
	}

function delete_mat($del_set)
	{
	global $PD;

	$sql = "DELETE FROM mattbl WHERE id = '" . de($PD, $del_set['id']) . "' LIMIT 1" ;
	$query_set = mysqli_query($PD, $sql);

	if($query_set)
		{
		redirect_to(url_for('engineering/mat/mat-index.php'));
		}
	else
		{
		echo mysqli_error($PD);
		db_disconnect($PD);
		exit;
		}
	}





?>
