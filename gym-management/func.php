<?php
$con = mysqli_connect("localhost:3325", "root", "", "loginsystem");
if (isset($_POST['login_submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from logintb where username='$username' and password='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        header("Location:admin-panel.php");
    } else {
        echo "<script>alert('Invalid credentials')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
if (isset($_POST['addMember_submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $trainer = $_POST['trainer'];
    $query = "insert into member(Trainer_ID,fname,lname,email,contact)values('$trainer','$fname','$lname','$email','$contact')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Member added')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}
if (isset($_POST['tra_submit'])) {
    // $Trainer_id = $_POST['Trainer_id'];
    $Name = $_POST['Name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $query = "insert into trainer(Name,address,email,phone)values('$Name','$address','$email','$phone')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Trainer added.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}
if (isset($_POST['pay_submit'])) {
    // $Payment_id = $_POST['Payment_id'];
    $Amount = $_POST['Amount'];
    $customer_id = $_POST['customer_id'];
    $payment_type = $_POST['payment_type'];
    // $customer_name = $_POST['customer_name'];
    $query = "insert into Payment(Amount,customer_id,payment_type)values('$Amount','$customer_id','$payment_type')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Payment sucessful')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}

if (isset($_POST['package_submit'])) {
    // $Payment_id = $_POST['Payment_id'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];
    $query = "insert into package(Package_name,Amount,duration)values('$name','$amount','$duration')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Package added sucessful')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}
function get_member_details()
{
    global $con;
    // $query = "select * from member";
    $query = "select member.memberID, member.fname,member.lname,member.email,member.contact,trainer.Name, trainer.Trainer_ID FROM member INNER JOIN trainer ON member.Trainer_ID=trainer.Trainer_ID";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $contact = $row['contact'];
        $memberId = $row['memberID'];
        $trainer = $row['Name'];
        $trainerId = $row['Trainer_ID'];
        echo "<tr>
        <td>$memberId</td>
        <td>$fname $lname</td>
        <td>$email</td>
        <td>$contact</td>
        <td>$trainer</td>
        <td>$trainerId</td>
        </tr>";
    }
}
function get_package()
{
    global $con;
    $query = "select * from Package";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $Package_id = $row['Package_id'];
        $Package_name = $row['Package_name'];
        $Amount = $row['Amount'];
        $duration = $row['duration'];

        echo "<tr>
        <td>$Package_id</td>
        <td>$Package_name</td>
        <td>$Amount</td>
        <td>$duration</td>
            
        </tr>";
    }
}
function get_trainer()
{
    global $con;
    $query = "select * from trainer";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $Trainer_id = $row['Trainer_ID'];
        $Name = $row['Name'];
        $address = $row['address'];
        $email = $row['email'];
        $phone = $row['phone'];
        echo "<tr>
        <td>$Trainer_id</td>
        <td>$Name</td>
        <td>$address</td>
        <td>$email</td>
        <td>$phone</td>
        </tr>";
    }
}
function get_payment()
{
    global $con;
    $query = "select payment.Payment_id, payment.Amount,payment.payment_type,payment.customer_id,member.fname,member.lname,member.contact FROM payment INNER JOIN member ON member.memberID=payment.customer_id";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $Payment_id = $row['Payment_id'];
        $Amount = $row['Amount'];
        $payment_type = $row['payment_type'];
        // $customer_id = $row['customer_id'];
        $customer_f = $row['fname'];
        $customer_l = $row['lname'];
        $contact = $row['contact'];
        echo "<tr>
        <td>$Payment_id</td>
        <td>$Amount</td>
        <td>$payment_type</td>
        <td>$customer_f $customer_l</td>
        <td>$contact</td>
            </tr>";
    }
}
