<?php include ( '../../config.php'); include ( '../components/cms_header.php'); ?>

<div id="main">

    <h1>Artist Genres</h1>

    <form action="index.php" method="post">

        <div id="rock">

            <h3>Rock</h3>
            <?php $genre="electro swing" ?>
            <?php echo ArtistDB::countAltFolk() ?>
        </div>

        <div id="electroSwing">
          
            <h3>Electro Swing</h3>
            <?php echo ArtistDB::countES() ?>
        </div>

        <div id="hardRockAcapella">
          <h3>Hard Rock Acapella</h3>
          <?php echo ArtistDB::countHardRockAcapella() ?>
        </div>

        <div id="countryGrunge">
          <h3>Country Grunge</h3>
          <?php echo ArtistDB::countCountryGrunge() ?>
        </div>

        <div id="democraticFolk">
          <h3>Democratic Folk</h3>
          <?php echo ArtistDB::countDemocraticFolk() ?>
        </div>

    </form>

</div>
<!-- end main -->

</body>

</html>

<?php include ( '../components/cms_footer.php'); ?>
