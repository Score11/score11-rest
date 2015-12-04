<?php
//use DebugBar\StandardDebugBar;

//$debugbar = new StandardDebugBar();
//$debugbarRenderer = $debugbar->getJavascriptRenderer();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/app.css">

        <style type="text/css">
            body {
                margin-top: 60px;
            }
        </style>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="../bower_components/angular/angular.min.js"></script>

        <script src="js/controllers/mainCtrl.js"></script>
        <script src="js/services/movieStartService.js"></script>
        <script src="js/services/dvdStartService.js"></script>
        <script src="js/app.js"></script>
        
        <?php //echo $debugbarRenderer->renderHead() ?>
    </head>
    <body ng-app="score11App" ng-controller="mainController">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Score11</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

            <div class="row">
                <div class="col-xs-6">

                    <div class="score11-movie-imagelist score11-listbox">
                        <h3 class="title">MovieStarts</h3>
                        <div>
                            <div class="mini-preview" ng-hide="loading" ng-repeat="movie in moviestarts.data|limitTo:8">
                                <a href="#{{ movie.id }}" style="background: url({{ movie.image }}) no-repeat 50%;">
                                    <span class="movie-logo-overlay">{{ movie.startdate | dateToISO | date:'dd.MM.yyyy' }}</span>
                                </a>
                                <a href="#{{ movie.id }}" class="movie-link">
                                    <span ng-repeat="title in movie.titles.data">
                                        <!--{{ title.version }} - -->{{ title.title }}<!-- - {{ title.year }}-->
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xs-6">
                    <div class="score11-movie-imagelist score11-listbox">
                        <h3 class="title">DVDStarts</h3>
                        <div>
                            <div class="mini-preview" ng-hide="loading" ng-repeat="movie in dvdstarts.data|limitTo:8">
                                <a href="#{{ movie.id }}" style="background: url({{ movie.image }}) no-repeat 50%;">
                                    <span class="movie-logo-overlay">{{ movie.releaseDate | dateToISO | date:'dd.MM.yyyy' }}</span>
                                </a>
                                <a href="#{{ movie.id }}" class="movie-link">
                                    <span ng-repeat="title in movie.titles.data">
                                        <!--{{ title.version }} - -->{{ title.title }}<!-- - {{ title.year }}-->
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php //echo $debugbarRenderer->render() ?>
    </body>
</html>
