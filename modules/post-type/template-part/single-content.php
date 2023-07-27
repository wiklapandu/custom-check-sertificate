<?php
    global $post;
    $the_post = CertificateModel::get($post);

    wp_nav_menu();
?>
<section>
    <div class="w-100 pt-80 black-layer pb-70 opc85 position-relative">
        <div class="fixed-bg" style="background-image: url()"></div>
        <div class="container">
            <div class="page-title-wrap text-center w-100">
                <div class="page-title-inner d-inline-block">
                    <h1 class="mb-0"><?= $the_post['title'];?></h1>
                    <?php
                      $post_type = get_post_type_object($post->post_type)  
                    ?>
                    <ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= home_url();?>">Home</a> </li> <li class="breadcrumb-item"><a href="#"><?= $post_type->label;?></a>  </li><li class="breadcrumb-item active"><?= $the_post['title'];?></li></ol>						</div>
            </div><!-- Page Title Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="w-100 pt-80 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="js-content_certificate">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><?= $the_post['title'];?></h3>
                                <div class="row mb-1">
                                    <div class="col-6 fw-bold">Certificate No. : </div>
                                    <div class="col-6"><?= $the_post['certificate_number'];?></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6 fw-bold">Company Name : </div>
                                    <div class="col-6"><?= $the_post['company_name'];?></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6 fw-bold">Valid Until : </div>
                                    <div class="col-6"><?= $the_post['valid_until'];?></div>
                                </div>
                                <?php
                                  $product = array_map(function ($obj) {
                                    $text = $obj['text'];
                                    return "<li>$text</li>";
                                  }, $the_post['products']);

                                  $product = "<ul>" . implode("", $product);
                                  $product .= "</ul>";
                                ?>
                                <div className="row mb-1">
                                    <div class="col-6 fw-bold">Products : </div>
                                    <div class="col-6"><?= $product;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>