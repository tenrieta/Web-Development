<!DOCTYPE html>
<html>
    <head>
        <meta charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css?version=51" />
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">             
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="index.php">Начало</a></li>
                    <li><a href="history.php">История</a></li>
                    <li><a href="regions.php">Региони</a></li>
                    <li><a href="about.php">За нас</a></li>
                </ul>
            </nav>
  
            <div id="content_area">
                <?php echo $content; ?>
            </div>
            
            <div id="sidebar">
                
            </div>
            
            <footer>
            Български фолклор - история, традиции и занаяти
            </footer>
        </div>
    </body>
</html>
