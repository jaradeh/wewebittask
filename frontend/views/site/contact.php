<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Contact Us';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Inner Banner -->
<div class="inner-banner overlay-dark" data-enllax-ratio="-.3" style="background: url(/images/banner/<?php echo $banner_image ?>) no-repeat fixed;background-size: 100%;">
    <div class="container">
        <div class="heading-breadcrumbs">
            <h2><?= yii::t('app', 'contact us'); ?></h2>
        </div>
    </div>
</div>
<!-- Inner Banner -->

<!-- Main Content -->
<main id="main-content">

    <!-- Contact -->
    <div class="theme-padding">
        <div class="container">
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h5><i class="icon fa fa-check"></i> Successfully Sent !</h5>
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h5><i class="icon fa fa-warning"></i> Fail !</h5>
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>
            <!-- Qutauion -->
            <div class="contact-qoutaion">
            </div>
            <!-- Qutauion -->

            <!-- Contact Detail -->
            <div class="contact-detail">
                <div class="row">

                    <!-- Form -->
                    <div class="col-lg-6 col-xs-12">
                        <div class="contact-form contact-widget">
                            <h3><?= yii::t('app', 'Send an'); ?> <span class="theme-color"><?= yii::t('app', 'email'); ?></span></h3>
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="form-group">
                                <label><?= yii::t('app', 'Name'); ?> :</label>
                                <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                            <div class="form-group">
                                <label><?= yii::t('app', 'email'); ?> :</label>
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                            <div class="form-group">
                                <label><?= yii::t('app', 'Message'); ?> :</label>
                                <?= $form->field($model, 'message')->textarea(['maxlength' => true])->label(false) ?>
                                <?= $form->field($model, 'date')->hiddenInput(['value' => time()])->label(false) ?>
                            </div>
                            <div class="form-group text-right">
                                <?= Html::submitButton($model->isNewRecord ? yii::t('app', 'send email') : 'Update', ['class' => $model->isNewRecord ? 'btn dark bold-color' : 'btn btn-primary']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <!-- Form -->

                    <!-- Address Figure -->
                    <div class="col-lg-6 col-xs-12">
                        <div class="contact-widget">
                            <h3><?= yii::t('app', 'Our contact'); ?> <span class="theme-color"><?= yii::t('app', 'details'); ?></span></h3>
                            <div class="address-box after-clear">
                                <ul>
                                    <li>
                                        <h4><?= yii::t('app', 'Phone'); ?></h4>
                                        <span><?php echo $info->phone ?></span>
                                    </li>
                                    <li>
                                        <h4><?= yii::t('app', 'Fax'); ?></h4>
                                        <span><?php echo $info->fax ?></span>
                                    </li>
                                    <li>
                                        <h4><?= yii::t('app', 'email'); ?></h4>
                                        <span><a href="mailto:<?php echo $info->email ?>?Subject=Hello" target="_top"><?php echo $info->email ?></a></span>
                                    </li>
                                    <li>
                                        <h4><?= yii::t('app', 'We are social'); ?></h4>
                                        <div class="social-icons">
                                            <ul>
                                                <?php if (isset($social_media->facebook) && $social_media->facebook != "") { ?>
                                                    <li><a href="<?php echo $social_media->facebook; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
                                                <?php } ?>
                                                <?php if (isset($social_media->twitter) && $social_media->twitter != "") { ?>
                                                    <li><a href="<?php echo $social_media->twitter; ?>" target="_blank"><i class="icon-twitter"></i></a></li>
                                                <?php } ?>
                                                <?php if (isset($social_media->linkedin) && $social_media->linkedin != "") { ?>
                                                    <li><a href="<?php echo $social_media->linkedin; ?>" target="_blank"><i class="icon-linkedin2"></i></a></li>
                                                <?php } ?>
                                                <?php if (isset($social_media->instagram) && $social_media->instagram != "") { ?>
                                                    <li><a href="<?php echo $social_media->instagram; ?>" target="_blank"><i class="icon-instagram"></i></a></li>
                                                <?php } ?>
                                                <?php if (isset($social_media->youtube) && $social_media->youtube != "") { ?>
                                                    <li><a href="<?php echo $social_media->youtube; ?>" target="_blank"><i class="icon-youtube"></i></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <p><?php echo $info->working_hours ?></p>
                            <div class="address-box map-img after-clear">
                                <div class="address-widget">
                                    <h4><?= yii::t('app', 'Our location'); ?></h4>
                                    <p><?php echo $info->location ?></p>
                                </div>
                                <div class="address-widget">
                                    <p><?php echo $info->po ?></p>
                                </div>
                            </div>
                            <p></p>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13918.173504662254!2d47.9172134!3d29.2957326!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x724e57eb4ce5645c!2sArizona+National+Company!5e0!3m2!1sen!2sus!4v1506680764178" style="width:100%;" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </div>
                    </div>
                    <!-- Address Figure -->

                </div>
            </div>
            <!-- Contact Detail -->

        </div>
    </div>
    <!-- Contact -->

</main>
<!-- Main Content -->