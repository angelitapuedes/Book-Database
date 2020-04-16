<?php 

	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT bid, rid, issue_date, due_date FROM book_loan';

	// get the resbault set (set of rows)
	$result = mysqli_query($conn, $sql);
	//echo print_r($result);
    //$sqla='SELECT count(*) AS total FROM book';
	//$result2=mysqli_query($conn, $sqla);
	//$data=mysqli_fetch_assoc($result2);
	//echo $data['total'];
	

    //fetch the resulting rows as an array
	$bookloans = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free the $result from memory (good practise)
	mysqli_free_result($result);

	//close connection
	mysqli_close($conn);
	

	


//Sarah
	//$sqla='SELECT genre, count(bid) FROM book';
	//$count_all=mysqli_query($conn, $sqla);
	//$count=mysqli_fetch_all($count_all, MYSQLI_ASSOC);
	//$sqla='SELECT count(*) AS total FROM book';
	//$result2=mysqli_query($conn, $sqla);
	//print_r($count);
	//$data=mysqli_fetch_assoc($result2);
	//echo $data['total'];



    

	// fetch the resulting rows as an array
	//$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

	


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Book Loans!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($bookloans as $bookloan): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($bookloan['bid']); ?></h6>
							<h6><?php echo htmlspecialchars($bookloan['rid']); ?></h6>
							<h6><?php echo htmlspecialchars($bookloan['issue_date']); ?></h6>
							<h6><?php echo htmlspecialchars($bookloan['due_date']); ?></h6>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>