<?php 

if(!empty($_POST))
{
    print_r($_POST);
}

$title = 'Roman Numeral Converter';

require_once 'include/header.php';

?>

    <h1 class="text-center"><?php echo $title; ?></h1>
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-3 offset-sm-4">
                    <input class="form-control" type="text" name="numeral" />
                </div>
                <button class="btn btn-outline-primary col-sm-1" type="submit">Submit</button>
            </div>
        </form>

<?php 

echo require_once('/include/footer.php');

