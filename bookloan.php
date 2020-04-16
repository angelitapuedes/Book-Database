<?php 

	include('config/db_connect.php');

	$bid = $rid = $issue_date = $due_date='';
	$errors = array('bid' => '', 'rid' => '', 'issue_date' => '', 'due_date' => '');

	if(isset($_POST['submit'])){
		
		// check title
		if(empty($_POST['bid'])){
			$errors['bid'] = 'A bid is required';
		} else{
			$bid = $_POST['bid'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $bid)){
				$errors['bid'] = 'Bid must be letters and spaces only';
			}
		}

		// check rid
		if(empty($_POST['rid'])){
			$errors['rid'] = 'A rid is required';
		} else{
			$rid = $_POST['rid'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $rid)){
				$errors['rid'] = 'Rid must be letters and spaces only';
			}
		}

		// check issuedate
		if(empty($_POST['issue_date'])){
			$errors['issue_date'] = 'A issue date is required';
		} else{
			$issue_date = $_POST['issue_date'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $issue_date)){
				$errors['issue_date'] = 'Issue date must be letters and spaces only';
			}
		}

		// check duedate
		if(empty($_POST['due_date'])){
			$errors['due_date'] = 'A due date is required';
		} else{
			$due_date = $_POST['due_date'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $due_date)){
				$errors['due_date'] = 'Due date must be letters and spaces only';
			}
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$bid = mysqli_real_escape_string($conn, $_POST['bid']);
			$rid = mysqli_real_escape_string($conn, $_POST['rid']);
			$issue_date = mysqli_real_escape_string($conn, $_POST['issue_date']);
			$due_date = mysqli_real_escape_string($conn, $_POST['due_date']);

			// create sql
			$sql = "INSERT INTO book_loan(bid,rid,issue_date,due_date) VALUES('$bid','$rid','$issue_date','$due_date')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index2.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
			
		}

	} // end POST check



?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Loan a Book</h4>
		<form class="white" action="bookloan.php" method="POST">
			<label>Book ID</label>
			<input type="text" name="bid" value="<?php echo htmlspecialchars($bid) ?>">
			<div class="red-text"><?php echo $errors['bid']; ?></div>
			<label>Reader ID</label>
			<input type="text" name="rid" value="<?php echo htmlspecialchars($rid) ?>">
			<div class="red-text"><?php echo $errors['rid']; ?></div>
			<label>Issue Date</label>
			<input type="text" name="issue_date" value="<?php echo htmlspecialchars($issue_date) ?>">
			<div class="red-text"><?php echo $errors['issue_date']; ?></div>
			<label>Due Date</label>
			<input type="text" name="due_date" value="<?php echo htmlspecialchars($due_date) ?>">
			<div class="red-text"><?php echo $errors['due_date']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>