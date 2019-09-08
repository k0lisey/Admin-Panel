<?php
    require("db.php");

    if (isset($_SESSION['logged_admin']))
    {
        header('Location: user_list.php');
    }

    
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>!BAN!</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
</head>

<body>
    <div id="alert"></div>
    <div class="backwrap gradient">
        <div class="back-shapes">
            <img src="../icons/crosshairs.png" class="floating" style="top:66.59856996935649%;left:13.020833333333334%;animation-delay:-0.9s;" />
            <img src="../icons/laugh-beam.png" class="floating" style="top:31.46067415730337%;left:33.59375%;animation-delay:-4.8s;" />
            <img src="../icons/code.png" class="floating" style="top:76.50663942798774%;left:38.020833333333336%;animation-delay:-4s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:21.450459652706844%;left:14.0625%;animation-delay:-2.8s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:58.12053115423902%;left:56.770833333333336%;animation-delay:-2.15s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:8.682328907048008%;left:72.70833333333333%;animation-delay:-1.9s;" />
            <img src="../icons/code.png" class="floating" style="top:31.3585291113381%;left:58.541666666666664%;animation-delay:-0.65s;" />
            <img src="../icons/code.png" class="floating" style="top:69.96935648621042%;left:81.45833333333333%;animation-delay:-0.4s;" />
            <img src="../icons/crosshairs.png" class="floating" style="top:15.117466802860061%;left:32.34375%;animation-delay:-4.1s;" />
            <img src="../icons/crosshairs.png" class="floating" style="top:13.074565883554648%;left:45.989583333333336%;animation-delay:-3.65s;" />
            <img src="../icons/code.png" class="floating" style="top:55.87334014300306%;left:27.135416666666668%;animation-delay:-2.25s;" />
            <img src="../icons/code.png" class="floating" style="top:49.54034729315628%;left:53.75%;animation-delay:-2s;" />
            <img src="../icons/code.png" class="floating" style="top:34.62717058222676%;left:49.635416666666664%;animation-delay:-1.55s;" />
            <img src="../icons/code.png" class="floating" style="top:33.19713993871297%;left:86.14583333333333%;animation-delay:-0.95s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:28.19203268641471%;left:25.208333333333332%;animation-delay:-4.45s;" />
            <img src="../icons/crosshairs.png" class="floating" style="top:39.7344228804903%;left:10.833333333333334%;animation-delay:-3.35s;" />
            <img src="../icons/laugh-beam.png" class="floating" style="top:77.83452502553627%;left:24.427083333333332%;animation-delay:-2.3s;" />
            <img src="../icons/laugh-beam.png" class="floating" style="top:2.860061287027579%;left:47.864583333333336%;animation-delay:-1.75s;" />
            <img src="../icons/laugh-beam.png" class="floating" style="top:71.3993871297242%;left:66.45833333333333%;animation-delay:-1.25s;" />
            <img src="../icons/laugh-beam.png" class="floating" style="top:31.256384065372828%;left:76.92708333333333%;animation-delay:-0.65s;" />
            <img src="../icons/laugh-beam.png" class="floating" style="top:46.47599591419816%;left:38.90625%;animation-delay:-0.35s;" />
            <img src="../icons/code.png" class="floating" style="top:3.4729315628192032%;left:19.635416666666668%;animation-delay:-4.3s;" />
            <img src="../icons/code.png" class="floating" style="top:3.575076608784474%;left:6.25%;animation-delay:-4.05s;" />
            <img src="../icons/code.png" class="floating" style="top:77.3237997957099%;left:4.583333333333333%;animation-delay:-3.75s;" />
            <img src="../icons/code.png" class="floating" style="top:0.9193054136874361%;left:71.14583333333333%;animation-delay:-3.3s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:23.6976506639428%;left:63.28125%;animation-delay:-2.1s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:81.30745658835546%;left:45.15625%;animation-delay:-1.75s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:60.9805924412666%;left:42.239583333333336%;animation-delay:-1.45s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:29.009193054136876%;left:93.90625%;animation-delay:-1.05s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:52.093973442288046%;left:68.90625%;animation-delay:-0.7s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:81.51174668028601%;left:83.59375%;animation-delay:-0.35s;" />
            <img src="../icons/wheelchair.png" class="floating" style="top:11.542390194075587%;left:91.51041666666667%;animation-delay:-0.1s;" />
        </div>
    </div>
    <div class="center">
        <form class='form'>
            <div class='control'>
                <h1 class="glitch" data-text="/banned">
                    &lt;/banned&gt;
                </h1>
            </div>
            <div class='control block-cube block-input'>
                <input name='username' placeholder='Username' type='text' id="username">
                <div class='bg-top'>
                    <div class='bg-inner'></div>
                </div>
                <div class='bg-right'>
                    <div class='bg-inner'></div>
                </div>
                <div class='bg'>
                    <div class='bg-inner'></div>
                </div>
            </div>
            <div class='control block-cube block-input'>
                <input name='password' placeholder='Password' type='password' id="password">
                <div class='bg-top'>
                    <div class='bg-inner'></div>
                </div>
                <div class='bg-right'>
                    <div class='bg-inner'></div>
                </div>
                <div class='bg'>
                    <div class='bg-inner'></div>
                </div>
            </div>
            <div class='control block-cube block-input'>
                <select name="rank" id="rank">
                    <option value="" hidden disabled selected></option>
                    <option value="Admin">Admin</option>
                    <option value="Coder">Coder</option>
                    <option value="Moder">Moder</option>
                </select>
                <div class='bg-top'>
                    <div class='bg-inner'></div>
                </div>
                <div class='bg-right'>
                    <div class='bg-inner'></div>
                </div>
                <div class='bg'>
                    <div class='bg-inner'></div>
                </div>
            </div>
            <button class='btn block-cube block-cube-hover' id="btn_login" type='button' name="do_login">
                <div class='bg-top'>
                    <div class='bg-inner'></div>
                </div>
                <div class='bg-right'>
                    <div class='bg-inner'></div>
                </div>
                <div class='bg'>
                    <div class='bg-inner'></div>
                </div>
                <div class='text'>
                    banned
                </div>
            </button>
        </form>
    </div>
    <div class='credits'>
        <span>CMD: </span><span class="typing"></span>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        function show_alert(alert) {
            // document.getElementById('alert').style.display = 'flex';
            $('#alert').css({
                'display': 'flex'
            });
            $('#alert').html(alert)

            setTimeout(function() {
                // document.getElementById('alert').style.display = 'none';
                $('#alert').css({
                    'display': 'none'
                });
            }, 2000);
        }

        $('#btn_login').click(function() {

            var username = $('#username').val();
            var password = $('#password').val();
            var rank     = $('#rank').val();

            $.ajax({
                    url: 'reg.php',
                    method: 'POST',
                    data: {
                        username: username,
                        password: password,
                        rank: rank
                    }
                })
                .done(function(msg) {
                    if (msg == true) {
                        document.location.href = "../index.php";
                    } else {
                        show_alert(msg);
                    }
                })
        });

    </script>
</body>
</html>
