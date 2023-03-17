<?php
if (isset($_POST["submit"])) {
    $input1 = $_POST["input1"];
    $unit1 = $_POST["inputunit1"];
    $unit2 = $_POST["inputunit2"];
    switch ($unit1) {
        case 'Kilometer':
            $uni = $input1 * 1000;
            break;
        case 'Miles':
            $uni = $input1 * 1609.34;
            break;
        case 'Centimeter':
            $uni = $input1 * 0.01;
            break;
        case 'Milimeter':
            $uni = $input1 * 0.001;
            break;
        default:
            $uni = $input1;
    }
    switch ($unit2) {
        case 'Kilometer':
            $result = $uni / 1000;
            break;
        case 'Miles':
            $result = $uni / 1609.34;
            break;
        case 'Centimeter':
            $result = $uni / 0.01;
            break;
        case 'Milimeter':
            $result = $uni / 0.001;
            break;
        default:
            $result = $uni;
    }
    echo $result;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Length and Distance Converter</title>
        <link rel="icon" href="favicon.svg" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'>
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./wp.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-custom navbar-mainbg">
            <a class="navbar-brand navbar-logo" href="index.php">Measurement Converter</a>
            <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <div class="hori-selector">
                        <div class="left"></div>
                        <div class="right"></div>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fa fa-address-card"></i>About</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="fb.php"><i class="fa-regular fa-envelope"></i>Feedback</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="ld.php"><i class="fa fa-ruler"></i>Length & Distance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="area.php"><i class="fa fa-clone"></i>Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vol.php"><i class="fa fa-prescription-bottle"></i>Volume and Capacity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mass.php"><i class="fa-solid fa-scale-unbalanced-flip"></i>Mass and Weight</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="speed.php"><i class="fa fa-tachometer-average"></i>Speed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="temp.php"><i class="fa fa-temperature-high"></i>Temprature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cur.php"><i class="fa fa-thin fa-wallet"></i>Currency</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="form">
            <form action="#" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="input1">From</label>
                        <input type="number" class="form-control" id="input1" name="input1" placeholder="Enter Number" value="<?php if (isset($input1)) echo $input1; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputunit1">Unit</label>
                        <select class="form-control" id="inputunit1" name="inputunit1">
                            <option id="km" value="Kilometer" <?php if (isset($unit1)) {
                                                                    if ($unit1 == 'Kilometer') echo "selected";
                                                                } ?>>Kilometer</option>
                            <option id="ml" value="Miles" <?php if (isset($unit1)) {
                                                                if ($unit1 == 'Miles') echo "selected";
                                                            } ?>>Miles</option>
                            <option id="mtr" value="Meters" <?php if (isset($unit1)) {
                                                                if ($unit1 == 'Meters') echo "selected";
                                                            } ?>>Meters</option>
                            <option id="cm" value="Centimeter" <?php if (isset($unit1)) {
                                                                    if ($unit1 == 'Centimeter') echo "selected";
                                                                } ?>>Centimeter</option>
                            <option id="mm" value="Milimeter" <?php if (isset($unit1)) {
                                                                    if ($unit1 == 'Milimeter') echo "selected";
                                                                } ?>>Milimeter</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="input2">To</label>
                        <input type="number" class="form-control" id="input2" name="input2" placeholder="Enter Number" value="<?php if (isset($result)) echo $result; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputunit2">Unit</label>
                        <select class="form-control" name="inputunit2" id="inputunit2">
                            <option id="km1" value="Kilometer" <?php if (isset($unit2)) {
                                                                    if ($unit2 == 'Kilometer') echo "selected";
                                                                } ?>>Kilometer</option>
                            <option id="ml1" value="Miles" <?php if (isset($unit2)) {
                                                                if ($unit2 == 'Miles') echo "selected";
                                                            } ?>>Miles</option>
                            <option id="mtr1" value="Meters" <?php if (isset($unit2)) {
                                                                    if ($unit2 == 'Meters') echo "selected";
                                                                } ?>>Meters</option>
                            <option id="cm1" value="Centimeter" <?php if (isset($unit2)) {
                                                                    if ($unit2 == 'Centimeter') echo "selected";
                                                                } ?>>Centimeter</option>
                            <option id="mm1" value="Milimeter" <?php if (isset($unit2)) {
                                                                    if ($unit2 == 'Milimeter') echo "selected";
                                                                } ?>>Milimeter</option>
                        </select>
                    </div>
                </div>

                <center><input class="btn" name="submit" type="submit"><i class="fa  fa-arrow-right-arrow-left"></i></center>
            </form>
        </div>
        <div class="chat-me">
            <a aria-label="Chat on WhatsApp" href="https://wa.me/9879228567?text=Hello%20Prem%20Mehta%20here">
                <img alt="Chat on WhatsApp" src="wp.png" />
            </a>
        </div>
        <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js'></script>
        <script src="./script.js"></script>
    </body>s

    </html>

</body>

</html>