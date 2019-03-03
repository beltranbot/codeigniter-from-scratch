<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        label {
            display:block;
        }
    </style>
</head>
<body>
    <h2>Create</h2>
    <?= form_open('site/create') ?>
        <p>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title">
        </p>
        <p>
            <label for="content">Content:</label>
            <input type="text" name="content" id="content">
        </p>
        <p>
            <input type="submit" value="submit">
        </p>
    <?= form_close() ?>

    <hr>

    <h2>Read</h2>
    <?php if(isset($records)) : ?>
        <?php foreach($records as $row) : ?>
            <h2><?= anchor("site/delete/$row->id", $row->title) ?></h2>
            <div><?= $row->contents ?></div>
        <?php endforeach; ?>
    <?php else : ?>
        <h2>No records have returned</h2>
    <?php endif; ?>

    <hr>

    <h2>Delete</h2>
    <p>To sample the delete method, simly click on one of the headings listed above. A delete query will automatically run</p>
</body>
</html>