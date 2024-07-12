

<form action="submit_register_form.php" method="POST">
	<div class="form">
		<div class="form-group mb-4">
			<label for="fname" class="text-capitalize">Full name</label>
			<input type="text" class="form-control" id="fname" name="fname" value="<?php echo (!empty($user)) ? $user['full_name'] : '' ;?>">
		</div>
		<div class="form-group mb-4">
			<label for="email" class="text-capitalize">email</label>
			<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo (!empty($user)) ? $user['email'] : '' ;?>" placeholder="name@example.com"> <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group mb-4">
			<label for="pnumber" class="text-capitalize">Phone number</label>
			<input type="text" value="<?php echo (!empty($user)) ? $user['phone_number'] : '' ;?>" class="form-control" id="pnumber" name="pnumber">
		</div>
		<div class="form-group mb-4">
			<label for="password" class="text-capitalize">Password</label>
			<input type="password" value="<?php echo (!empty($user)) ? $user['password'] : '' ;?>" class="form-control" id="password" name="password">
			<input type="hidden" class="form-control" id="password" name="user_role" value='customer'>
			<input type="hidden" class="form-control" name="id" value="<?php echo (!empty($user)) ? $user['id'] : '' ;?>">
		</div>
		
		<div class="form-check mb-4" style="padding-left: 0;">
			<?php if(empty($user)){ ?>
			<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2" style="width: 50%;">Register</button>
			<small id="emailHelp" class="form-text text-muted">Already Registered? <a href="signin.php">Log In</a></small>
			<?php }else{ ?>
			<button type="submit" class="text-uppercase checkout__order-bill__btn py-1 py-md-2" style="width: 50%;">Update</button>
			<?php } ?>
		</div>
	</div>
</form>