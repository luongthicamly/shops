<div class="bg-list text-right">
    <div class="example-2 scrollbar-grey text-left">
        <div class="row m-0">
            <div class="col-lg-6 col-md-12 mt-4 p-mb">
                <div class="row m-0">
                    <div class="card card-body p-2 white border-0">
                        <div class="row m-0">
                            <div class="col-lg-4 col-md-4 col-6 pl-0">
                                    <img class = "img-jobs" src="<?= $logo_url; ?>">
                            </div>
                            <div class="col-lg-4 col-md-4 col-6">
                                <div class="text-body p-0">
                                    <!-- hospital name -->
                                    <p class=" text-truncate"> <?= $job['title'];?> </p>
                                        <!-- category job name -->
                                    <p class="black-text text-truncate"><?= $job_category; ?></p>
                                        <!-- salary  -->
                                        <?php if($job['min_salary'] == $job['max_salary']){ ?>
                                        <p class=" black-text text-truncate">日給　<?= Util::convertCurrency($job['max_salary']);?><?= __("Yen"); ?>　<span ><?= $job['province'];?><?= $job['town'];?></span>
                                        </p>
                                    <?php } else {?>
                                        <p class=" black-text text-truncate">日給　<?= Util::convertCurrency($job['min_salary']);?><?= __("Yen"); ?> ～<?= Util::convertCurrency($job['max_salary']);?><?= __("Yen"); ?>　<span ><?= $job['province'];?><?= $job['town'];?></span>
                                        </p>
                                    <?php }?>
                                        <!-- tags job -->
                                    <p class="black-text text-truncate">
                                        <?= $job['description'];?>
                                    </p>
                                    <!-- posted date -->
                                    <p class=" black-text text-truncate">登録日<?= date('Y/m/d', strtotime($job['post_date'])); ?></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 pr-0-desktop">
                                <div class="text-lg-right no-pd-right">
                                    <a href="<?= $base_url.'/index/job/'.($job['id']*99);?>" class="btn btn-browse-job button-list-apply waves-effect waves-light">この求人を閲覧 </a>
                                </div>
                                <div class=" mb-center no-pd-right">
                                    <?php if(!$auth): ?>
                                        <a href="#" class="popovers text-muted o-pd-right"  data-toggle="popover" data-placement="left"  data-content="<a href='<?= $base_url;?>/doctor/login' title='Sign In'> You should Sign In to save jobs</a>" data-html="true">
                                            <button type="button" class="z-depth-0  bnt-job-delete btn like-job button-job-delete waves-effect waves-light btn-like-jobs ">
                                                <span class="color-icon-save">★</span>
                                                <span class="color-save">お気に入りに登録</span>
                                            </button>
                                        </a>
                                    <?php else: ?>
                                        <?php if($is_liked){?>
                                            <button data-id='<?= $job['id'];?>' type="button"
                                                    class="btn btn-w160 like-job button-job-delete p-2 waves-effect waves-light o-pd-right t_<?= $job['id'];?>">
                                                    <span class="color-icon-save">★</span>
                                                    <span class="color-save">お気に入りを解除</span> <!-- liked -->
                                                </button>
                                            <?php }else{ ?>
                                                <button data-id='<?= $job['id'];?>' type="button"
                                                    class="btn btn-w160 like-job button-job-save p-2 waves-effect waves-light o-pd-right t_<?= $job['id'];?>">
                                                    <span class="color-icon-save">★</span>
                                                    <span class="color-save">お気に入りに登録</span> <!--don't like -->
                                                </button>
                                            <?php }?>
                                        <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>