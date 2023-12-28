<form method="post">
<table class="table table-hover">
<tr>

<th> Select Faculty</th>
<td>
<select name="faculty" class="form-control">
	<?php
	$sql=mysqli_query($conn,"select * from faculty");
	while($r=mysqli_fetch_array($sql))
	{
	echo "<option value='".$r['email']."'>".$r['Name']."</option>";
	}
	?>
</select>
</td>
<td><input name="sub" type="submit" value="Check Average" class="btn btn-success"/></td>
</tr>
</table>
</form>
<hr style="border:1px solid red"/>


<?php
extract($_POST);
if(isset($sub))
{
//Count total Votes
$r=mysqli_query($conn,"select * from feedback where faculty_id='$faculty'");
$p=mysqli_query($conn,"select * from faculty where email='$faculty'");
$c=mysqli_num_rows($r);
$q=mysqli_fetch_array($p);
echo "<h4>Faculty Name:<b>".$q['Name']."</b></h4>"; 
echo "<h4>Program:<b>".$q['programme']."</b></h4>"; 
echo "<h4>Year:<b>".$q['semester']."</b></h4>"; 	
echo "<h4>Total Student Attempts : <b>".$c."</b></h4>";

//question 1 start
echo "<h2>Faculty Feedback</h2>";

$p1=mysqli_query($conn,"SELECT AVG(quest1) AS avg1,AVG(quest2) AS avg2,AVG(quest3) AS avg3,AVG(quest4) AS avg4,AVG(quest5) AS avg5,AVG(quest6) AS avg6,AVG(quest7) AS avg7,AVG(quest8) AS avg8,AVG(quest9) AS avg9,AVG(quest10) AS avg10,AVG(quest11) AS avg11,AVG(quest12) AS avg12 FROM feedback WHERE faculty_id='$faculty' ");
$q1=mysqli_fetch_assoc($p1);
$avg1=$q1['avg1'];
?>
<table class="table table-bordered">
<tr class="success">
<th>Questions</th>
<th>Average Score</th>
<tr>
<td>
Teacher provided the course outline having weekly content plan with list of required text book :</td><td><?php echo $avg1;?></td> 
</tr>
<tr>
<?php $avg2=$q1['avg2'];?>
<td>Course objectives, learning outcomes and grading criteria are clear :</td><td> <?php echo $avg2;?></td>
</tr>

<tr>
<?php $avg3=$q1['avg3'];?>
<td>Course integrates theoritical course concepts with the real world examples :</td><td><?php echo $avg3;?></td>
</tr>
<tr>

<?php $avg4=$q1['avg4'];?>

<td>Teacher is punctual, arrives on time and leaves on time :</td><td> <?php echo $avg4;?></td>
</tr>

<tr>
<?php $avg5=$q1['avg5'];?>
<td>Teacher is good at stimulation the interest in the course content :</td><td> <?php echo $avg5;?></td>

</tr>
<tr>
<?php $avg6=$q1['avg6'];?>
<td>Teacher is good at explaining the subject matter :</td><td><?php echo $avg6;?></td>
</tr>

<tr>
<?php $avg7=$q1['avg7'];?>
<td>Teacher's presentation was clear, loud and easy to understand  :</td><td> <?php echo $avg7;?></td>
</tr>

<tr>
<?php $avg8=$q1['avg8'];?>
<td>Teacher is good at using innovative teaching methods/ways :</td><td> <?php echo $avg8;?></td>
</tr>

<tr>
<?php $avg9=$q1['avg9'];?>
<td>Teacher is available and helpful during counselling hours :</td><td> <?php echo $avg9;?></td>
</tr>

<tr>
<?php $avg10=$q1['avg10'];?>
<td>Teacher has completed the whole course as per course outline :</td><td> <?php echo $avg10;?></td>
</tr>
<tr>
<?php $avg11=$q1['avg11'];?>
<td>Teacher was always fair and impartial :</td><td> <?php echo $avg11;?></td>
</tr>

<tr>
<?php $avg12=$q1['avg12'];?>
<td>Assessments conducted are clearly connected to maximize learning objectives :</td><td> <?php echo $avg12;?></td>
</tr>

<tr>
<?php $total=$avg1+$avg2+$avg3+$avg4+$avg5+$avg6+$avg7+$avg8+$avg9+$avg10+$avg11+$avg12;?>
<td><b>Total Average</b> </td>
<td><b><?php echo $total."/60";?></b></td>
</tr>
</table>

<hr>

<?php
}

$p2=$conn->query("SELECT faculty.Name,(AVG(quest1)+AVG(quest2)+AVG(quest3)+AVG(quest4)+AVG(quest5)+AVG(quest6)+AVG(quest7)+AVG(quest8)+AVG(quest9)+AVG(quest10)+AVG(quest11)+AVG(quest12)) AS avgsum FROM feedback,faculty WHERE feedback.faculty_id=faculty.email GROUP BY feedback.faculty_id");

foreach($p2 as $q2)
{
	$n[]=$q2['Name'];
	$a[]=$q2['avgsum'];
}
?>
<h1> Faculty Average Feedback Graph</h1>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div style="width: auto;">
  <canvas id="myChart"></canvas>
</div>
<script>
const labels =<?php echo json_encode($n) ?>;
const data = {
  labels: labels,
  datasets: [{
    label: '',
    data: <?php echo json_encode($a) ?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};
Chart.defaults.font.size = 16;
const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<hr>

