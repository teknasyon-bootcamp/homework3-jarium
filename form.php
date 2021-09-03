<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */

 class Form
 {
    private string $action; // action property'i private olarak tanımlıyoruz
    private string $method; // method property'i private olarak tanımlıyoruz
    private array $fields; // fields property'i private olarak tanımlıyoruz
    
    private function __construct($action,$method) //Bir Form nesnesi oluşturulduğunda __construct fonksiyonu ile action ve method için birer değer alıyoruz
    {
        $this->action = $action;
        $this->method = $method;
    }
    static function createPostForm(string $action){ // Post formu oluşturan bir fonksiyon oluşturuyoruz, action değeri parametresi ile datanın gideceği konumu belirliyoruz
        return new static($action,"POST"); // Construct ile aldığımız action değerini ve method değerini post olacak şekilde nesneye tanımlayıp nesneyi döndürüyoruz
    }
    static function createGetForm(string $action){ // Get formu oluşturan bir fonksiyon oluşturuyoruz, action değeri parametresi ile datanın gideceği konumu belirliyoruz
        return new static($action,"GET"); // Construct ile aldığımız action değerini ve method değerini get olacak şekilde nesneye tanımlayıp nesneyi döndürüyoruz
    }
    static function createForm(string $action, string $method){ //Bu fonksiyon yukarıdakiler ile aynı işlemi görüyor, tek farkı method parametresini farklı bir şekilde belirleyebiliyoruz.
        return new static($action,$method); // Construct ile aldığımız action değerini ve belirlenecek method değerini nesneye tanımlayıp nesneyi döndürüyoruz
    }
    public function render():void{
       ?>
       <form method='<?php echo $this->method ?>'; action='<?php echo $this->action ?>'>  <!--Bizden istendiği gibi bir html formu tasarlıyoruz. Form içeriklerini de addField fonksiyonu ile belirlediğimiz değerler ile belirliyoruz. -->
           <?php foreach ($this->fields as $field): ?> <!-- For döngüsüyle fields'ın değerlerini field şeklinde kullanıyoruz, bu şekilde ekrana 3 adet baskı gerçekleşiyor -->
	         <label for='<?php echo $field[1] ?>'><?php echo $field[0] ?></label> <!--$field[0] görüntüdeki label adı, $field[1] html name tagı, $field[2] default value olacak şekilde belirleniyor  -->
	         <input type='text' name='<?php echo $field[1] ?>' value='<?php echo $field[2] ?>' />
             <?php endforeach ?> <!--For döngüsü sonu -->
             <button type="submit">Gönder</button> <!--Gönder butonu-->
       </form> <!--Form sonu -->
       <?php
    }
    public function addField(string $label, string $name, string $defaultValue=null): void { // Burada label, name ve defaultValue değerlerini string olarak alıyoruz. defaultValue belirlenmemişse, default olarak null olmasını ayarlıyoruz.
        $field = [$label,$name,$defaultValue]; //Field adında bir array değişkeni oluşturuyoruz. İçinde label, name ve defaultValue değişkenlerini tutuyor. 
        $this->fields[] = $field; //Fields array'inin içine field'ı ekliyoruz.

    }
    public function setMethod(string $method){ //Bu fonksiyon ile methodu isteğimize göre belirleyebiliyoruz
        $this->method = $method;
    }
 }
 