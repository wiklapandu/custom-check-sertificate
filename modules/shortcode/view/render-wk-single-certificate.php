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
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Certificate No. <span><?= $the_post['certificate_number']; ?></span></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Company Name : </div>
                                    <div class="col-md-6"><?= $the_post['company_name']; ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Company Address : </div>
                                    <div class="col-md-6"><?= $the_post['company_address']; ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Manufacturer Address : </div>
                                    <div class="col-md-6"><?= $the_post['manufacturer_address']; ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Product Category : </div>
                                    <div class="col-md-6"><?= $the_post['product_category']; ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Date Of Issue : </div>
                                    <div class="col-md-6"><?= $the_post['date_of_issue']; ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Valid Until : </div>
                                    <div class="col-md-6"><?= $the_post['valid_until']; ?></div>
                                </div>
                                <?php
                                $products = $the_post['products'];
                                ?>
                                <div className="row mb-1">
                                    <div class="col-6 fw-bold">Products : </div>
                                    <div class="col-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Product</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($products as $key => $product): ?>
                                                    <tr>
                                                        <th scope="row"><?= ++$key;?></th>
                                                        <td>
                                                            <b><?= $product['title'];?></b>
                                                            <?= $product['description'];?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php if($the_post['title_galery'] != ""): ?>
                                    <div class="col-md-12">
                                        <h2 class="fs-2 text-center"><?php echo $the_post['title_galery']; ?></h2>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <div class="row">
                                    <?php foreach($the_post['galleries'] as $img_url): ?>
                                    <div class="col-md-4">
                                        <img src="<?php echo $img_url ?>" alt="" class="w-100 img-thumbnail border rounded">
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>