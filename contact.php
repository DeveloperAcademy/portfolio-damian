<?php
$form_data = isset($_POST) ? $_POST : array();
$errors = array();
$send = false;
if (!empty($form_data)) {
    foreach ($form_data as $data) {
        $data = clear_input($data);
    }
    if (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Address e-mail is incorrect";
    }
    if (empty($form_data['name'])) {
        $errors['name'] = "Name in required";
    }
    if (empty($form_data['subject'])) {
        $errors['subject'] = "Subject in required";
    }
    if (empty($form_data['message'])) {
        $errors['message'] = "Message in required";
    }
    if (empty($errors)) {
        $to = 'damian.terebun@gmail.com';
        $subject = $form_data['subject'];
        $message = $form_data['message'];

        $headers = 'X-Mailer: PHP/' . phpversion() . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: ' . $form_data['name'] . ' <' . $form_data['email'] . '>' . "\r\n";


        if (!mail($to, $subject, $message, $headers)) {
            $errors['send'] = "Sever error! Please try again later.";
        } else {
            $send = true;
            $errors = array();
            $form_data = array();
        }
    }

}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php
            if ($send):
                ?>
                <h1>E-mail send!</h1>
                <p>We will reply as fast as is possible.</p>
                <?php
            elseif (!$send): ?>
                <?php
                if (!empty($errors)):
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <h4><strong>Oh snap!</strong> In the form are errors:</h4>
                        <ul>
                            <?php
                            foreach ($errors as $error)
                                echo '<li>' . $error . '</li>'
                            ?>
                        </ul>
                    </div>
                    <?php
                endif;
                ?>
                <form action="index.php?p=contact" method="post">
                    <div class="form-group">
                        <label for="input-email">Email address:</label>
                        <input value="<?php echo $form_data['email'] ?>" type="email" class="form-control"
                               id="input-email"
                               placeholder="Yours email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="input-name">Name:</label>
                        <input value="<?php echo $form_data['name'] ?>" type="text" class="form-control" id="input-name"
                               placeholder="Your name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="input-subject">Subject:</label>
                        <input value="<?php echo $form_data['subject'] ?>" type="text" class="form-control"
                               id="input-subject"
                               placeholder="Subject" name="subject">
                    </div>
                    <div class="form-group">
                        <label for="input-message">Message:</label>
                    <textarea class="form-control" name="message" id="input-message"
                              rows="5"
                              placeholder="Type your message here"><?php echo $form_data['message'] ?></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary button-send">Send</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

