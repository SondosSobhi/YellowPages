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

            <form method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="Ccateg"> categ</label>
                    <select name="categ[]" class="form-control" multiple size="3" id="category_select" required>
                        <option disabled selected>Choose...</option>
                        <?php $i=0; foreach ($CategoryName as $categ): ?>
                            <option value=<?php echo"{$CategoryId[$i]}"; ?>><?php echo "{$CategoryName[$i]}"; $i++;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Carea">Area</label>
                    <input type="file" name="files[]" multiple>
                </div>

                <button type="submit" name="save" class="btn">Save</button>

            </form>

        </section>
        <script src="/../js/jquery-1.9.1.min.js"></script>
        <script src="/../js/bootstrap.min.js"></script>
        <script src="/../js/yellow.js"></script>
    </body>
</html>