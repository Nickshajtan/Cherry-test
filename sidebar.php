<?php
/**
 * The main sidebar template file
 *
 */
?>                
                <div class="sidebar">
                    <div class="sidebar-header">
                        <div class="ball"></div>
                        <div class="sidebar-header-bg">
                            <h3>
                            <span><?php echo __('Топ'); ?></span> 
                            <?php echo __('продаж'); ?></h3>
                        </div>
                    </div>
                    <div class="sidebar-body">
                        <?php dynamic_sidebar( 'content-area-third' ); ?>
                    </div>
                </div>