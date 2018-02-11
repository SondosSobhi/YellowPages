<html>
    <head>
        <link href="/../css/style.css" rel="stylesheet">
        <link href="/../css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="categ-page">

        <section class="categ-img">
        </section>

        <section style="top: 100px;" class="categ-form">

            <h1>Comany</h1><br>

            <form method="post">

                <div class="form-group">
                    <label for="Cname">Name</label>
                    <input type="text" name="Cname" class="form-control" placeholder="Enter company name" required>
                </div>

                <div class="form-group">
                    <label for="Cphone">phone</label>
                    <input type="text" name="Cphone" class="form-control" placeholder="Enter caterory phone" required>
                </div>

                <!--<div class="form-group">
                    <label for="Ccity">City</label>
                    <input type="text" name="Ccity" class="form-control" placeholder="Enter caterory city" required>
                </div>-->
                <div class="form-group">
                    <label for="Ccity">City</label>
                    <select name="city" class="form-control" id="city_select" required>
                        <option selected disabled>--Select city--</option>
                        <?php $i=0; foreach ($CityId as $categ): ?>
                            <option value=<?php echo"{$CityId[$i]}"; ?>><?php echo "{$CityName[$i]}"; $i++;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="Carea">Area</label>
                    <select name="area" class="form-control" id="area_select" required>
                        <option selected disabled>--Select area--</option>
                    </select>
                </div>

                <button type="submit" name="next" class="btn">Next</button>
            </form>
        </section>
    <script src="/../js/jquery-1.9.1.min.js"></script>
    <script src="/../js/bootstrap.min.js"></script>
    <script src="/../js/yellow.js"></script>
    </body>
</html>