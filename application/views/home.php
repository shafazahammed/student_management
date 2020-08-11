
		<!-- add students button  -->
		<div class="button pull-left">
			<a href="student/add"><button> Add Student </button></a>
		</div>
		<!-- filter  -->
		<div class="pull-right">
			<form method="post" action="<?php site_url().'home/index' ?>">
				<label for="filter">Filter by Branch</label>
				<select name="filter" >
					<option value="">Select Branch</option>
					<?php foreach ($branches as $b): 
						$selected = $b->id == $_POST['filter'] ? 'selected' : '';
						?>

						<option value="<?php echo $b->id;?>" <?php echo $selected ?> ><?php echo $b->branch_name; ?></option>
					<?php endforeach; ?>
				</select>
			<input type="submit" name="apply" value="Apply">
			</form>
		</div>
		<!-- headline  -->
		<h2 class="pull-left">Student List</h2>
		
		<!-- list of students -->
		<table>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th> 
				<th>Email</th>
				<th>Grade</th>
				<th>Branch</th>
				<th>Joined Date</th>
				<th colspan=2>Action</th>
			</tr>
			<!-- forlooping table data  -->
			<?php foreach($students as $student):?>
				<tr>
					<td><?php echo $student->firstname ?></td>
					<td><?php echo $student->lastname ?></td>
					<td><?php echo $student->email ?></td>
					<td><?php echo $student->grade ?></td>
					<td><?php echo $student->branch_name ?></td>
					<td><?php echo $student->date_of_join ?></td>
					<td ><a href="student/update/<?php echo $student->st_id ?>">Edit</a></td>
					<td ><a href="student/view/<?php echo $student->st_id;?>">View</a></td>
				</tr>
			<?php endforeach; ?>
		</table>

