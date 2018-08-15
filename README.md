#backend

## 開発環境
### scotch  
LAMPP環境を簡単に構築するvagrant box  
https://github.com/scotch-io/scotch-box
### MailHog
http://192.168.33.10:8025/  
scotchboxを使えば特に何の設定もなしに使うことができる


## index
### register
シンプルな会員登録およびログイン機能の実装  
@see https://noumenon-th.net/programming/2016/02/26/registration/  
この例だと、メールの重複チェックや、実際ログインする機能がないので、そこを自分でやってみる。
```
create database registration;
use registration;
```

```
mysql> CREATE TABLE pre_member (
    -> id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -> urltoken VARCHAR(128) NOT NULL,
    -> mail VARCHAR(50) NOT NULL,
    -> date DATETIME NOT NULL,
    -> flag TINYINT(1) NOT NULL DEFAULT 0
    -> )ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
```
```
CREATE TABLE member (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
account VARCHAR(50) NOT NULL,
mail VARCHAR(50) NOT NULL,
password VARCHAR(128) NOT NULL,
flag TINYINT(1) NOT NULL DEFAULT 1
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
```