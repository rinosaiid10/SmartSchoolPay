<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

<?php if( $type == 'application_accept'): ?>
    <h3>Hello <?php echo e($name); ?>,</h3>

    <p>Congratulations! Your child, <?php echo e($child_name); ?>, has been successfully registered for the <?php echo e($class_name); ?> class. Below are their login credentials:</p>

    <h4>Your Login Credentails:</h4>
    <p>
        <strong>Email</strong> <?php echo e($username); ?><br>
        <strong>Password:</strong> <?php echo e($password); ?><br>
    </p>

    <h4>Your Child's Login Credentials:</h4>
    <p>
        <strong>GR Number:</strong> <?php echo e($child_grnumber); ?><br>
        <strong>Password:</strong> <?php echo e($child_password); ?><br>
        <strong>Class Section:</strong> <?php echo e($class_name); ?>

    </p>

    <p>If you encounter any issues or need further assistance, please do not hesitate to contact our support team.</p>

    <p>Thank you for being a part of our school <?php echo e($school_name); ?>.</p>

    Sincerely,
    <br>
    <?php echo e($school_name); ?>

    <br>
    <?php echo e($school_contact); ?>

    <br>
    <?php echo e($school_email); ?>


<?php endif; ?>

<?php if($type == 'application_reject'): ?>

    Dear <?php echo e($name); ?>,
    <br>
    <br>
    Thank you for your interest in <?php echo e($school_name); ?>.
    <br>
    We have received <?php echo e($child_name); ?>'s application for Class <?php echo e($class_name); ?>. We appreciate the time and effort you invested in the application process.
    <br>
    After careful consideration, we regret to inform you that we are unable to offer <?php echo e($child_name); ?> admission at this time. This decision was not made lightly, and it reflects the highly competitive nature of our admissions process this year.
    <br>
    We encourage <?php echo e($child_name); ?> to continue pursuing their academic goals, and we wish them every success in their future endeavors.
    <br>
    Thank you once again for considering <?php echo e($school_name); ?>.
    <br>
    <br>
    <br>
    Sincerely,
    <br>
    <?php echo e($school_name); ?>

    <br>
    <?php echo e($school_contact); ?>

    <br>
    <?php echo e($school_email); ?>

<?php endif; ?>
</body>
</html>
<?php /**PATH /var/www/public_html/smartschoolpay/resources/views/students/email.blade.php ENDPATH**/ ?>