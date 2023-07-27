<?php
global $post;
$the_post = CertificateModel::get($post);
?>
<section>
    <div class="w-100 pt-80 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="js-content_certificate">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><?= $the_post['title']; ?></h3>
                                <div class="row mb-1">
                                    <div class="col-6 fw-bold">Certificate No. : </div>
                                    <div class="col-6"><?= $the_post['certificate_number']; ?></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6 fw-bold">Company Name : </div>
                                    <div class="col-6"><?= $the_post['company_name']; ?></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6 fw-bold">Valid Until : </div>
                                    <div class="col-6"><?= $the_post['valid_until']; ?></div>
                                </div>
                                <?php
                                $product = array_map(function ($obj) {
                                    $text = $obj['text'];
                                    return "<li>$text</li>";
                                }, $the_post['products'] ?? []);

                                $product = "<ul>" . implode("", $product);
                                $product .= "</ul>";
                                ?>
                                <div className="row mb-1">
                                    <div class="col-6 fw-bold">Products : </div>
                                    <div class="col-6"><?= $product; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>