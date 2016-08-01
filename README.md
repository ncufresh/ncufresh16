# NCU FRESH 2016


## 文件

[雲端硬碟共用資料](https://drive.google.com/folderview?id=0B_ADZePg5JqlU0I3QmFGNk56aDA&usp=drive_web#grid)  

[Laravel Cheet Sheet](http://cheats.jesse-obrien.ca)  
[英文官方 Laravel 5.2](https://laravel.com/docs/5.2)  
[中文官方 Laravel 5.2](https://laravel.tw/docs/5.2)

[挑顏色好用](http://materializecss.com/color.html)  
[Bootstrap英文](http://getbootstrap.com)  
[Bootstrap中文(3.3.1)](https://kkbruce.tw/bs3/)  
[Bootstrap:w3schools](http://www.w3schools.com/bootstrap/default.asp)  
[jQuery:w3schools](http://www.w3schools.com/jquery/)  
[Button製作(with font-awesome)](http://www.plugolabs.com/twitter-bootstrap-button-generator-with-awesome-font/)  
[Bootstrap Material範例集](http://fezvrasta.github.io/bootstrap-material-design/bootstrap-elements.html)  

可用小圖案:  
[Google Material Icon(縮放用css)](https://design.google.com/icons/)  
[Font Awesome](http://fontawesome.io/icons/)  
[Bootstrap](http://getbootstrap.com/components/#glyphicons)  


## 使用套件&版本

PHP:  
[laravel/framework(v5.2.39)](https://laravel.com/docs/5.2)  
[caffeinated/shinobi(v2.4.1)](https://github.com/caffeinated/shinobi/wiki)  
[laravelcollective/html(v5.2.4)](https://laravelcollective.com/docs/5.2/html)  
[smarch/watchtower(v1.1.5.3)](https://github.com/SmarchSoftware/watchtower)  
[unisharp/laravel-ckeditor(v4.5.7)](https://github.com/UniSharp/laravel-ckeditor)  
[intervention/image(v2.3.7)](https://github.com/Intervention/image)  
[unisharp/laravel-filemanager(v1.5.2)](https://github.com/UniSharp/laravel-filemanager)  
[guzzlehttp/guzzle(v6.2.1)](https://github.com/guzzle/guzzle)  
[kozz/laravel-guzzle-provider(v6.0)](https://github.com/urakozz/laravel-guzzle)  
[jenssegers/agent(v2.3.3)](https://github.com/jenssegers/agent)

其他:  
[Bootstrap-3.3.6](http://getbootstrap.com)  
[bootstrap-material-design-0.5.10](https://github.com/FezVrasta/bootstrap-material-design)
[Font Awesome-4.6.3](http://fontawesome.io)  
[jQuery-1.12.4](http://api.jquery.com)  
[pickadate.js-3.5.6](http://amsul.ca/pickadate.js/date/)  
[jQuery-backstretch-2.0.4](https://github.com/srobbin/jquery-backstretch)  
[jQuery-iziModal-v1.2.0](http://izimodal.marcelodolce.com)  
[jQuery-confirm-v2.5.1](https://github.com/craftpip/jquery-confirm)


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


## URL連結位置

css圖片的url 建議在blade用asset 都試試  
```
background-image:url("{{asset('img/example.png')}}");
background-image:url("../img/example.png");
background-image:url("img/example.png");

```

ajax的url最前面不用加斜線  
```
$.ajax({
    url: "exa/mple"
    type: "GET"
    ......
```

連結, 路由 用url help function  
```
<a href="{{ url('example') }}">
```

css, js, 圖片, 檔案 用asset help function  
```
<img src="{{ asset('img/example') }}">
```


## 手機版偵測懶人包
```
use Jenssegers\Agent\Agent;
或
use Agent;
...
Agent::isMobile(); // return true or false
Agent::isTablet(); // return true or false
```


## 權限懶人包

目前的測試帳號
email: "q@q"  
password: "q"  

在blade模板你可以:  
```
@can('management')
    管理員才看得到
@endcan
```
or
```
@can('management')
    管理員才看得到
@else
    其他人都看得到
@endcan
```

需要的路由加在最上面那坨:  
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
    filebrowserImageBrowseUrl: '{{ url('laravel-filemanager?type=Images') }}',
    filebrowserImageUploadUrl: '{{ url('/') }}' + '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '{{ url('laravel-filemanager?type=Files') }}',
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


## 季節懶人包
春 夏 秋 冬
```
body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(251,198,204,.8) 100%); }
main { background-image:url("{{asset('img/layout/spring.png')}}"); }

body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(145,214,234,.8) 100%); }
main { background-image:url("{{asset('img/layout/summer.png')}}"); }

body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(197,121,002,.8) 100%); }
main { background-image:url("{{asset('img/layout/fall.png')}}"); }

body { background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,0) 30%,rgba(1,50,104,.8) 100%); }
main { background-image:url("{{asset('img/layout/winter.png')}}"); }
```


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


## 後台middleware
`config/lfm.php`  
`config/watchtower.php`  
`app/Http/routes.php`  
