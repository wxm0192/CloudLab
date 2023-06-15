<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 实例</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>警告框动画</h2>
  <p>.fade 和 .show 类在关闭警报消息时添加淡入淡出效果。</p>
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>成功！</strong>此警报框表示成功或积极的动作。
  </div>
  <div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>信息！</strong>此警报框表示中性的信息更改或操作。
  </div>
  <div class="alert alert-warning alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>警告！</strong>此警报框表示可能需要注意的警告。
  </div>
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>危险！</strong>此警报框表示危险或潜在的负面操作。
  </div>
  <div class="alert alert-primary alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>基本！</strong>此警报框表示重要的动作。
  </div>
  <div class="alert alert-secondary alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>次要！</strong>此警报框表示不太重要的操作。
  </div>
  <div class="alert alert-dark alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>深色！</strong>深灰色警报。
  </div>
  <div class="alert alert-light alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>浅色！</strong>浅灰色警报。
  </div>
</div>

</body>
</html>

