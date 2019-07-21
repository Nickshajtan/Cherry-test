<?php
/**
 * The template for displaying the footer
 *
 */
    ?>
           <section class="section-footer">
                 <div class="footer-right-corner"></div>
                <footer>
                    <nav class="bottom container">
                        <div class="first-block">
                            <div class="logo">
                                <?php the_custom_logo();?><br />
                                <p>2014-<?php echo date('Y');?> | BIGbomb</p>
                                <p>Рекламно-производительная компания.</p>
                                <p>Все права защищены.</p>
                            </div>
                        </div>
                        <div class="second-block">
                           <?php wp_nav_menu('theme_location=social'); ?>
                        </div>
                        <div class="third-block">
                            <?php wp_nav_menu('theme_location=table'); ?>
                        </div>
                        <div class="fourth-block"></div>
                    </nav>
                </footer>
            </section>
        </div>
    </body>
</html>