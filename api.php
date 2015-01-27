<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require('class/Transform.php');
require('class/Curl.php');
$client_id = 'd8354916c91f43e2badf7b318b115085';
$client_secret = '50896f9726f9431293f3fc83d079890d';
$website = 'http://10.1.1.95/';
$redirect_url = 'http://10.1.1.95/Zheyu/Instafeed/api.php';

if ($_GET['username']) {

    //search user id api url
    $url = "https://api.instagram.com/v1/users/search?q={$_GET['username']}&client_id=d8354916c91f43e2badf7b318b115085";

    $output = Curl::Request($url);

    $user = json_decode($output, true);

    if (200 != $user['meta']['code']) {
        die('user not exist');
    }

    $userid = $user['data'][0]['id'];
    $userinfo = $user['data'][0];
    //get all user data, comment, photos..
    $url = "https://api.instagram.com/v1/users/{$userid}/media/recent?client_id=d8354916c91f43e2badf7b318b115085";

    $output = Curl::Request($url);

    $transform = new Transform($output);

    $photos = $transform->getPhoto();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>github g9007676/Instagram API</title>
    <meta charset="utf-8">
    <link href="assets/css/bootstrap.css" rel=stylesheet type="text/css">
    <link href="assets/css/bootstrap-theme.min.css" rel=stylesheet type="text/css">
    <style>
#bk_img{
     background-image:url('http://subtlepatterns.com/patterns/skulls.png'); 
     background-repeat: repeat; 
}
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <p class="navbar-brand" href="#">Github g9007676/Instagram API</p>
        </div>
    </div>
</nav>
<div style='color: inherit;background-color: #eee;'>
    <div class="container">
        <div class="row">
            <div class="col-xs-6" style='margin-top: 100px'>
                <h1 style='height:50px'>Use Instagram API</h1>
                <p><a class="btn btn-primary btn-lg" href="https://github.com/g9007676/Instafeed" role="button">My GitHub »</a></p>

            </div>
            <div class="col-xs-6">
                <h1>Search User ID!</h1>
                <form class="form-inline" action='api.php'>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">#</div>
                            <input type="text" name='username' class="form-control" id="exampleInputAmount" placeholder="Account">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Transfer</button>
                </form>

                <?php if(! empty($userinfo)) { ?>
                <div class="media" style='background:url(http://subtlepatterns.com/patterns/swirl_pattern.png)'>
                    <div class="media-left">
                        <a class='thumbnail'href="http://instagram.com/<?= $userinfo['username']?>">
                            <img class="media-object" src="<?= $userinfo['profile_picture'] ?>" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $userinfo['full_name'] ?></h4>
                        <h6 style='line-height: 2;'><?= nl2br($userinfo['bio'])?></h6>
                    </div>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
</div>
<div id='bk_img'>
    <div class="container">
        <div class="row">
<?php if(! empty($photos)) {
    foreach ($photos as $photo) { ?>
            <div class="col-xs-4">
                <a href='<?= $photo['link'] ?>'class="thumbnail">
                    <img src="<?= $photo['img']['url']?>">
                    <div class="caption">
                        <? if (! empty($photo['local'])) { ?>
                        <h3><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <?= $photo['local']?></h3>
                        <? } ?>
                        <h3><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
                            <?= $photo['like']?></h3>

                        <?php if (!empty($photo['text'])) { ?>
                        <span><?= nl2br($photo['text'])?> </span>
                        <? }?>
                    </div>
                </a>
            </div>
            <? } ?>
            <? } ?>
        </div>
    </div>
</div>
</body>
<html>
