<?php

namespace backend\controllers;

use Yii;
use backend\models\AssignedCategory;
use backend\models\Products;
use backend\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            
            function manageImage($image) {
                    $image_extention = $image->extension;
                    if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                        if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/frontend/web/images/products/original/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {

                            Image::thumbnail($full_path, 270, 270)
                                    ->resize(new Box(270, 270))
                                    ->save(dirname(__FILE__) . '/../../' . "/frontend/web/images/products/270x270/" . $path);
                            

                            return $path;
                        } else {
                            return "error";
                        }
                    } else {
                        return "not image";
                    }
                }
            

            $path = $model->image = UploadedFile::getInstance($model, "image");
            if (($model->image)) {
                $manage_image = manageImage($model->image);
                if ($manage_image == "not image") {
                    Yii::$app->session->setFlash('error', 'images must be image (jpg or jpeg or png');
                    return $this->redirect(['products/create']);
                } else if ($manage_image == "error") {
                    Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                    return $this->redirect(['products/create']);
                } else {
                    $model->image = $manage_image;
                    Yii::$app->session->setFlash('success', 'image successfully uploaded!');
                }
            } else {
                $model->image = NULL;
            }


            $model->save();
            $i = 0;
            $categoriesCount = sizeof($post['AssignedCategory']['product_id']);
            for ($i = 0; $i < $categoriesCount; $i++) {
                $modelCategory = new AssignedCategory();
                $modelCategory->product_id = $model->id;
                $modelCategory->category_id = $post['AssignedCategory']['product_id'][$i];
                $modelCategory->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $old_image = $model->image;

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            function manageImage($image) {
                $image_extention = $image->extension;
                if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                    if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/frontend/web/images/products/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {
                        return $path;
                    } else {
                        return "error";
                    }
                } else {
                    return "not image";
                }
            }

            $model->image = UploadedFile::getInstance($model, 'image');
            if (isset($model->image)) {
                $manage_image = manageImage($model->image);
                if ($manage_image == "not image") {
                    Yii::$app->session->setFlash('error', 'image must be image (jpg or jpeg or png');
                    return $this->redirect(['products/update/' . $model->id]);
                } else if ($manage_image == "error") {
                    Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                    return $this->redirect(['products/update/' . $model->id]);
                } else {
                    $model->image = $manage_image;
                }
            } else {
                $model->image = $old_image;
            }


            $model->save();
            AssignedCategory::deleteAll(['product_id' => $model->id]);
            $i = 0;
            $categoriesCount = sizeof($post['AssignedCategory']['product_id']);
            for ($i = 0; $i < $categoriesCount; $i++) {
                $modelCategory = new AssignedCategory();
                $modelCategory->product_id = $model->id;
                $modelCategory->category_id = $post['AssignedCategory']['product_id'][$i];
                $modelCategory->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
