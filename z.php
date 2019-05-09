
!
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Repeater</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="https://bootswatch.com/3/paper/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <!-- Repeater Html Start -->
                <div id="repeater">
                    <!-- Repeater Heading -->
                    <div class="repeater-heading">
                        <h5 class="pull-left">Repeater</h5>
                        <button class="btn btn-primary pt-5 pull-right repeater-add-btn">
                            Add
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Repeater Items -->
                    <div class="items" data-group="test">
                        <!-- Repeater Content -->
                        <div class="item-content">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" data-name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Email" data-skip-name="true" data-name="email">
                                </div>
                            </div>
                        </div>
                        <!-- Repeater Remove Btn -->
                        <div class="pull-right repeater-remove-btn">
                            <button class="btn btn-danger remove-btn">
                                Remove
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                   
                </div>
                <!-- Repeater End -->
            </div>
        </div>
    </div>
    <!-- Import repeater js  -->
    <script src="./repeater.js" type="text/javascript"></script>
    <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
</body>

</html>