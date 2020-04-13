<?php 
  function execute($sql) {
      try {
        require "config.php";
        $connection = new PDO($dsn, $username, $password, $options);
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    
      } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
      }
      return $result;
    }
?>

<?php include "templates/header.php"; ?>
<h2>Appointments</h2>

<!-- forms and triggers -->
<label for="1">(b) Get appointments for a given <b>dentist</b> for a specific <b>week</b></label>
<form id="1" method="post">
    <label for="dentistId">dentist id</label>
    <input type="text" name="dentistId" id="dentistId" />
    <label for="week">start week</label>
    <input type="text" name="startWeek" id="startWeek" placeholder="2020-01-01 09:00:00"/>
    <label for="week">end week</label>
    <input type="text" name="endWeek" id="endWeek" placeholder="2020-01-04 13:00:00" />
    <input class="submit" type="submit" name="apptsByDentist&Week" value="get">
</form>


<label for="2">(c) Get appointments in a <b>clinic</b> by <b>date</b></label>
<form id="2" method="post">
    <label for="clinicId">clinic id</label>
    <input type="text" name="clinicId" id="clinicId" />
    <label for="date">date</label>
    <input type="text" name="date" id="date" placeholder="2020-01-01 09:00:00"/>
    <input type="submit" name="apptsByClinicAndDate" value="get">
</form>


<label for="3">(d) Get appointments for a <b>patient</b></label>
<form id="3" method="post">
    <label for="patientId">patient id</label>
    <input type="text" name="patientId" id="patientId" />
    <input type="submit" name="apptsByPatient" value="get">
</form>


<label for="4">Get patients and their missed appointments </label>
<form id="4" method="post">
    <input type="submit" name="patientAndMissedAppts" value="get">
</form>

<!-- controllers and results -->
<?php
if (isset($_POST['apptsByDentist&Week'])) {
    $sql = sprintf("SELECT * FROM appointment WHERE `from` > '%s' AND `from` < '%s' AND supervisorID = %s",$_POST['startWeek'],$_POST['endWeek'],$_POST['dentistId'] );
    $result = execute($sql);
    if($result) { ?>
    <table>
      <thead>
        <tr>
            <th>AID</th>
            <th>was missed</th>
            <th>from</th>
            <th>to</th>
            <th>recordedBy</th>
            <th>patientAccountId</th>
            <th>supervisorId</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($result as $row) { ?>
      <tr>
            <td><?php echo $row["AID"]; ?></td>
            <td><?php echo $row["wasMissed"]; ?></td>
            <td><?php echo $row["from"]; ?></td>
            <td><?php echo $row["to"]; ?></td>
            <td><?php echo $row["recordedBy"]; ?></td>
            <td><?php echo $row["patientAccountID"]; ?></td>
            <td><?php echo $row["supervisorID"]; ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
    <?php }
} ?>

<?php if (isset($_POST['apptsByClinicAndDate'])) {
   $sql = sprintf("SELECT appointment.AID, appointment.wasMissed, appointment.from, appointment.to, appointment.recordedBy, appointment.patientAccountID, appointment.supervisorID
   FROM appointment, employee
   WHERE employee.clinicID = %s
   AND appointment.supervisorID = employee.EID
   AND convert(DATE, appointment.from) = '%s'
   ", $_POST['clinicId'], $_POST['date']
   );
   $result = execute($sql);
   if($result) { ?>
   <table>
     <thead>
       <tr>
           <th>AID</th>
           <th>was missed</th>
           <th>from</th>
           <th>to</th>
           <th>recordedBy</th>
           <th>patientAccountId</th>
           <th>supervisorId</th>
       </tr>
     </thead>
     <tbody>
   <?php foreach ($result as $row) { ?>
     <tr>
           <td><?php echo $row["AID"]; ?></td>
           <td><?php echo $row["wasMissed"]; ?></td>
           <td><?php echo $row["from"]; ?></td>
           <td><?php echo $row["to"]; ?></td>
           <td><?php echo $row["recordedBy"]; ?></td>
           <td><?php echo $row["patientAccountID"]; ?></td>
           <td><?php echo $row["supervisorID"]; ?></td>
     </tr>
   <?php } ?>
     </tbody>
 </table>
   <?php }
} ?>

<?php 
if (isset($_POST['apptsByPatient'])) {
    $sql = "SELECT * FROM hvc353_4.appointment";
    $result = execute($sql);
    if($result) { ?>
    <table>
      <thead>
        <tr>
            <th>AID</th>
            <th>was missed</th>
            <th>from</th>
            <th>to</th>
            <th>recordedBy</th>
            <th>patientAccountId</th>
            <th>supervisorId</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($result as $row) { ?>
      <tr>
            <td><?php echo $row["AID"]; ?></td>
            <td><?php echo $row["wasMissed"]; ?></td>
            <td><?php echo $row["from"]; ?></td>
            <td><?php echo $row["to"]; ?></td>
            <td><?php echo $row["recordedBy"]; ?></td>
            <td><?php echo $row["patientAccountID"]; ?></td>
            <td><?php echo $row["supervisorID"]; ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
    <?php }
 } ?>

<?php
if (isset($_POST['patientAndMissedAppts'])) {
    $sql = "SELECT * FROM hvc353_4.appointment";
    $result = execute($sql);
    if($result) { ?>
    <table>
      <thead>
        <tr>
            <th>AID</th>
            <th>was missed</th>
            <th>from</th>
            <th>to</th>
            <th>recordedBy</th>
            <th>patientAccountId</th>
            <th>supervisorId</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($result as $row) { ?>
      <tr>
            <td><?php echo $row["AID"]; ?></td>
            <td><?php echo $row["wasMissed"]; ?></td>
            <td><?php echo $row["from"]; ?></td>
            <td><?php echo $row["to"]; ?></td>
            <td><?php echo $row["recordedBy"]; ?></td>
            <td><?php echo $row["patientAccountID"]; ?></td>
            <td><?php echo $row["supervisorID"]; ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
    <?php }
 } ?>

<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>