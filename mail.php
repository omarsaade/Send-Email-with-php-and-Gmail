<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Send Mail From Localhost | CodingNepal</title>
    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Send message</h2>
                <p class="text-center">Send mail to anyone from localhost.</p>
                <!-- starting PHP codes -->
                <?php
                // if user click on the send button
                if (isset($_POST['send'])) {
                    //getting all entered user data
                    $recipient = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $sender = "From: mega.mobile2267@gmail.com";
                    //if use leave empty filed among one of them
                    if (empty($recipient) || empty($subject) || empty($message)) {
                ?>
                        <!-- display an alert message if one of them filed is empty -->
                        <div class="alert alert-danger text-center">
                            <?php echo "ALL input fields are required" ?>
                        </div>
                        <?php
                    } else {
                        //php function to send email
                        //so hye el ossa kella ma3 el ta3dilet bel php ini w mail file bel xampp
                        // https://www.codingnepalweb.com/send-mail-using-xampp-server-with-php/
                        if (mail($recipient, $subject, $message, $sender)) {
                        ?>
                            <!-- display a success message if once mail sent successfully  -->
                            <div class="alert alert-success text-center">
                                <?php echo "Your mail sent succesfully to $recipient" ?>
                            </div>
                        <?php
                        } else {
                        ?>
                            <!-- display an alert message if somehow mail cant be sent -->
                            <div class="alert alert-danger text-center">
                                <?php echo "Failed while sending Your mail!" ?>
                            </div>
                <?php
                        }
                    }
                }
                ?>
                <!-- end of php codes -->
                <form action="mail.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Recipients">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="10" class="form-control textarea" placeholder="Compose message..."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="form-control button btn-primary" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>