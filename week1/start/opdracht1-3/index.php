<?php
//Multi dimensional array with the music collection data
// fill the collection with albums (also arrays)
$musicAlbums =
    [
        [
            'artist' => 'Marco Borsato',
            'album' => 'Thuis',
            'year' => '2017',
            'tracks' => '10',
            'genre' => 'pop'
        ],
        [
            'artist' => 'Nick en Simon',
            'album' => 'Aangenaam',
            'year' => '2017',
            'tracks' => '15',
            'genre' => 'pop'
        ],
        [
            'artist' => 'Andre Hazes',
            'album' => 'Meer Hazes',
            'year' => '2016',
            'tracks' => '20',
            'genre' => 'Levenslied'
        ],
        [
            'artist' => 'Micheal Jackson',
            'album' => 'XSCAPE',
            'year' => '2014',
            'tracks' => '17',
            'genre' => 'pop'
        ],
        [
            'artist' => 'Joost',
            'album' => '1983',
            'year' => '2019',
            'tracks' => '13',
            'genre' => 'dance'
        ],
        [
            'artist' => 'bbno$',
            'album' => 'Recess',
            'year' => '2019',
            'tracks' => '11',
            'genre' => 'hiphop'

        ],
        [
            'artist' => 'josbros',
            'album' => 'Niet meer de same',
            'year' => '2018',
            'tracks' => '9',
            'genre' => 'hiphop'
        ],
        [
            'artist' => 'Russian Village Boys',
            'album' => 'Russian Dutch',
            'year' => '2019',
            'tracks' => '8',
            'genre' => 'dance'
        ],
       [
           'artist' => 'Joyner Lucas',
           'album' => '508-507-2209',
           'year' => '2017',
           'tracks' => '16',
           'genre' => 'hiphop'
        ],
        [
            'artist' => 'quadeca',
            'album' => 'Voice Memos',
            'year' => '2019',
            'tracks' => '13',
            'genre' => 'hiphop'
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
                <td><?=$album['artist']?></td>
                <td><?=$album['album']?></td>
                <td><?=$album['genre']?></td>
                <td><?=$album['year']?></td>
                <td><?=$album['tracks']?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>
