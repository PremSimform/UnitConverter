<?php
if (isset($_POST["submit"])) {
    $input1 = $_POST["input1"];
    $unit1 = $_POST["inputunit1"];
    $unit2 = $_POST["inputunit2"];
    switch ($unit1) {
        case 'Cubic Foot':
            $uni = $input1 * 28316.8;
            break;
        case 'Liter':
            $uni = $input1 * 1000;
            break;
        case 'Gallon':
            $uni = $input1 * 4546.09;
            break;
        case 'Cubic Inch':
            $uni = $input1 * 16.3871;
            break;
        case 'Milli Liter':
            $uni = $input1;
            break;
    }
    switch ($unit2) {
        case 'Cubic Foot':
            $result = $uni / 28316.8;
            break;
        case 'Gallon':
            $result = $uni / 4546.09;
            break;
        case 'Cubic Inch':
            $result = $uni / 16.3871;
            break;
        case 'Liter':
            $result = $uni / 1000;
            break;
        case 'Milli Liter':
            $result = $uni;
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volume Converter</title>
    <link rel="icon" href="favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./wp.css">
    </style>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'>
        <link rel="stylesheet" href="./style.css">
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
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php"><i class="fa fa-address-card"></i>About</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="fb.php"><i class="fa-regular fa-envelope"></i>Feedback</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="ld.php"><i class="fa fa-ruler"></i>Length & Distance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="area.php"><i class="fa fa-clone"></i>Area</a>
                    </li>
                    <li class="nav-item active">
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
                        <label for="input1">Length-1</label>
                        <input type="number" class="form-control" id="input1" name="input1" placeholder="Enter Number" value="<?php if (isset($input1)) echo $input1; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputunit1">Unit</label>
                        <select class="form-control" name="inputunit1" id="inputunit1">
                            <option id="ltr1" value="Liter" <?php if (isset($unit1)) {
                                                                if ($unit1 == 'Liter') echo "selected";
                                                            } ?>>Liter</option>
                            <option id="mL" value="Milli Liter" <?php if (isset($unit1)) {
                                                                    if ($unit1 == 'Milli Liter') echo "selected";
                                                                } ?>>Milli Liter</option>
                            <option id="gal" value="Gallon" <?php if (isset($unit1)) {
                                                                if ($unit1 == 'Gallon') echo "selected";
                                                            } ?>>Gallon</option>
                            <option id="Cm" value="Cubic Foot" <?php if (isset($unit1)) {
                                                                    if ($unit1 == 'Cubic Foot') echo "selected";
                                                                } ?>>Cubic Foot</option>
                            <option id="CC" value="Cubic Inch" <?php if (isset($unit1)) {
                                                                    if ($unit1 == 'Cubic Inch') echo "selected";
                                                                } ?>>Cubic Inch</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="input2">Length-2</label>
                        <input type="number" class="form-control" id="input2" name="input2" placeholder="Enter Number" value="<?php if (isset($result)) echo $result; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputunit1$unit1">Unit</label>
                        <select class="form-control" name="inputunit2" id="inputunit2">
                            <option id="ltr1" value="Liter" <?php if (isset($unit2)) {
                                                                if ($unit2 == 'Liter') echo "selected";
                                                            } ?>>Liter</option>
                            <option id="mL1" value="Milli Liter" <?php if (isset($unit2)) {
                                                                        if ($unit2 == 'Milli Liter') echo "selected";
                                                                    } ?>>Milli Liter</option>
                            <option id="gal1" value="Gallon" <?php if (isset($unit2)) {
                                                                    if ($unit2 == 'Gallon') echo "selected";
                                                                } ?>>Gallon</option>
                            < <option id="Cm1" value="Cubic Foot" <?php if (isset($unit2)) {
                                                                        if ($unit2 == 'Cubic Foot') echo "selected";
                                                                    } ?>>Cubic Foot</option>
                                <option id="CC1" value="Cubic Inch" <?php if (isset($unit2)) {
                                                                        if ($unit2 == 'Cubic Inch') echo "selected";
                                                                    } ?>>Cubic Inch</option>
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

    </body>

    </html>
</body>

</html>