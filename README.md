# NCU FRESH 2016


## 文件

[雲端硬碟共用資料](https://drive.google.com/folderview?id=0B_ADZePg5JqlU0I3QmFGNk56aDA&usp=drive_web#grid)  
[去年的網站](http://lovenery.me/old/)

[Laravel Cheet Sheet](http://cheats.jesse-obrien.ca)  
[英文官方 Laravel 5.2](https://laravel.com/docs/5.2)  
[中文官方 Laravel 5.2](https://laravel.tw/docs/5.2)

[Bootstrap英文](http://getbootstrap.com)  
[Bootstrap中文(3.3.1)](https://kkbruce.tw/bs3/)  
[Bootstrap:w3schools](http://www.w3schools.com/bootstrap/default.asp)  
[Font Awesome](http://fontawesome.io)

[Button製作大師(with bootstrap)](http://www.plugolabs.com/twitter-bootstrap-button-generator-3/)  
[Button製作大師(with font-awesome)](http://www.plugolabs.com/twitter-bootstrap-button-generator-with-awesome-font/)  
[挑顏色好用](http://materializecss.com/color.html)  

[Bootstrap Material詳細文件](http://rosskevin.github.io/bootstrap-material-design/components/buttons/)  
[Bootstrap Material範例集](http://fezvrasta.github.io/bootstrap-material-design/)  

## 使用套件

PHP:  
[caffeinated/shinobi(v2.4.1)](https://github.com/caffeinated/shinobi/wiki)  
[laravelcollective/html(v5.2.4)](https://laravelcollective.com/docs/5.2/html)  
[smarch/watchtower(v1.1.5.3)](https://github.com/SmarchSoftware/watchtower)  

其他:  
[pickadate.js-3.5.6](http://amsul.ca/pickadate.js/date/)  
[bootstrap-material-design-0.5.10](https://github.com/FezVrasta/bootstrap-material-design)


## 部署

`git clone git@gitlab.com:ncufresh/ncufresh16.git`  
`cd ncufresh16`  
`composer install`  
`cp .env.example .env`  
`php artisan key:generate`  
再更改 .env  
`php artisan migrate`    
`php artisan db:seed`  
`php artisan serve`


## 版本

laravel/framework:`5.2.39`  
Bootstrap:`3.3.6`  
Font Awesome:`4.6.3`  
jQuery:`1.12.4`  

## 程式碼準則
HTML:  
屬性永遠使用雙引號，永遠別用單引號。  
屬性應按照特定順序撰寫，確保程式碼的易讀性。
- class
- id, name
- data-*
- src, for, type, href
- title, alt
- aria-*, role
- Class 是為了重用的元素而生，應該排第一位。ID 具體得多，應盡量少用（可用場景像是頁內書籤），所以排第二位。  

PHP:  
程式碼縮排是四個空格長  
Modal字首大寫、單數  
資料表字首小寫、複數  
Controller字首大寫  
View的檔案名稱及資料夾名稱應全小寫  
