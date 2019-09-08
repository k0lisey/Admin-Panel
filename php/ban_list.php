<?php
    require("db.php");

    if (!isset($_SESSION['logged_admin']))
    {
        header('Location: ../index.php');
    }
    
    $users_not_banned = R::findAll('users', 'ban = ?', [0]);
    $users_not_banned_count = R::count('users', 'ban = ?', [0]);
    $users_active = R::findAll('users', 'sub > ?', [0]);
    $users_active_count = R::count('users', 'sub > ?', [0]);
    $users_non_active = R::findAll('users', 'sub = ?', [0]);
    $users_banned_count = R::count('users', 'ban > ?', [0]);
    $users_banned = R::findAll('users', 'ban > ?', [0]);

    $key_list = R::findAll('kluchi');
    $keys_sum = R::count('kluchi');
    $keys_active = R::count('kluchi', 'activated > ?', [0]);
    $keys_non_active = R::count('kluchi', 'activated = ?', [0]);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Ban List</title>
    <link rel="stylesheet" href="../css/add_user.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
</head>

<body>
<div id="alert" class="animated bounceInDown"></div>
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
    <div class="content_add">
        <div class="left_panel">
            <div class="persona">
                <?php echo '<h1 id="', $_SESSION['logged_admin']->rank, '">', $_SESSION['logged_admin']->username, '</h1>'; ?>
                <p><i class="fas fa-circle"></i><?php echo $_SESSION['logged_admin']->rank; ?></p>
            </div>
            <div class="info_db">
                <div class="title">
                    <h1>Информация</h1>
                </div>
                <p>Пользователей в базе: <?=$users_not_banned_count?></p>
                <p>Активированно подписок: <?=$keys_active?></p>
                <p>Ключей в базе: <?=$keys_sum?></b></p>
                <p>Неактивированно ключей: <?=$keys_non_active?></p>
                <p>Заблокированно пользователей: <?=$users_banned_count?></p>
            </div>
            <hr>
            <div class="action_key">
                <a href="key_list.php">
                    <i class="fal fa-treasure-chest"></i>
                    &nbsp;&nbsp;
                    База ключей
                </a>
                <a href="add_key.php">
                    <i class="fal fa-key"></i>
                    &nbsp;&nbsp;
                    Создать ключ
                </a>
            </div>
            <hr>
            <div class="action_user">
                <a href="user_list.php">
                    <i class="fal fa-users"></i>
                    &nbsp;&nbsp;
                    База пользователей
                </a>
                <a href="add_user.php" class="btn-add">
                    <i class="fal fa-user-plus"></i>
                    &nbsp;&nbsp;
                    Добавить пользователя
                </a>
                <a class="active" href="ban_list.php">
                    <i class="fal fa-users-class"></i>
                    &nbsp;&nbsp;
                    Список банов
                </a>
                <a href="logout.php">
                    <i class="fal fa-sign-out-alt"></i>
                    &nbsp;&nbsp;
                    Выйти
                </a>
            </div>
            <div id="bug">
                <a class="bug" href="https://vk.com/qn1s_it" target="_blank">
                    Нашли баг?
                </a>
            </div>
        </div>
        <div class="main_panel">
            <div class="header">
                <div class="ban-title">
                    <h1>Список забаненых пользователей</h1>
                </div>
                <div class="search">
                    <input type="text" id="fname" name="firstname" placeholder="Поиск">
                </div>
            </div>
            <div class="user-list">
                <table class="custom">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Логин</th>
                            <th scope="col">HWID</th>
                            <th scope="col">Подписка до</th>
                            <th scope="col">Привилегия</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody class="add">
                        <?php
                            foreach ($users_banned as $user):
                        ?>
                        <tr id="<?=$user['id']?>">
                            <td scope="row"><?=$user['id']?></td>
                            <td scope="row"><?=$user['username']?></td>
                            <td scope="row"><?=$user['hwid']?></td>
                            <td scope="row"><?=$user['date_end_sub']?></td>
                            <td scope="row" id="rank">
                            <?php echo '<p class="rank" id="'.$user['rank'].'">'.$user['rank'].'</p>'; ?>
                            </td>
                            <td scope="row">
                                <?php echo '<button type="button" class="btn btn-copy" id="un_ban" data-id="'.$user['id'].'">Разблокировать</button>'; ?>
                                <?php echo '<button type="button" class="btn btn-delete" id="suda" data-id="'.$user['id'].'">Удалить</button>'; ?>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class='credits'>
        <span>CMD: </span><span class="typing"></span>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/clipboard.min.js"></script>
    <script>
        function show_alert(alert) {

            $('#alert').css({
                'display': 'none',
                'background': '#dc3545'
            });

            $('#alert').css({
                'display': 'flex'
            });

            $('#alert').html(alert);

            $('#alert').removeClass('animated bounceOutUp');
            $('#alert').addClass('animated bounceInDown');

            setTimeout(function() {

                $('#alert').removeClass('animated bounceInDown');
                $('#alert').addClass('animated bounceOutUp');

            }, 2000);
        }

        function show_alert_suc(alert) {

            $('#alert').css({
                'display': 'none',
                'background': '#28a745'
            });

            $('#alert').css({
                'display': 'flex'
            });

            $('#alert').html(alert);

            $('#alert').removeClass('animated bounceOutUp');
            $('#alert').addClass('animated bounceInDown');

            setTimeout(function() {

                $('#alert').removeClass('animated bounceInDown');
                $('#alert').addClass('animated bounceOutUp');

            }, 2000);

        }

        $('#un_ban').click(function(){
            var id = $(this).data("id");

            $.ajax({
                    url: 'un_ban.php',
                    method: 'POST',
                    data: {
                        id: id
                    }
                })
                .done(function(msg) 
                {
                    if (msg == true) 
                    {
                        show_alert_suc('<div><i class="far fa-check-circle"></i></div><div><p>Пользователь успешно разбанен</p></div>');

                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    } 
                    else 
                    {
                        show_alert('<div><i class="far fa-times-circle"></i></div><div><p>Не, нихуя</p></div>');
                    }
                })
        });

        $('.btn-delete').click(function() {

            var id = $(this).data("id");

            $.ajax({
                    url: 'delete.php',
                    method: 'POST',
                    data: {
                        id: id
                    }
                })
                .done(function(msg) 
                {
                    if (msg == true) 
                    {
                        show_alert_suc('<div><i class="far fa-check-circle"></i></div><div><p>Пользователь успешно удален</p></div>');

                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    } 
                    else 
                    {
                        show_alert('<div><i class="far fa-times-circle"></i></div><div><p>Не, нихуя</p></div>');
                    }
                })
        });
    </script>
</body>

</html>
