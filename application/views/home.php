<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <p>My view has been loaded</p>

        <pre>
            <?php print_r($records) ?>
        </pre>

        <?php foreach($records as $row) : ?>
            <h1>
                <?php echo $row->title ?>
            </h1>
        <?php endforeach; ?>
    </div>
</body>
</html>