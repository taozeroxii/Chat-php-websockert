<!DOCTYPE html>
<html>

<head>
    <title>PHP Real Time</title>
    <script src="jquery-1.7.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style type="text/css">
    body {
        font: 12px arial;
        color: #222;
        text-align: center;
        padding: 35px;
    }
</style>

<body>
    <div class="container">

        <?php
        echo "ชื่อผู้ใช้งาน : ";
        echo  !isset($_POST['name']) != '' ? 'GUEST' : $_POST['name'];
        ?>

        <a class="mb-5" href="./index.php">หากไม่กรอกชื่อจะเป็น guest คลิกเพื่อใส่ชื่อใช้งาน !!! </a>
        <div class="input-group mb-3">
            <input name="txtName" type="hidden" value="<?php echo !isset($_POST['name']) != '' ? 'GUEST' : $_POST['name']; ?>" id="txtName" size="20" />
            <span class="input-group-text" id="inputGroup-sizing-default">Message </span>
            <input name="txtEmail" type="text" id="txtEmail" size="20" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
            <input name="btnSend" type="button" class="btn btn-success" id="btnSend" value="Send" />
        </div>
    </div>


    <iframe src="http://172.16.28.45/Chat-php-websockert/board.php" width="100%" height="650" frameborder="0"></iframe>

</body>

</html>

<script language="javascript">
    var socket;

    function webSocketSupport() {
        if (browserSupportsWebSockets() === false) {
            $('#ws_support').html('<h2>Sorry! Your web browser does not supports web sockets</h2>');
            $('#wrapper').hide();
            return;
        }

        // Open Connection
        socket = new WebSocket('ws://172.16.28.45:8080');

        socket.onopen = function(e) {
            $('#connect').html("<p style = 'color:green;'>You have have successfully connected to the server</p><br><br>");
        };

        socket.onmessage = function(e) {
            //
        };

        socket.onerror = function(e) {
            onError(e)
        };

    }

    function onError(e) {
        alert('Error!!');
    }

    function doSend() {
        var jsonSend = JSON.stringify({
            "name": $('#txtName').val(),
            "message": $('#txtEmail').val()
        });


        if ($('#txtName').val() == '') {
            alert('Enter your [Name]');
            $('#txtName').focus();
            return '';
        } else if ($('#txtEmail').val() == '') {
            alert('Enter your [message]');
            $('#txtEmail').focus();
            return '';
        }

        socket.send(jsonSend);

        // $('#txtName').val('');
        $('#txtEmail').val('');

        // alert('Done!!');
    }

    function browserSupportsWebSockets() {
        if ("WebSocket" in window) {
            return true;
        } else {
            return false;
        }
    }

    $(document).ready(function() {
        webSocketSupport();
    });

    $('#btnSend').click(function() {
        doSend();
    });

    // Get the input field
    var input = document.getElementById("txtEmail");

    // Execute a function when the user presses a key on the keyboard
    input.addEventListener("keypress", function(event) {

        // If the user presses the "Enter" key on the keyboard
        if (event.key === "Enter") {
            if (input) {
                doSend();
            }

        }
    });
</script>