<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CI Gallery</title>
</head>
<body>
    <div id="gallery">
        <?php if (isset($images) && count($images)) : ?>
            <?php foreach($images as $image) :?>
                <div class="thumb">
                    <a href="<?= $image['url'] ?>">
                        <img src="<?= $image['thumb_url'] ?>" alt="">
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div id="blank_gallery">Please Upload an Image</div>
        <?php endif; ?>

    </div>

    <div id="uplaod">
        <?= form_open_multipart('gallery') ?>
        <?= form_upload('userfile') ?>
        <?= form_submit('upload', 'Upload') ?>
        <?= form_close() ?>
    </div>
</body>
</html>