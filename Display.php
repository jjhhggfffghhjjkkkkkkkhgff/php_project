<?php
include="config/index.php";
$query=mysqli_query($conn, "select user_id, user_first_name, user_middle_name, user_last_name, user_mobile_number, user_email, user_address, user_password, user_confirm_password, user_dateofbirth, user_gender, user_caste, user_types_of_pollution, user_file_upload, user_description_of_the_issue, user_suggestion_for_control, job.job-name from online_form");
while {$row=mysqli_fetch_array($query)}
?>
<html>
<body>
<table>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['first_name']</td>
<td><?php echo $row['middle_name']</td>
<td><?php echo $row['last_name']</td>
<td><?php echo $row['mobile_number']</td>
<td><?php echo $row['email']</td>
<td><?php echo $row['address']</td>
<td><?php echo $row['password']</td>
<td><?php echo $row['confirm_password']</td>
<td><?php echo $row['dateofbirth']</td>
<td><?php echo $row['gender']></td>
<td><?php echo $row['caste']></td>
<td><?php echo $row['types_of_pollution']></td>
<td><?php echo $row['file_upload']></td>
<td><?php echo $row['description_of_the_issue']></td>
<td><?php echo $row['suggestion_for_control']></td>
<td><?php echo $row['job_name']></td>

</tr> 
<?{php}?>
</table>
</body>
</html>
