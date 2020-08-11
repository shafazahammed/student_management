
	<div class="students">
		<form  method="post" action="../editStudent">
			<div class="cellspace">
				<input type="text" name="st_id" value="<?php echo $student->st_id; ?>" hidden>
			</div>
			<div class="cellspace">
				<label for="firstname"> First Name</label>
				<input type="text" name="firstname" value="<?php echo $student->firstname; ?>" placeholder="First Name">
			</div>
			<div class="cellspace">
				<label for="lastname"> Last Name</label>
				<input type="text" name="lastname" placeholder="Last Name" value="<?php echo $student->lastname; ?>">
			</div>
			<div class="cellspace">
				<label for="email"> Email </label>
				<input type="email" name="email" placeholder="Email" value="<?php echo $student->email; ?>" readonly>
			</div>
			<div class="cellspace">
				<label for="grade"> Grade </label>
				<select name="grade" >
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
				<select name="branch_id" >
				<?php foreach ($branches as $b):
					$selected = $b->id == $student->branch_id ? 'selected' : '';
					 ?>
					<option value="<?php echo $b->id;?>" <?php echo $selected; ?>><?php echo $b->branch_name; ?></option>
				<?php endforeach; ?>
				</select>
			</div>
			<div class="cellspace">
				<label for="joindate"> Joined Date </label>
				<input type="date" name="date_of_join"  value="<?php echo $student->date_of_join;?>" placeholder="DD/MM/YYYY">
			</div>
			<div>
				<button type="submit">Update Student</button>
			</div>
		</form>
	</div>

