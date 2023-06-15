<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap 实例</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>

        <div class="container mt-3">
            <h2>Textarea</h2>
            <p>也可以使用 .form-control 类来设置 textarea 的样式：</p>
            <form action="/test/js/mouse/t01.php">
                <div class="mb-3 mt-3">
                    <div class="row">
                        <div class="col-xs-4">
                            <label for="comment">Comments:</label>
                            <textarea class="form-control" rows="5" id="comment"
                                name="text">
                            </textarea>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </div>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="mframe" class="embed-responsive-item"
                        src="http://8.142.163.140:31656/test/bootsrap/t01.php">test</iframe>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-12">移动端占用12列，PC占据4列</div>
                        <div class="col-md-8 col-12">移动端占用6列，PC占据8列</div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-12">
                    		<iframe id="mframe" class="embed-responsive-item"
                        		src="http://8.142.163.140:31656/test/bootsrap/t01.php">test</iframe>
			</div>
                        <div class="col-md-4 col-12">
                    		<iframe id="mframe" class="embed-responsive-item"
                        		src="http://8.142.163.140:31656/test/bootsrap/t01.php">test</iframe>
			</div>
                    </div>
                </div>

