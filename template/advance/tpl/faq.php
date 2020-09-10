<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 04/02/2020 - 6:55 PM
 */
?>
<section id="faq" class="faq">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2><?php elang('frequently_questions'); ?></h2>
        </div>
        <ul class="faq-list">
            <li data-aos="fade-up">
                <a data-toggle="collapse" class="collapsed" href="#faq1"><?php elang('question'); ?> 1? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq1" class="collapse" data-parent=".faq-list">
                    <p>
                        <?php elang('answer'); ?> 1
                    <p><?php elang('edit_on'); ?> <b>"/template/advance/tpl/faq.php"</b>.</p>
                    </p>
                </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="100">
                <a data-toggle="collapse" href="#faq2" class="collapsed"><?php elang('question'); ?> 2? <i
                            class="bx bx-chevron-down icon-show"></i><i
                            class="bx bx-x icon-close"></i></a>
                <div id="faq2" class="collapse" data-parent=".faq-list">
                    <p>
                        <?php elang('answer'); ?> 2
                    </p>
                </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="200">
                <a data-toggle="collapse" href="#faq3" class="collapsed"><?php elang('question'); ?> 3? <i
                            class="bx bx-chevron-down icon-show"></i><i
                            class="bx bx-x icon-close"></i></a>
                <div id="faq3" class="collapse" data-parent=".faq-list">
                    <p>
                        <?php elang('answer'); ?> 3
                    </p>
                </div>
            </li>
        </ul>
    </div>
</section>