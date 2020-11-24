<?php
$tijd = date("G");
    if ($tijd >18 && $tijd < 6)$begroeting = "Goedenavond";
    if ($tijd >6 && $tijd < 12)$begroeting = "Goenenavond;";
    if ($tijd >12 && $tijd < 18)$begroeting= "Goedenmiddag";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Programmeren 2 - Week 1 - Opdracht 1.2</title>
</head>
<body>
<h1>Opdracht 1.2</h1>
<hr/>

<h2>
    <?= $begroeting ?>
</h2>
<p>

</p>
</body>
</html>
