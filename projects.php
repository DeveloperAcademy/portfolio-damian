<?php
$json_file = file_get_contents("projects.json");

$json_array = json_decode($json_file, true);
$projects = $json_array["projects"];


?>
<h1 class="page-title">PROJECTS</h1>
<div class="container">
    <div class="row projects">
        <?php
        foreach ($projects as $project):?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="project">
                    <img src="<?php echo $project['img_src']; ?>" data-toggle="modal"
                         data-target="#<?php echo preg_replace('/\s+/', '', $project['title']) ?>"
                         class="center-block img-rounded project-img" alt="<?php echo $project['img_alt']; ?>"/>
                    <figcaption>
                        <h2 class="project-title"><?php echo $project['title'] ?></h2>
                    </figcaption>
                </figure>
            </div>

            <div id="<?php echo preg_replace('/\s+/', '', $project['title']) ?>" class="modal fade modal-inverse"
                 tabindex="-1"
                 role="dialog"
                 aria-labelledby="myLargeModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-top">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center"><?php echo $project['title']; ?></h4>
                        </div>
                        <div class="modal-body modal-inside">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                                    <img src="img/dummy_project_img.jpg" data-toggle="modal"
                                         data-target=".bd-example-modal-lg" class="project-img-modal center-block"/>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                                    <p class="project-description">
                                        <?php echo $project['description']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>
