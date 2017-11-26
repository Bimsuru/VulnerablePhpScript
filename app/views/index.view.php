<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/phpscript/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/phpscript/public/css/style.css">
    <title>QAnswers</title>
</head>
<body>

    <?php
        require_once("../app/views/template/navbar.php");
    ?>

    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <?php
                    require_once("../app/views/template/sidebare.php");
                ?>
            </div>
            <div class="col-md-9">
                <form>
                    <div class="question-post">
                            <textarea name="question" placeholder="What is the best way to learn C?"></textarea>
                            <div class="question-action">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                                            <select style="width:200px;" class="form-control" name="category">
                                                <option>Computer Science</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="submit" value="Ask Community" class="btn btn-danger">
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
                <div class="question-section">
                    <h4> <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, unde.</a></h4>
                    <span class="question-info" >Question added by <a href="#" >opmarq</a> in <a href="#" >computer science</a></span>
                </div> 
            </div>
        </div>

    </div>  

</body>
</html>