<?php 
require_once("conf.php");
require_once("dash_header.php");
require_once("a_sidebar.php");

?>
<form method="post" action="send_emp.php">
    <label> Enter the Employee Name</label>
    <input type="text" value="" name="emp_name" /><br><br>
    <label> Employee Username</label>
    <input type="text" value="" name="emp_username" /><br><br>
    <label> Employee Pass</label>
    <input type="text" value="" name="emp_pass" /><br><br>
    <input type="submit" value="submit" />
</form>
<table border="1">
    <thead>

        <th>Sr No </th>
        <th>Employee Name </th>
        <th>Product Using </th>
        <th> Date and Time of use</th>
        <th>Add or Delete Employee</th>

    </thead>
    <tbody>

        <tr>


        </tr>

    </tbody>
</table>
