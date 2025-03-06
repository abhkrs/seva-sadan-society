
<div class="clipy animate-this">
    <img src="<?php echo esc_url($cimage['url']); ?>"
        alt="<?php echo esc_attr($cimage['alt']); ?>" class="img-fluid">
    <?php if($cicon['url']){ ?>
    <div class="icon">
        <img src="<?php echo esc_url($cicon['url']); ?>"
    alt="<?php echo esc_attr($cicon['alt']); ?>" class="">
    </div>  
    <?php } ?>
</div>