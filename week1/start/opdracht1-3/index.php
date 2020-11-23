<?php
//Multi dimensional array with the music collection data
// fill the collection with albums (also arrays)
$musicAlbums =
    [
        [
            'Marco Borsato',
            'Thuis',
            '2017',
            '10',
            'pop'
        ],
        [
            'Nick en Simon',
            'Aangenaam',
            '2017',
            '15',
            'pop'
        ],
        [
            'Andre Hazes',
            'Meer Hazes',
            '2016',
            '20',
            'Levenslied'
        ],
        [
            'Micheal Jackson',
            'XSCAPE',
            '2014',
            '17',
            'pop'
        ],
        [
            'Joost',
            '1983',
            '2019',
            '13',
            'dance'
        ],
        [
            'bbno$',
            'Recess',
            '2019',
            '11',
            'hiphop'

        ],
        [
            'josbros',
            'Niet meer de same',
            '2018',
            '9',
            'hiphop'
        ],
        [
            'Russian Village Boys',
            'Russian Dutch',
            '2019',
            '8',
            'dance'
        ],
       [
            'Joyner Lucas',
            '508-507-2209',
            '2017',
            '16',
            'hiphop'
        ],
        [
            'quadeca',
            'Voice Memos',
            '2019',
            '13',
            'hiphop'
        ]

    ];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Collection</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Music Collection</h1>
<hr/>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Artist</th>
        <th>Album</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Tracks</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="6">&copy; My Collection</td>
    </tr>
    </tfoot>
    <tbody>
        <?php foreach ($musicAlbums as $key => $album){?>
            <tr>
                <td><?=$key+1?></td>
                <td><?=$album[0]?></td>
                <td><?=$album[1]?></td>
                <td><?=$album[2]?></td>
                <td><?=$album[3]?></td>
                <td><?=$album[4]?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>
