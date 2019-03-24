<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use backend\models\Cart;
use backend\models\Products;
use backend\models\Orders;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function init() {
        parent::init();
        $session = Yii::$app->session;
        if (isset($_GET['language'])) {
            $lang = $_GET['language'];
            $action = $_GET['action'];
            $session['language'] = $lang;
            if ($lang == "en-US") {
                $lang_id = "1";
            }
            if ($lang == "fr-FR") {
                $lang_id = "2";
            }
            if ($lang == "ar-AR") {
                $lang_id = "3";
            }
            $session['language_id'] = $lang_id;

            if ($action == "index") {
                $this->goHome();
            } else {
                $this->redirect($action);
            }
        }
        if ($session['language'] == "" || empty($session['language'])) {
            $session['language'] = "en-US";
            $session['language_id'] = "1";
        }
        Yii::$app->language = $session['language'];
    }

    public function actionLang() {

        $session = Yii::$app->session;
        if (isset($_GET['language'])) {
            $lang = $_GET['language'];
            $action = $_GET['action'];
            $session['language'] = $lang;
            if ($lang == "en-US") {
                $lang_id = "1";
            }
            if ($lang == "ar-AR") {
                $lang_id = "2";
            }
            $session['language_id'] = $lang_id;

            if ($action == "index") {
                $this->goHome();
            } else {
                $this->redirect($action);
            }
        }
        if ($session['language'] == "" || empty($session['language'])) {
            $session['language'] = "en-US";
            $session['language_id'] = "1";
        }
        Yii::$app->language = $session['language'];
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('login');
        }
        $session = Yii::$app->session;
        $lang_id = $session['language_id'];
        return $this->render('index');
    }

    /**
     * Displays Cart.
     *
     * @return mixed
     */
    public function actionCart() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        }
        $session = Yii::$app->session;
        $lang_id = $session['language_id'];
        $user_id = $created = Yii::$app->user->identity->id;
        $cart = Cart::find()->select(['cart.*'])->leftJoin('products', '`products`.`id` = `cart`.`product_id`')->where(['cart.user_id' => $user_id])->andWhere(['cart.status' => 1])->with('products')->all();
//        die(var_dump($cart[0]['products']));
        return $this->render('cart', [
                    'cart' => $cart,
        ]);
    }

    /**
     * Displays remove-cart.
     *
     * @return mixed
     */
    public function actionRemoveCart() {
        $id = $_GET['id'];
        $this->findModel($id)->delete();

        return $this->redirect(['cart']);
    }

    /**
     * Displays add-cart.
     *
     * @return mixed
     */
    public function actionAddCart() {
        $model = new Cart();

        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $id = $_GET['id'];
        $user_id = (int) Yii::$app->user->identity->id;
        $getCartDetails = Cart::find()->where(['user_id' => $user_id])->andWhere(['status' => 1])->one();
        if (sizeof($getCartDetails) > 0) {
            $model->cart_alias = $getCartDetails['cart_alias'];
        } else {
            $model->cart_alias = generateRandomString();
        }

        $model->user_id = $user_id;
        $model->product_id = $id;
        $model->quantity = 1;
        $model->status = 1;
        $model->date_created = time();
        if ($model->save()) {
            return $this->redirect(['cart']);
        } else {
            return $this->redirect(['cart']);
        }
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Displays update-cart.
     *
     * @return mixed
     */
    public function actionUpdateCart() {
        $i = 0;
        if (isset($_POST)) {
//            die(var_dump($_POST));
            foreach ($_POST as $dataDetails => $data) {
                $model = new Cart();
                $quantity = $data['itemQuantity_' . $i];
                $id = $data['id_' . $i];
                $itemID = $data['itemID_' . $i];
                $modelCart = Cart::findOne($id);
                $getProduct = Products::find()->where(['id' => $itemID])->one();
//                die($getProduct['store_quantity'] . "lol");
                if ($quantity < $getProduct['store_quantity']) {
                    $modelCart->quantity = $quantity;
                    if (!$modelCart->save()) {
                        die(var_dump($modelCart->errors));
                    }
                }
                $i++;
            }
            return $this->redirect('/cart');
        } else {
            return $this->redirect('/cart');
        }
    }

    /**
     * Displays Checkout.
     *
     * @return mixed
     */
    public function actionCheckout() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        }

        if (isset($_POST['Orders']['cart_alias'])) {
            die(var_dump($_POST));
        } else {
            $session = Yii::$app->session;
            $lang_id = $session['language_id'];
            $user_id = $created = Yii::$app->user->identity->id;
            $cart = Cart::find()->select(['cart.*'])->leftJoin('products', '`products`.`id` = `cart`.`product_id`')->where(['cart.user_id' => $user_id])->andWhere(['cart.status' => 1])->with('products')->all();
            return $this->render('checkout', [
                        'cart' => $cart,
            ]);
        }
    }

    /**
     * Displays submit-checkout.
     *
     * @return mixed
     */
    public function actionSubmitCheckout() {
        if (isset($_POST)) {
            $cartDetails = Cart::find()->where(['cart_alias' => $_POST['Orders']['cart_alias']])->all();
            foreach ($cartDetails as $carts => $cart) {
                $getItem = Products::find()->where(['id' => $cart['product_id']])->one();
                $modelProduct = Products::findOne($cart['product_id']);
                $modelProduct->name = $getItem['name'];
                $modelProduct->price = $getItem['price'];
                $modelProduct->store_quantity = $getItem['store_quantity'] - $cart['quantity'];
                if (!$modelProduct->save()) {
                    return $this->redirect('/');
                }
            }
            Cart::updateAll(['status' => 2], ['and', ['cart_alias' => $_POST['Orders']['cart_alias']]]);
            $model = new Orders();
            $model->cart_alias = $_POST['Orders']['cart_alias'];
            $model->total_amount = $_POST['Orders']['total_amount'];
            $model->user_id = Yii::$app->user->identity->id;
            $model->username = $_POST['Orders']['name'];
            $model->user_email = $_POST['Orders']['email'];
            $model->user_phone = $_POST['Orders']['phone'];
            $model->user_address = $_POST['Orders']['address'];
            $model->date_created = time();
            $model->save();
            return $this->redirect('/');
        } else {
            return $this->redirect('/');
        }
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $session = Yii::$app->session;
        $lang_id = $session['language_id'];
        $model = new Contact();
        $social_media = SocialMedia::find()->all();
        $info = ContactInfo::find()->where(['lang_id' => $lang_id])->orderBy(['id' => SORT_DESC])->one();
        $banner_image = PagesBanners::find()->Where(['page_id' => 4])->one();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            return $this->redirect(['/contact']);
        } else {
            return $this->render('contact', [
                        'model' => $model,
                        'social_media' => $social_media[0],
                        'info' => $info,
                        'banner_image' => $banner_image->path,
            ]);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            $model->admin = 20;
            $model->phone = '0799204541';
            if (isset($mode->username)) {
                $model->username = $model->username;
            } else {
                $email = $model->email;
                $username = explode("@", $model->email);
                $model->username = $username[0];
            }

            if (isset($model->password)) {
                $model->password = $model->password;
            } else {
                $email = $model->email;
                $password = explode("@", $model->email);
                $model->password = $password[0];
            }

            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect('/index');
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    protected function findModel($id) {
        if (($model = Cart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
