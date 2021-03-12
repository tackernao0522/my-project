# 個人開発アプリ投稿サイト

**自作アプリの紹介に特化したアプリです。**
<br><br>
**URL** https://taka-project.work/

![スクリーンショット 2021-03-12 13 53 16](https://user-images.githubusercontent.com/53789796/110893986-6160ae80-833a-11eb-9d83-07fffe0ee24c.png)

## DB設計

![スクリーンショット 2021-03-11 15 55 17](https://user-images.githubusercontent.com/53789796/110751361-19cd1a80-8287-11eb-9272-b530b8e7d0ac.png)

## AWS構成図

![スクリーンショット 2021-03-11 20 24 01](https://user-images.githubusercontent.com/53789796/110780244-d46d1500-82a7-11eb-9c64-3c0ca32b7fd3.png)

## 使用技術

* __フロントエンド__
  * __Vue.js 2.6.12__
  * __jQuery 3.2__
  * __HTML / CSS / Sass / MDBootstrap__

* __バックエンド__
  * __PHP 7.4.1__
  * __Laravel 7.30.4__
  * __PHPUnit 8.5.8__
  * __Twitter OAuth / Facebook OAuth / Google OAuth__

* __インフラ__
  * __CircleCi__ (自動テスト)
  * __Docker 19.03.13 / docker-compose__
  * __nginx 1.18__
  * __mysql 5.7.31__
  * __AWS__ ( EC2, ALB, ACM, S3, RDS, CodePipeline, CodeCommit, CodeDeploy, SNS, Chatbot, CloudFormation, Route53, CloudWatch, VPC, EIP, IAM)

## 機能一覧

  * __ユーザー登録関連__
    * 新規登録(FaceBook、Twitter、Google)、プロフィール編集機能
    * ログイン(FaceBook、Twitter、Google)、ログアウト機能、パスワード再設定機能(SendGrid)
    * 管理者用ページ

  * __ページネーション__
    * コメント一覧、フォロー中/フォロワー一覧etc..

  * __自作アプリ投稿関連(CRUD)__
    * 画像アップロード(AWS S3)
    * Title入力
    * タグ機能(Vue.js / Vue Tags Input)
    * 使用言語入力
    * 使用フレームワーク入力
    * 説明欄

  * __コメント機能__ (ページネーション)

  * __いいね機能__ (Vue.js / ajax)

  * __フォロー機能__ (Vue.js / ajax)
    * フォロー、フォロー解除

  * __キーワード検索機能__ (ページネーション)

  * __PHPUnitテスト__

  * __レスポンシブWeb__
