<?php include"header.php";
	require 'includes/dbh.inc.php';
	if (isset($_GET['pid']))
	{
		$pid=$_GET['pid'];
		$vid=$_COOKIE['vid'];
	}
	else {
		header("Location: product.php/error");
		exit();
	}

	$sql = "SELECT * from products where pid=?;";
	$stmt= mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location: ../errors.php?error=single-connfail");
		exit();
	}
	else {
		mysqli_stmt_bind_param($stmt,'s',$pid);
		mysqli_stmt_execute($stmt);
		$result = $stmt->get_result();
		$resCheck =mysqli_num_rows($result);
		if ($resCheck>0)
		{
			$row = mysqli_fetch_assoc($result);
			$description =$row['description'];
			$pid = $row['pid'];
			$name = $row['name'];
			$price =$row['price'];
			$pic=$row['pic'];
		}
		else {
			echo "Sorry, there seems to have been an error.. :p";
			exit();
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
 ?>
<body>
	<div class="fh5co-loader"></div>
	<div id="fh5co-product">
		<div class="container">

				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<?php echo '<h2>'.htmlspecialchars($name).'</h2>'; ?>

					</div>
				</div>
				<div class="col-md-10 col-md-offset-1 animate-box">
					<div class="owl-carousel-fullwidth product-carousel">

						<div class="item">
							<div class="active text-center">
								<figure>
									<?php echo '<img src="images/'.htmlspecialchars($pic).'" alt="product-image" >'; ?>

								</figure>
							</div>
						</div>

						<div class="item">
							<div class="active text-center">
								<figure>
									<?php echo '<img src="images/'.htmlspecialchars($pic).'" alt="product-image" >'; ?>
								</figure>
							</div>
						</div>
					</div>
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading" >
							<?php echo '<h1 style="color:#828282;"><b>$'.htmlspecialchars($price).'</b></h1><br>'; ?>

							<p>
								<form  action="includes/redirect.inc.php" method="post">
									<?php echo '
									<button type="submit" name="addtocart-single" value="'.htmlspecialchars($pid).'" class="btn btn-primary btn-sm btn-block">Add to Cart</a>
									<button type="submit" name="buyframe" value="'.htmlspecialchars($pid).'" class="btn btn-outline-primary btn-sm btn-block" style="background:Black;">Buy It Framed</button>
									';?>
								</form>
							</p>
						</div>
				</div>

			<div class="row">
				<div class="fh5co-tab-content-wrap">

					<div class="fh5co-tab-content tab-content active" data-tab-content="1">
						<div class="col-md-10 col-md-offset-1">
							<?php
							echo '
							<h2>'.htmlspecialchars($name).'</h2>
							<p>'.htmlspecialchars($description).'</p>
							<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>'; ?>

							<div class="row">
								<div class="col-md-6">
									<h2 class="uppercase">Specifications</h2>
									<ul>
										<li>Made with pigment-based ink</li>
										<li>Archival Paper</li>
										<li>Long Lasting</li>
									</ul>
								</div>
								<div class="col-md-6">
									<h2 class="uppercase">Dimensions</h2>
									<ul>
										<li>Standard A4 Size</li>
										<li>21.0 x 29.7cm</li>
										<li>8.27in x 11.69in</li>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include"footer.html" ?>
	</body>
</html>
