<!DOCTYPE html>
<html lang="en">
<?php
include("currency-array.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link rel="icon" href="favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'>
    <link rel="stylesheet" href="style.css">
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
                <li class="nav-item">
                    <a class="nav-link" href="vol.php"><i class="fa fa-prescription-bottle"></i>Volume and Capacity</a>
                </li>
                <li class="nav-item ">
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
    <hr>
    <div class="container">

        <div class="main">

            <div class="form-group">
                <label for="oamount">
                    Amount to Convert :
                </label>
                <input type="number" class="form-control searchBox" placeholder="0.00" id="oamount">
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">From</span>
                        </div>
                        <select class="form-control from" id="sel1">

                            <?php
                            foreach ($cur as $value) {
                                echo "<option value= '$value'>$value";
                            }

                            ?>

                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">To</span>
                        </div>
                        <select class="form-control to" id="sel2">
                            <?php

                            foreach ($cur as $value) {
                                echo "<option value= '$value'>$value";
                            }

                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-primary convert m-2" type="submit">
                    Convert
                </button>
                <button class="btn btn-primary m-2" onclick="clearVal()">
                    Reset
                </button>
            </div>

        </div>

        <div id="finalAmount" class="text-center">
            <h2>Converted Amount :
                <span class="finalValue" style="color:green;">
                </span>
            </h2>
        </div>
    </div>
    <div class="chat-me">
        <a aria-label="Chat on WhatsApp" href="https://wa.me/9879228567?text=Hello%20Prem%20Mehta%20here">
            <img alt="Chat on WhatsApp" src="wp.png" />
        </a>
    </div>
    <script src="script.js"></script>
    <script>
        const api = "https://api.exchangerate-api.com/v4/latest/USD";
        var search = document.querySelector(".searchBox");
        var convert = document.querySelector(".convert");
        var fromCurrecy = document.querySelector(".from");
        var toCurrecy = document.querySelector(".to");
        var finalValue = document.querySelector(".finalValue");
        var finalAmount = document.getElementById("finalAmount");
        var resultFrom;
        var resultTo;
        var searchValue;
        // Event listener to update "resultFrom" variable with selected currency from "fromCurrency" dropdown
        fromCurrecy.addEventListener('change', (event) => {
            resultFrom = `${event.target.value}`;
        });

        // Event listener to update "resultTo" variable with selected currency from "toCurrency" dropdown
        toCurrecy.addEventListener('change', (event) => {
            resultTo = `${event.target.value}`;
        });

        // Event listener to update "searchValue" variable with user input in "search" input field
        search.addEventListener('input', updateValue);

        // Function to update "searchValue" variable with user input        
        function updateValue(e) {
            searchValue = e.target.value;
        }

        // Event listener to trigger API call and display results when "Convert" button is clicked
        convert.addEventListener("click", getResults);

        // Function to fetch currency rates from API and pass them to "displayResults" function for processing

        function getResults() {
            fetch(`${api}`)
                .then(currency => {
                    return currency.json();
                }).then(displayResults);
        }

        // Function to calculate and display the converted currency value
        function displayResults(currency) {
            let fromRate = currency.rates[resultFrom];
            let toRate = currency.rates[resultTo];
            finalValue.innerHTML =
                ((toRate / fromRate) * searchValue).toFixed(2);
            finalAmount.style.display = "block";
        }

        // Function to clear all user inputs and reload the page
        function clearVal() {
            window.location.reload();
            document.getElementsByClassName("finalValue").innerHTML = "";
        };
    </script>
</body>

</html>