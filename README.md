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

[Button製作大師(with bootstrap)](http://www.plugolabs.com/twitter-bootstrap-button-generator-3/)  
[Button製作大師(with font-awesome)](http://www.plugolabs.com/twitter-bootstrap-button-generator-with-awesome-font/)  
[挑顏色好用](http://materializecss.com/color.html)  

[Bootstrap Material詳細文件](http://rosskevin.github.io/bootstrap-material-design/components/buttons/)  
[Bootstrap Material範例集](http://fezvrasta.github.io/bootstrap-material-design/)  

可用小圖案:  
[Google Material Icon(只能原生不能改)](https://design.google.com/icons/)  
[Font Awesome](http://fontawesome.io/icons/)  
[Bootstrap](http://getbootstrap.com/components/#glyphicons)

[jQuery:w3schools](http://www.w3schools.com/jquery/)  

## 使用套件&版本

PHP:  
[laravel/framework(v5.2.39)](https://laravel.com/docs/5.2)  
[caffeinated/shinobi(v2.4.1)](https://github.com/caffeinated/shinobi/wiki)  
[laravelcollective/html(v5.2.4)](https://laravelcollective.com/docs/5.2/html)  
[smarch/watchtower(v1.1.5.3)](https://github.com/SmarchSoftware/watchtower)  
[unisharp/laravel-ckeditor(v4.5.7)](https://github.com/UniSharp/laravel-ckeditor)  
[intervention/image(v2.3.7)](https://github.com/Intervention/image)  
[unisharp/laravel-filemanager(v1.5.2)](https://github.com/UniSharp/laravel-filemanager)

其他:  
[Bootstrap-3.3.6](http://getbootstrap.com)  
[bootstrap-material-design-0.5.10](https://github.com/FezVrasta/bootstrap-material-design)  
[Font Awesome-4.6.3](http://fontawesome.io)  
[jQuery-1.12.4](http://api.jquery.com)  
[pickadate.js-3.5.6](http://amsul.ca/pickadate.js/date/)  


## 部署

`git clone git@gitlab.com:ncufresh/ncufresh16.git`  
`cd ncufresh16`  
`composer install`  
`cp .env.example .env`  
`php artisan key:generate`  
再更改 .env , 建資料庫  
`php artisan migrate`    
`php artisan db:seed`  
`php artisan serve`


## 權限懶人包

目前的測試帳號
email: q@q  
password: q  

在blade模板你可以:  
```
@can('management')
    有權限修改的code
@else
    一般人看到的code
@endcan
```

在routes你可以:  
```
Route::group( ['middleware' => 'admin'], function () {
    Route::get('/test', function () { return '嗨!我是管理員'; });
});
```


## 編輯器及上傳檔案懶人包

在編輯器裡面使用:  
```
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
CKEDITOR.replace( '你的textarea的id或name', {
    filebrowserImageBrowseUrl: '{{ url('/laravel-filemanager?type=Images') }}',
    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '{{ url('/laravel-filemanager?type=Files') }}',
    filebrowserUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
});
</script>
```
只想單純上傳檔案:  
```
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<div class="input-group">
  <span class="input-group-btn">
    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
      <i class="fa fa-picture-o"></i> Choose
    </a>
  </span>
  <input id="thumbnail" class="form-control" type="text" name="filepath">
</div>
<img id="holder" style="margin-top:15px;max-height:100px;">
```
`$('#lfm').filemanager('image');` or `$('#lfm').filemanager('file');`

## 程式碼準則
HTML:  
屬性永遠使用雙引號，永遠別用單引號。  
屬性應按照特定順序撰寫，確保程式碼的易讀性。
- class
- id, name
- data-*
- src, for, type, href
- title, alt
- aria-其他, role
- Class 是為了重用的元素而生，應該排第一位。ID 具體得多，應盡量少用（可用場景像是頁內書籤），所以排第二位。  

PHP:  
程式碼縮排是四個空格長  
Modal字首大寫、單數  
資料表字首小寫、複數  
Controller字首大寫  
View的檔案名稱及資料夾名稱應全小寫  

## 正式上線
`composer dump-autoload`  
`composer install --no-dev`  
`php artisan env`
```
APP_ENV=production
APP_DEBUG=false
```
把`vendor/unisharp/laravel-filemanager/src/controllers/UploadController.php`第111行註解  
