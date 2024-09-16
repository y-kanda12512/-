<?php if (paginate_links()): ?>
    <div class="p-pagination">
        <?php
        echo paginate_links(
            array(
                'end_size' => 1,
                'mid_size' => 1,
                'prev_next' => true,
                'prev_text' =>  "",
                'next_text' => '',
                'show_all' => false,
            )
        );
        ?>
    </div>
<?php endif; ?>