<?php
require('user.php');
require('functions.php');

//Users array
$users = ['Jack','John','Bill'];
$i=0;
foreach ($users as $user) {
  //Create user
  $users[$i] = new user($user,10000,'');
  //Get user
  $users[$i]->get();
  echo '<br>';
  $i++;
}
?>
<h1>Transfer Monycks</h1>
<form method="POST">
  <input type="number" max="10000" name="amount"><br>
  FROM
  <select name="sender">
    <?php userList($users); ?>
  </select>
  TO
  <select name="receiver">
    <?php userList($users); ?>
  </select><br>
  <input type="submit" value="Send">
</form>
<?php
if (isset($_POST['amount']) && $_POST['sender'] != $_POST['receiver']) {
  $senderID = $_POST['sender'];
  $receiverID = $_POST['receiver'];
  $amount = $_POST['amount'];
  // Sample transfer
  $users[$senderID]->credit($users[$receiverID],$amount);
  echo '<br>';
  $users[$senderID]->get();
  echo '<br> transfered <b>'.$amount.'</b> to <br><br>';
  $users[$receiverID]->get();
}
