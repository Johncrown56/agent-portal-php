<!-- Breadcrumbs -->
<nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-no-gutter font-size-1 space-0">              
            <li class="breadcrumb-item">
                <a class="text-dark" href="./">Home</a>
            </li>
            <!-- <?php foreach($result->article[0]->topicBreadcrumb as $key => $val ){?>
            <li class="breadcrumb-item">
                <a class="text-dark" href="topic/<?php echo  $val->topic[0]->id;?>"><?php echo $val->topic[0]->name;?></a>
            </li>
            <?php } ?> -->
            <li class="breadcrumb-item">
                <a class="text-dark" href="topic/<?php echo  $val->topic[0]->id;?>"><?php echo $result->article[0]->topicBreadcrumb[0]->name;?></a>
            </li>
            <li class="breadcrumb-item text-primary active" aria-current="page"><?php echo  $result->article[0]->name;?>
           </li>
          </ol>
        </nav>
        <!-- End Breadcrumbs -->