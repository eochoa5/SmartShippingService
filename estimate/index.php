<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
    <link href="../stylesheets/ddmenu.css" rel="stylesheet" type="text/css"/>
    <script src="../js/ddmenu.js" type="text/javascript"></script>
    <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
</head>
<body>

<?php include_once("../page_top.php"); ?>
<div id="formDiv">
    <form id="signupForm" name="signupform" onsubmit="index.php">
        <div id="signupFormDiv">
            <div class="abc" style="margin-top:10px">Please fill out the information below to get an estimate.</div>
            <label><b>Origin Zip Code:</b></label><br>
            <input id="org" type="text" placeholder="Zip Code" name="origin" required maxlength="30"><br>

            <label><b>Destination Zip Code:</b></label><br>
            <input id="dest" type="text" placeholder="Zip Code" name="destination" required maxlength="30"><br>

            <label><b>Shape:</b></label><br>
            <input id='boxShape' type="radio" name="shape" value="box" checked>Box<br>
            <input id='envShape' type="radio" name="shape" value="envelope">Envelope<br>

            <label><b>Box Length:(inches)</b></label><br>
            <input cusAtt="boxSpecific" type="text" placeholder="Length" id="x" maxlength="30"><br>

            <label><b>Box Width:(inches)</b></label><br>
            <input cusAtt="boxSpecific" type="text" placeholder="Width" id="y" maxlength="30"><br>

            <label><b>Box Height:(inches)</b></label><br>
            <input cusAtt="boxSpecific" type="text" placeholder="Height" id="z" maxlength="30"><br>

            <label><b>Box Weight:(pounds)</b></label><br>
            <input cusAtt="boxSpecific" type="text" placeholder="Weight" id="w" maxlength="30"><br>

            <button id='submit' type="button" style="margin-top: 13px">Submit</button>
            <div id="results" class="abc" style="margin-top:10px"></div>
        </div>

    </form>
</div>


<script>
    $(document).ready(function () {
        //$('[cusAtt]').attr("disabled", "disabled");
    });

    $('input:radio[name="shape"]').change(
        function () {
            if ($(this).is(':checked') && $(this).val() == 'box') {
                $('[cusAtt]').removeAttr("disabled");
            }

            if ($(this).is(':checked') && $(this).val() == 'envelope') {
                $('[cusAtt]').attr("disabled", "disabled");
            }
        });

    $("#submit").click(function () {

        var debug = false;

        var origin = $('#org').val();
        var destination = $('#dest').val();
        var volume = 1;
        var distance = 0;
        var weight = 0;

        if (debug) {
            origin = 90032;
            destination = 10118;
        }

        distance = origin - destination;

        if (distance < 0) {
            distance = distance * -1;
        }

        distance = distance / 100;

        if ($('#boxShape').is(':checked')) {
            var x = $('#x').val();
            var y = $('#y').val();
            var z = $('#z').val();
            var w = $('#w').val();

            if (debug) {
                x = 12;
                y = 12;
                z = 12;
                w = 20;
            }
            volume = x * y * z;
            volume = volume / 10;
        }

        var price = (distance * .13) + (volume * .05) + (weight * 0.6);
        //price = parseFloat(Math.round(price * 100) / 100).toFixed(2);
        var prettyPrice = parseFloat(Math.round(price * 100) / 100).toFixed(2);
        console.log(prettyPrice);
        $("#results").html("The total will be: $" + prettyPrice);
        //https://www.zipcodeapi.com/rest/HIfVLZvjJzdjtoBNiOajHttxPsLsSqsA8HwTG1cqBqK5OmS7a3qSwUpmmaOeBgPJ/distance.json/90032/91030/mile
    });

    //not ready
    function getBbyJson(queryURL) {
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: queryURL,
                crossDomain: true,
                contentType: "application/json; charset=utf-8",

                dataType: "jsonp",
                success: function (data) {
                    console.log(data);
                }
            });
        });
    }
    //not ready
    function getDistance(start, end) {
        queryURL = "https://www.zipcodeapi.com/rest/HIfVLZvjJzdjtoBNiOajHttxPsLsSqsA8HwTG1cqBqK5OmS7a3qSwUpmmaOeBgPJ/distance.json/" + start + "/" + end + "/mile";


        $.getJSONP(queryURL, function (data) {
            console.log(data);
        });
    }
</script>

<?php include_once("../page_bottom.php"); ?>
</body>

</html>