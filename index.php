<?php 

$title = 'Roman Numeral Converter';

require_once 'include/header.php';
require_once 'include/classes/Converter.php';

?>

    <h1 class="text-center mt-5"><?php echo $title; ?></h1>
        <form action="" method="POST">
            <div class="row mt-4">
                <div class="col-md-3 offset-md-4">
                    <input class="form-control" type="text" name="number" />
                </div>
                <button class="btn btn-outline-primary col-md-1" type="submit">Submit</button>
            </div>

            <?php if(!empty($_POST) && $_POST['number'])
            {
                echo '<p class="text-center mt-4">' . Converter::run($_POST['number']) . '</p>';
            }
            ?>
        </form>

<?php 

echo require_once('include/footer.php');

