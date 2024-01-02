<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Upload Table</title>
</head>
<body>
    <?php
    require_once('../../sjdbconnection.php');
 
    $dbc = @mysqli_connect($localhost, $username, $password, $database);
    mysqli_set_charset($dbc, "utf8");
 
    $query = "
    
    DROP TABLE IF EXISTS `php2022sampo_highscores`;
    CREATE TABLE `php2022sampo_highscores` (
    `playerID` int(5) NOT NULL,
    `playerName` varchar(20) NOT NULL,
    `score` int(7) NOT NULL,
    `date` date NOT NULL,
    `rank` int(5) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    INSERT INTO `php2022sampo_highscores` (`playerID`, `playerName`, `score`, `date`, `rank`) VALUES
    (1, 'IHaveADream', 937432, '2019-06-06', 4),
    (2, 'one1two2three3', 34981, '2021-10-16', 25),
    (3, 'WhadupHolmes?', 124234, '2020-10-07', 18),
    (4, 'sherLock', 456089, '2020-12-19', 13),
    (5, 'KEYBOARDSMASHER', 98712, '2022-01-01', 20),
    (6, 'player1', 765678, '2018-08-09', 7),
    (7, 'player2', 523489, '2022-09-12', 11),
    (8, 'ArtiFist', 654236, '2022-12-07', 8),
    (9, 'SuperSam', 134827, '2022-11-24', 17),
    (10, 'deliberate_bantha', 234668, '2022-11-16', 16),
    (11, 'ICANFLY', 46887, '2021-09-16', 24),
    (12, 'wheresmyparrot?', 798746, '2020-11-10', 6),
    (13, 'assaiyan', 31346, '2019-05-01', 27),
    (14, 'SONICotine', 99948, '2018-09-12', 19),
    (15, 'Texas_Ranger', 556647, '2019-02-03', 10),
    (16, 'Ytomic', 434698, '2021-01-28', 14),
    (17, 'heybabewhereyoushake', 77975, '2022-06-02', 21),
    (18, 'loony_TUNE', 468795, '2021-12-24', 12),
    (19, 'sum_erian', 59642, '2022-10-26', 23),
    (20, 'IOWNTHISGAME', 1000000, '2022-08-07', 1),
    (21, 'AdorableNose', 889443, '2022-03-03', 5),
    (22, 'Bummer-chant', 314695, '2020-07-18', 15),
    (23, 'hahahahahahahahahaha', 13246, '2022-11-23', 30),
    (24, 'IdiOTGaME', 1, '2022-10-05', 32),
    (25, 'OADJAOdjf', 4679, '2022-07-31', 31),
    (26, 'alwaysusesunscreen', 16887, '2022-09-29', 28),
    (27, 'clo-sure', 975513, '2021-11-06', 3),
    (28, 'Cannon_Fodder', 647359, '2021-10-12', 9),
    (29, 'HoppyDuck', 32116, '2021-03-27', 26),
    (30, 'upthrower', 76841, '2020-12-01', 22),
    (31, 'Åreyouready?!', 989455, '2022-11-28', 2),
    (32, 'dfspogjdpgh', 13451, '2022-11-10', 29);


    ALTER TABLE `php2022sampo_highscores`
    ADD PRIMARY KEY (`playerID`);


    ALTER TABLE `php2022sampo_highscores`
    MODIFY `playerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

    ";
 
    if (mysqli_multi_query($dbc, $query)) {
        echo '<h1>Table has been created!</h1>';
    } else {
        echo '<p style="color: red;">Something went wrong: ' . mysqli_error($dbc) . '</p>';
        echo '<p> The query was ' . $query . '.';
    }
 
    mysqli_close($dbc);
    ?>
</body>
</html>