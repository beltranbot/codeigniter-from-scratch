<div id="contact_form">
    <h1>Contact Us!</h1>
    <?php
        echo form_open('contact/submit');
        echo form_input('name', 'Name', 'id="name"');
        echo form_input('email_address', 'Email Address', 'id="email"');
        $data = [
            'name' => 'message',
            'cols' => 30,
            'rows' => 15
        ];
        echo form_textarea($data, 'Message', 'id="message"');
        echo form_submit('submit', 'Submit', 'id="submit"');
        echo form_close();
    ?>
</div>

<script>
    $('#submit').click(function() {

        let name = $('#name').val()

        if (!name || name == 'Name') {
            alert('please enter your name')
            return false
        }

        let form_data = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val()
        }
        $.ajax({
            url: "<?= site_url('contact/submit')?>",
            type: 'POST',
            data: form_data,
            success: function(msg) {
                $('#main_content').html(msg)
            }
        })
        return false
    })
</script>