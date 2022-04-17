<?php
require_once("./includes/library.php");
$pdo = connectDB();

?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/additems.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <title>Your List</title>
</head>

<body>
    <div class="main-section">
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="off">
                <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <input type="text" name="additem" style="border-color: red" placeholder="This should not be empty!!">
                    <button>Add + </button>
                <?php } else { ?>
                    <input type="text" name="additem" placeholder="Create List">
                    <button>Add + </button>
                <?php } ?>
            </form>


        </div>
        <?php
        $query = "SELECT * FROM list  ORDER BY listID Desc";
        $additems = $pdo->query($query)
        ?>

        <div class="show-todo-section">
            <?php if ($additems->rowCount() <= 0) { ?>
                <div class="todo-item">
                    <input type="checkbox">
                    <h2> buy balloons</h2>
                    <br>
                    <small>created: today </small>
                </div>

            <?php } ?>

            <?php while ($additem = $additems->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $additem['listID']; ?>" class="remove-to-do">X</span>
                    <?php if ($additem['checked']) { ?>
                        <input type="checkbox" data-todo-id=<?php echo $additem['listID']; ?>" class="check-box" checked>

                        <h2 class="checked"> <?php echo $additem['title'] ?></h2>
                    <?php } else { ?>
                        <input type="checkbox" data-todo-id=<?php echo $additem['listID']; ?>" class="check-box">
                        <h2> <?php echo $additem['title'] ?></h2>
                    <?php } ?>

                    <br>
                    <small>exp_date: <?php echo $additem['exp_date'] ?></small>
                </div>
            <?php } ?>

        </div>




    </div>
    <!-- <script>
        src = "./script/jquery-3.6.0.js"
    </script> -->

    <script>
        $(document).ready(function() {
            $('.remove-to-do').click(function() {
                const id = $(this).attr('id');
                $.post("app/remove.php", {
                        id: id
                    },
                    (data) => {
                        alert(data);
                        if (data) {
                            $(this).parent().hide(600);

                        }
                    }
                );


            });
            $(".check-box").click(function(e) {
                const id = $(this).attr('data-todo-id');
                $.post('app/check.php',{
                    id: id
                },
                (data) => {
                    if(data != 'error'){
                      const h2 = $(this).next();  
                      if(data == '1'){
                          h2.removeClass('checked');

                      }else{
                          h2.addClass('checked');
                      }
                          
                    }
                });

            });
        });
    </script>






</body>

</html>