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
            <h1>what's your plan, Bud?</h1>
        </div>
        <div class="content-container">
            <div class="inputs">
                <div class="form-outline">
                    <input type="text" id="activity" class="form-control" />
                    <label class="form-label" for="typeText">activity</label>
                </div>
                <div class="form-outline">
                    <input type="text" id="expected" class="form-control" />
                    <label class="form-label" for="typeText">expected time</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckDefault">is priority?</label>
                    <input class="form-check-input" type="checkbox" value="" id="priority" />
                </div>
            </div>
            <div class="before-buttons">
                <div class="buttons">
                    <button type="button" class="btn btn-warning" onclick="window.location = 'index.html'">back</button>
                </div>
                <div class="buttons">
                    <button type="button" class="btn btn-primary" onclick="window.location = 'base.php'">glance at the
                        base</button>
                </div>
                <div class="buttons">
                    <button type="button" class="btn btn-success" id="new-option">add to checker</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script>
        $("#new-option").on("click", function () {
            let activity = $("#activity").val()
            let expected = $("#expected").val()
            let priority = $("#priority").is(":checked") ? 1 : 0

            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    activity: activity,
                    expected: expected,
                    priority: priority,
                    action: "add-before"
                },
                success: function (success) {
                    if (success == "OK") {
                        alert("Udało się!")
                    } else {
                        alert("Coś poszło nie tak.")
                        console.error(success)
                    }
                }
            })
        })
    </script>


</body>

</html>