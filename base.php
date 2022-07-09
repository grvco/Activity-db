<?php

$db = new mysqli("127.0.0.1", "root", "root", "abase");
$query = $db->query("SELECT * FROM abase");

?>

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
        <div class="base-header-container">
        <div class="buttons">
                    <button type="button" class="btn btn-warning" onclick="window.location = 'index.html'">back</button>
                </div><h1>History</h1>
        </div>
        <div class="content-container">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Priority</th>
                        <th>Date</th>
                        <th>Activity</th>
                        <th>Expected Time</th>
                        <th>Allocated Time</th>
                        <th>Wages</th>
                        <th>Hourly Wages</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($record = $query->fetch_assoc()){
                        ?>
                    <tr>
                        <td><?php if($record["priority"] == 0){
echo '
<span class="badge badge-success rounded-pill d-inline">standard</span>
';
                        }else{
                            echo ' 
                            <span class="badge badge-danger rounded-pill d-inline">!!!</span>
                            ';
                        } ?></td>
                        <td><?php echo $record["date"];?></td>
                        <td class="activity-table"><?php echo $record["activity"];?></td>
                        <td class="expected-table"><?php echo $record["expected_time"];?></td>
                        <td class="allocated-table"><?php echo $record["allocated_time"];?></td>
                        <td class="wages-table"><?php echo $record["wages"];?></td>
                        <td><?php echo $record["hourly"];?></td>
                        <td>
                            <button type="button" class="btn btn-link btn-sm btn-rounded edit" data-id="<?php echo $record["id"]; ?>">
                                Edit
                            </button>
                        </td>
                    </tr>
                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script>

    </script>

    <!--MODAL MODAL MODAL-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="activity-edit" placeholder="Activity" aria-label="Username"
                            aria-describedby="basic-addon1" />
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="expected-edit" placeholder="Expected Time" aria-label="Username"
                            aria-describedby="basic-addon1" />
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="allocated-edit" placeholder="Allocated Time" aria-label="Username"
                            aria-describedby="basic-addon1" />
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="wages-edit" placeholder="Wages" aria-label="Username"
                            aria-describedby="basic-addon1" />
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="priority-edit" />
                        <label class="form-check-label" for="flexCheckDefault">Priority</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-changes">Save changes</button>
            </div>
        </div>
    </div>
    </div>

    <script>
        $(".edit").on("click", function () {
            let button = $(this)
            $("#activity-edit").val(
                button.parent().parent().find(".activity-table").text()
            )
            $("#expected-edit").val(
                button.parent().parent().find(".expected-table").text()
            )
            $("#allocated-edit").val(
                button.parent().parent().find(".allocated-table").text()
            )
            $("#wages-edit").val(
                button.parent().parent().find(".wages-table").text()
            )
            $("#save-changes").attr("data-id", button.attr("data-id"))
            $("#exampleModal").modal("show")
        })
        $("#save-changes").on("click", function(){
            let activityEdit = $("#activity-edit").val()
            let expectedEdit = $("#expected-edit").val()
            let allocatedEdit = $("#allocated-edit").val()
            let wagesEdit = $("#wages-edit").val()
            let idEdit = $(this).attr("data-id")
            let priorityEdit = $("#priority-edit").is(":checked") ? 1 : 0;

            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{
                    activityEdit: activityEdit,
                    expectedEdit:expectedEdit,
                    allocatedEdit:allocatedEdit,
                    wagesEdit:wagesEdit,
                    id:idEdit,
                    priorityEdit: priorityEdit,
                    action:"edit"
                },
                success: function(success){
                    if(success == "OK"){
                        alert("Zapisano zmiany")
                        location.reload()
                    }else{
                        alert("Wystąpił problem")
                        console.error(success)
                    }
                }
            })
        })
    </script>


</body>

</html>