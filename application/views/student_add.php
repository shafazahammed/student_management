
		<div class="students">
			<form  method="post" action="insertStudent">
				<div class="cellspace">
					<label for="firstname"> First Name</label>
					<input type="text" name="firstname" placeholder="First Name" required>
				</div>
				<div class="cellspace">
					<label for="lastname"> Last Name</label>
					<input type="text" name="lastname" placeholder="Last Name" required>
				</div>
				<div class="cellspace">
					<label for="email"> Email </label>
					<input type="email" name="email" placeholder="Email" required>
				</div>
				<div class="cellspace">
					<label for="grade"> Grade </label>
					<select name="grade" required>
						<option>Grade 1</option>
						<option>Grade 2</option>
						<option>Grade 3</option>
						<option>Grade 4</option>
						<option>Grade 5</option>
						<option>Grade 6</option>
						<option>Grade 7</option>
						<option>Grade 8</option>
						<option>Grade 9</option>
						<option>Grade 10</option>
					</select>
				</div>
				<div class="cellspace">
					<label for="branch"> School Branch</label>
					<select name="branch_id" required>
					<?php foreach ($branches as $b): ?>
						<option value="<?php echo $b->id;?>"><?php echo $b->branch_name; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="cellspace">
					<label for="joindate"> Joined Date </label>
					<input type="date" name="date_of_join"  placeholder="DD/MM/YYYY" required>
				</div>
				<div>
					<button type="submit">Add Student</button>
				</div>
			</form>
			<?php if(isset($error)) :?>
				<p style="color:red"> <?php echo $error;?> </p>
			<?php endif;?>
		</div>

