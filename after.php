<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Activity Base</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/adwords.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="global.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>
    <!-- Start your project here-->
    <div class="main">
        <div class="header-container">
            <h1>how was our day?</h1>
        </div>
        <div class="content-container">
            <div class="inputs">
                <select id="activity">
                    <?php
                    $db = new mysqli("127.0.0.1", "root", "root", "abase");
                    $query = $db->query("SELECT * FROM abase WHERE allocated_time IS null");
                    while($activity = $query->fetch_assoc()){
                        echo '
                        <option value="'.$activity["id"].'">'.$activity["activity"].'</option>
                        ';
                    }
                    ?>
                </select>
                <div class="form-outline">
                    <input type="text" id="allocated" class="form-control" />
                    <label class="form-label" for="typeText">allocated time</label>
                </div>
                <div class="form-outline">
                    <input type="text" id="wages" class="form-control" />
                    <label class="form-label" for="typeText">wages</label>
                </div>
            </div>
            <div class="after-buttons">
                <div class="buttons">
                    <button type="button" class="btn btn-warning" onclick="window.location = 'index.html'">back</button>
                </div>
                <div class="buttons">
                    <button type="button" class="btn btn-primary" onclick="window.location = 'base.php'">glance at the
                        base</button>
                </div>
                <div class="buttons">
                    <button type="button" class="btn btn-success" id="save">save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script>
        $("#save").on("click", function () {
            let allocated = $("#allocated").val()
            let wages = $("#wages").val()
            let activity = $("#activity").val()

            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    action: "add-after",
                    allocated: allocated,
                    wages: wages,
                    activity: activity
                },
                success: function (success) {
                    if (success == "OK") {
                        alert("Dodano pomyślnie aktywność.")
                    } else {
                        alert("Wystąpił pewien problem.")
                        console.error(success)
                    }
                }
            })
        })
    </script>
</body>

</html>