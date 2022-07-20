<?php
$json = file_get_contents('./assets/json/home-box.json');
$data = json_decode($json, true);
?>
<a class="font-weight-bold mr-2" href="./">
            <img class="avatar-img" src="./assets/svg/mtn/home.svg" alt="" style="height: 30px;">
        </a> <span class="mr-2 font-size-50 text-body font-family-light"> | </span>
        <?php
        foreach ($data as $key => $values) {
            $id = $values['id'];
            $img = $values['img'];
            $text2 = $values['text2'];
            $topicId = $values['topicId'];
            $url = gettype($topicId) == "integer" ? 'topic/'.$topicId : $topicId;
            $target = gettype($topicId) == "integer" ? 'self' : '_blank';
            if($id == 2 || $id == 5 || $id == 6){
        ?>
            <a class="font-weight-bold mr-2" href="<?php echo $url;?>" target="<?php echo $target;?>">
                <img class="avatar-img" src="<?php echo $img; ?>" alt="<?php echo $text2; ?>" style="height: 30px;">
            </a>
        <?php } } ?>