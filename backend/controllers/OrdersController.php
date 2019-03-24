<?php

namespace backend\controllers;

use Yii;
use backend\models\Orders;
use backend\models\User;
use backend\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller {

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
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex() {
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            foreach ($post as $requests => $request) {
                if ($request['name'] != "") {
                    $order1 = Orders::find()->select(['orders.*'])->leftJoin('cart', '`cart`.`cart_alias` = `orders`.`cart_alias`')->with('cart')->leftJoin('user', '`user`.`id` = `orders`.`user_id`')->with('user')->leftJoin('products', '`products`.`id` = `cart`.`product_id`')->with('products')->where(['like', 'products.name', $request['name']])->all();
                } else {
                    $order1 = array();
                }

                if ($request['email'] != "") {
                    $order2 = Orders::find()->select(['orders.*'])->leftJoin('cart', '`cart`.`cart_alias` = `orders`.`cart_alias`')->with('cart')->leftJoin('user', '`user`.`id` = `orders`.`user_id`')->with('user')->leftJoin('products', '`products`.`id` = `cart`.`product_id`')->with('products')->where(['orders.user_email' => $request['email']])->all();
                } else {
                    $order2 = array();
                }
                
                
                if($request['from'] != ""){
                    $from = strtotime($request['from']);
                }else{
                    $from = time();
                }
                if($request['to'] != ""){
                    $to = strtotime($request['to']);
                }else{
                    $to = time();
                }
                
                if ($request['from'] != "") {
                    $order3 = Orders::find()->select(['orders.*'])->leftJoin('cart', '`cart`.`cart_alias` = `orders`.`cart_alias`')->with('cart')->leftJoin('user', '`user`.`id` = `orders`.`user_id`')->with('user')->leftJoin('products', '`products`.`id` = `cart`.`product_id`')->with('products')->where(['between', 'orders.date_created', $from, $to ])->all();
                } else {
                    $order3 = array();
                }
                
                if ($request['to'] != "") {
                    $order4 = Orders::find()->select(['orders.*'])->leftJoin('cart', '`cart`.`cart_alias` = `orders`.`cart_alias`')->with('cart')->leftJoin('user', '`user`.`id` = `orders`.`user_id`')->with('user')->leftJoin('products', '`products`.`id` = `cart`.`product_id`')->with('products')->where(['between', 'orders.date_created', $from, $to ])->all();
                } else {
                    $order4 = array();
                }
                
                $orders = array_merge($order1,$order2,$order3,$order4);
                return $this->render('index', [
                            'orders' => $orders,
                ]);
            }
        } else {
            $orders = Orders::find()->select(['orders.*'])->leftJoin('cart', '`cart`.`cart_alias` = `orders`.`cart_alias`')->with('cart')->leftJoin('user', '`user`.`id` = `orders`.`user_id`')->with('user')->leftJoin('products', '`products`.`id` = `cart`.`product_id`')->with('products')->all();
//        die(var_dump($orders[0]['products']));
            return $this->render('index', [
                        'orders' => $orders,
            ]);
        }
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
