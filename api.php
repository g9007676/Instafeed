<?php
$client_id = 'd8354916c91f43e2badf7b318b115085';
$client_secret = '50896f9726f9431293f3fc83d079890d';
$website = 'http://10.1.1.95/';
$redirect_url = 'http://10.1.1.95/Zheyu/Instafeed/api.php';

// user id
//
//https://api.instagram.com/v1/users/search?q=g9007676&client_id=d8354916c91f43e2badf7b318b115085

//https://api.instagram.com/v1/users//media/recent/?q=g9007676&client_id=d8354916c91f43e2badf7b318b115085
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>github g9007676/Instagram API</title>
    <meta charset="utf-8">
    <link href="assets/css/bootstrap.css" rel=stylesheet type="text/css">
    <link href="assets/css/bootstrap-theme.min.css" rel=stylesheet type="text/css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <p class="navbar-brand" href="#">Github g9007676/Instagram API</p>
        </div>
    </div>
</nav>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <h1>Use Instagram API</h1>
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
            </div>
        </div>
    </div>
<div class="container">
<div id="instafeed"></div>
</div>
</body>
<html>
