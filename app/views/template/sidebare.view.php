<div class="list-group">
        <h4  class="list-group-item list-group-title">Categories</h4>
        <?php  foreach ($data["categories"] as $key => $value): ?>

                  <a href="#" class="list-group-item"><?= $value["category"] ?></a>


        <?php endforeach; ?>
</div>