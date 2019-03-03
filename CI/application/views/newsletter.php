<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
</head>
<body>
    <div class="newsletter_form">
        <?php echo form_open('/email/send'); ?>

        <?php
            $name_data = [
                'name' => 'name',
                'id' => 'name',
                'value' => set_value('name'),
            ];
        ?>

        <p><label for="name">Name: </label><?= form_input($name_data) ?></p>
        <p>
            <label for="name">Email Address: </label>
            <input type="text" name="email" id="email" value="<?= set_value('email') ?>">
        </p>

        <p>
            <?= form_submit('submit', 'submit') ?>
        </p>
        <?php echo form_close(); ?>

        <?php echo validation_errors('<p class="error">') ?>

    </div> <!-- end newsletter-->
</body>
</html>