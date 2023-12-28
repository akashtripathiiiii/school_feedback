<?php 
$q=mysqli_query($conn,"select * from feedback where faculty_id='".$_SESSION['faculty_login']."'");
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
		<h1 align="center" >Your Average Feedback</h1>
	</div>
</div>
<div class="row">

<div class="col-sm-12">
<?php
$r=mysqli_query($conn,"select * from feedback where faculty_id='".$_SESSION['faculty_login']."'");
$c=mysqli_num_rows($r);
echo "<h4>Total Student Feedbacks : <b>".$c."</b></h4>";
$p1=mysqli_query($conn,"SELECT AVG(quest1) AS avg1,AVG(quest2) AS avg2,AVG(quest3) AS avg3,AVG(quest4) AS avg4,AVG(quest5) AS avg5,AVG(quest6) AS avg6,AVG(quest7) AS avg7,AVG(quest8) AS avg8,AVG(quest9) AS avg9,AVG(quest10) AS avg10,AVG(quest11) AS avg11,AVG(quest12) AS avg12 FROM feedback WHERE faculty_id='".$_SESSION['faculty_login']."' ");
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
<td><b>Total Average Feedback Score</b> </td>
<td><b><?php echo $total."/60";?></b></td>
</tr>
</table>




</div>
</div>
<?php }?>