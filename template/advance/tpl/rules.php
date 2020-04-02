<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 04/02/2020 - 6:55 PM
 */
?>
    <section id="why-us" class="why-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-stretch">
                    <div class="content" data-aos="fade-up">
                        <h3>SERVER RULES, <strong>READ BEFORE REGISTER</strong></h3>
                        <p>
                            Read our rules ...
                        </p>
                    </div>
                    <div class="accordion-list">
                        <ul>
                            <li data-aos="fade-up" data-aos-delay="100">
                                <a data-toggle="collapse" class="collapse" href="#accordion-list-1"><span>01</span> Rule
                                    1<i
                                            class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-1" class="collapse show" data-parent=".accordion-list">
                                    <p>
                                        Rule 1 description
                                    </p>
                                    <p>
                                        Edit on <b>"/template/advance/tpl/rules.php"</b>.
                                    </p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="200">
                                <a data-toggle="collapse" href="#accordion-list-2" class="collapsed"><span>02</span>
                                    Rule 2<i
                                            class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-2" class="collapse" data-parent=".accordion-list">
                                    <p>
                                        Rule 2 description
                                    </p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="300">
                                <a data-toggle="collapse" href="#accordion-list-3" class="collapsed"><span>03</span>
                                    Rule 3<i
                                            class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-3" class="collapse" data-parent=".accordion-list">
                                    <p>
                                        Rule 3 description
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 align-items-stretch"
                     style='background-image: url("<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/invincible.png");background-size: auto 100%;background-position: center;background-repeat: no-repeat;'
                     data-aos="zoom-in">
                </div>
            </div>
        </div>
    </section>