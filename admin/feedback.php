<?php 
$q=mysqli_query($conn,"select user.name,user.id as 'uid',faculty.name as 'fname',faculty.id as 'fid',quest1,quest2,quest3,quest4,quest5,quest6,quest7,quest8,quest9,quest10,quest11,quest12,quest13,quest14 from user,faculty,feedback where feedback.student_id=user.email and feedback.faculty_id=faculty.email");
$r=mysqli_num_rows($q);
if($r==false)
{
echo "<h3 style='color:Red'>No any records found ! </h3>";
}
else
{
?>

<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_feedback.php?id='+id;
     }
}
</script>	


<div class="row">
	<div class="col-sm-12" style="color:orange;">
		<h1 align="center" >Feedback</h1>
	</div>
</div>
<div class="row">

<div class="col-sm-12" style="overflow-x:auto;">

<table class="table table-bordered">

	<thead >
	
	<tr class="success">
		<th>Sr.No</th>
		<th>Student</th>
		<th>Teacher</th>
		<th title="Teacher provided the course outline having weekly content plan with list of required text book">Question 1</th>
		<th title="Course objectives, learning outcomes and grading criteria are clear">Question 2</th>
		<th title="Course integrates theoritical course concepts with the real world examples">Question 3</th>
		<th title="Teacher is punctual, arrives on time and leaves on time">Question 4</th>
		<th title="Teacher is good at stimulation the interest in the course content">Question 5</th>
		<th title="Teacher is good at explaining the subject matter">Question 6</th>
		<th title="Teacher's presentation was clear, loud and easy to understand">Question 7</th>
		<th title="Teacher is good at using innovative teaching methods/ways">Question 8</th>
		<th title="Teacher is available and helpful during counselling hours">Question 9</th>
		<th title="Teacher has completed the whole course as per course outline">Question 10</th>
		<th title="Teacher was always fair and impartial">Question 11</th>
		<th title="Assessments conducted are clearly connected to maximize learning objectives">Question 12</th>
		<th title="What Students liked about the course?">Question 13</th>
		<th title="Why Students disliked about the course?">Question 14</th>
		</tr>
		</thead>
		
		<?php
		$i=1;
	while($row=mysqli_fetch_array($q))
		{
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$row[0]."(".$row[1].")</td>";
			echo "<td>".$row[2]."(".$row[3].")</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";
			echo "<td>".$row[7]."</td>";
			echo "<td>".$row[8]."</td>";
			echo "<td>".$row[9]."</td>";
			echo "<td>".$row[10]."</td>";
			echo "<td>".$row[11]."</td>";
			echo "<td>".$row[12]."</td>";
			echo "<td>".$row[13]."</td>";
			echo "<td>".$row[14]."</td>";
			echo "<td>".$row[15]."</td>";
			echo "<td>".$row[16]."</td>";
			echo "<td>".$row[17]."</td>";
			
			//echo "<td><a href='#' onclick='deletes($row[id])'>Delete</a></td>";
			echo "</tr>";
		$i++;
		}
		
		?>
		
	
		
</table>
</div>
</div>
<?php }?>