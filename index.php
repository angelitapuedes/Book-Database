<?php 

	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT title, author, genre, bid FROM book ORDER BY created_at';

	// get the resbault set (set of rows)
	$result = mysqli_query($conn, $sql);


//Sarah
	//$sqla='SELECT genre, count(bid) FROM book';
	//$count_all=mysqli_query($conn, $sqla);
	//$count=mysqli_fetch_all($count_all, MYSQLI_ASSOC);
	$sqla='SELECT count(*) AS total FROM book';
	$result2=mysqli_query($conn, $sqla);
	$data=mysqli_fetch_assoc($result2);
	echo $data['total'];
	//print_r($count);

    

	// fetch the resulting rows as an array
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Books!</h4>

	<div class="container">
		<div class="row">

				
					<p>Book Count is <?php echo $data['total']; ?></p>
				

			<?php foreach($books as $book): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($book['title']); ?></h6>
							<h6><?php echo htmlspecialchars($book['author']); ?></h6>
							<h6><?php echo htmlspecialchars($book['genre']); ?></h6>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?bid=<?php echo $book['bid'] ?>">more info</a>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="genre_count.php?bid=<?php echo $book['bid'] ?>">Book Data</a>
						</div>

					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>