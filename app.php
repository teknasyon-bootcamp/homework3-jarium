<?php

/**
 * Ödev ile ilgili gerekli geliştirmeyi form.php
 * içerisinde yapmanız gerekiyor.
 */

require "form.php"; //form.php varsa dahil edilir, yoksa hata mesajı verilir

$postForm = Form::createPostForm("globals.php"); // $postForm değişkenine atanmış olacak şekilde, static createPostForm fonksiyonu ile aksiyon değeri "globals.php" olan bir Form nesnesi oluşturduk
$getForm = Form::createGetForm("globals.php"); // $getForm değişkenine atanmış olacak şekilde, static createGetForm fonksiyonu ile aksiyon değeri "globals.php" olan bir Form nesnesi oluşturduk
$lateForm = Form::createForm("globals.php", "POST"); // $lateForm değişkenine atanmış olacak şekilde, static createForm fonksiyonu ile aksiyon değeri "globals.php" olan ve methodu "POST" olan bir Form nesnesi oluşturduk

function itCreateForm(Form $form): Form { //Form nesnesi olacak şekilde $form değerini alıp form nesnesi olacak şekilde çıktı döndürüyoruz
    $form->addField("Name", "name"); // $form objesinin fields özelliklerine addField fonksiyonu ile "Name" ve "name" değerlerini ekliyoruz
    $form->addField("Surname", "surname"); // $form objesinin fields özelliklerine addField fonksiyonu ile "Surname" ve "surname" değerlerini ekliyoruz
    $form->addField("Age", "age", 30); // $form objesinin fields özelliklerine addField fonksiyonu ile "Age" ve "age", default value olarak da 30 değerlerini ekliyoruz
    return $form; // $form nesnesinin fields property'sine addField ile "Name" ve "name" değerlerini ekle
}

$postForm = itCreateForm($postForm); // $postForm objesinin fields özelliklerine, itCreateForm fonksiyonunu kullanarak yeni field değerleri ekliyoruz
$getForm = itCreateForm($getForm);// $getForm objesinin fields özelliklerine, itCreateForm fonksiyonunu kullanarak yeni field değerleri ekliyoruz
$lateForm = itCreateForm($lateForm);// $lateForm objesinin fields özelliklerine, itCreateForm fonksiyonunu kullanarak yeni field değerleri ekliyoruz

$lateForm->setMethod("GET"); //lateForm'un method özelliğini, setMethod fonksiyonu ile "GET" olarak belirliyoruz.

$postForm->render(); //Render fonksiyonunu ile, $postForm nesnesini özelliklerini kullanarak ekrana yazdiriyoruz.
echo "<hr>" . PHP_EOL; // hr ile çizgi çekilip PHP_EOL ile bir aşağıdaki satıra geçiyoruz.
$getForm->render(); //Render fonksiyonunu ile, $getForm nesnesini özelliklerini kullanarak ekrana yazdiriyoruz.
echo "<hr>" . PHP_EOL; // hr ile çizgi çekilip PHP_EOL ile bir aşağıdaki satıra geçiyoruz.
$lateForm->render(); //Render fonksiyonunu ile, $lateForm nesnesini özelliklerini kullanarak ekrana yazdiriyoruz.

