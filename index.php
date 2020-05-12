<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
function loadRegistrations($filename)
{
    $jsondata = file_get_contents($filename);
    $arr_data = json_decode($jsondata, true);
    return $arr_data;
}

function saveDataSON($filename, $name, $email, $phone)
{
    try {
        $contact = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        );
        //converts json data into array
        $arr_data = loadRegistrations($filename);
        // Push user data to array
        array_push($arr_data, $contact);
        // Convert updated array to JSON
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        // write json data into data .json file
        file_put_contents($filename, $jsondata);
        echo "Luu du lieu thanh cong!";
    } catch (Exception $e) {
        echo 'Loi: ', $e->getMessage(), "\n";
    }
}

$nameErr = NULL;
$emailErr = NULL;
$phoneErr = NULL;
$name = NULL;
$email = NULL;
$phone = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $has_error = false;

    if (empty($name)) {
        $nameErr = "Ten dang nhap khong duoc de trong!";
        $has_error = true;
    }
    if (empty($email)) {
        $emailErr = "Email khong duoc de trong!";
        $has_error = true;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Dinh dang email sai (abc@abc.com.vn)!";
            $has_error = true;
        }
    }
    if (empty($phone)) {
        $phoneErr = "So dien thoai khong duoc de trong!";
        $has_error = true;
    }
    if ($has_error === false) {
        saveDataSON("data.json", $name, $email, $phone);
        $name = NULL;
        $email = NULL;
        $phone = NULL;
    }
}
?>
<h2>Registration Form</h2>
<form method="post">
    <fieldset>
        <legend>Details</legend>
        Name: <input type="text" name="name" value="<?php echo $name; ?>"/>
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>"/>
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Phone: <input type="text" name="phone" value="<?php echo $phone; ?>"/>
        <span class="error">* <?php echo $phoneErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Register"/>
        <p><span class="error">* required field.</span></p>
    </fieldset>

</form>
<?php
$registrations = loadRegistrations('data.json');
?>
<h2>Registration list</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php foreach ($registrations as $registration): ?>
        <tr>
            <td><?php echo $registration['name']; ?></td>
            <td><?php echo $registration['email']; ?></td>
            <td><?php echo $registration['phone']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>