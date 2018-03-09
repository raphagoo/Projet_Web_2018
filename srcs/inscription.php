<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Projet web inscription</title>
</head>

<!-- NOTE: Pseudo ; Nom ; Prenom ; mail ; mot de passe ; adresse ; adresse2 ; code postal ; ville ; pays ; -->

<body>
  <h1>Inscription</h1>
    <fieldset>
        <legend>Inscrivez-vous !</legend>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <label for="username">Pseudo : </label>
            <input type="text" name="username" value="">

            <label for="user_lastname">Nom : </label>
            <input type="text" name="user_lastname" value="">

            <label for="user_mail">Email : </label>
            <input type="text" name="user_mail" value="">

            <label for="user_password">Mot de passe</label>
            <input type="password" name="user_password" value="">

            <label for="user_firstname">Prenom : </label>
            <input type="text" name="user_firstname" value="">

            <label for="user_address">Adresse : </label>
            <input type="text" name="user_address" value="" placeholder="Ex : 50 rue de ...">

            <label for="user_address2">Adresse 2 : </label>
            <input type="text" name="user_address2" value="">

            <label for="user_zipcode">Code postal : </label>
            <input type="text" name="user_zipcode" value="">

            <label for="user_city">Ville : </label>
            <input type="text" name="user_city" value="">

            <label for="user_country">Pays : </label>
            <select name="user_country">
              <option selected="selected">Selectionnez un pays dans cette liste : </option>
              <option value="couaf">Afghanistan | افغانستان</option>
              <option value="coual">Albania | Shqipëria</option>
              <option value="coudz">Algeria | الجزائر</option>
              <option value="couad">Andorra</option>
              <option value="couao">Angola</option>
              <option value="couag">Antigua and Barbuda</option>
              <option value="couar">Argentina</option>
              <option value="couam">Armenia | Հայաստան</option>
              <option value="couau">Australia</option>
              <option value="couat">Austria | Österreich</option>
              <option value="couaz">Azerbaijan | Azərbaycan</option>
              <option value="coubs">Bahamas</option>
              <option value="coubh">Bahrain | البحرين</option>
              <option value="coubd">Bangladesh | বাংলাদেশ</option>
              <option value="coubb">Barbados</option>
              <option value="couby">Belarus | Беларусь</option>
              <option value="coube">Belgium | België | Belgique | Belgien</option>
              <option value="coubz">Belize</option>
              <option value="coubj">Benin | Bénin</option>
              <option value="coubt">Bhutan | འབྲུག་ཡུལ།</option>
              <option value="coubo">Bolivia | Wuliwya | Volívia | Buliwya</option>
              <option value="couba">Bosnia and Herzegovina | Bosna i Hercegovina</option>
              <option value="coubw">Botswana</option>
              <option value="coubr">Brazil | Brasil</option>
              <option value="coubn">Brunei</option>
              <option value="coubg">Bulgaria | България</option>
              <option value="coubf">Burkina Faso</option>
              <option value="coumm">Burma | မ္ရန္&zwnj;မာ</option>
              <option value="coubi">Burundi | Uburundi</option>
              <option value="coukh">Cambodia | កម្ពុជា</option>
              <option value="coucm">Cameroon | Cameroun</option>
              <option value="couca">Canada</option>
              <option value="coucv">Cape Verde | Cabo Verde</option>
              <option value="coucf">Central African Republic | Centrafrique | Bêafrîka</option>
              <option value="coutd">Chad | Tchad | تشاد</option>
              <option value="coucl">Chile</option>
              <option value="coucn">China | 中國/中国</option>
              <option value="couco">Colombia</option>
              <option value="coukm">Comoros | Komori | Comores | جزر القمر</option>
              <option value="coucd">Congo, Dem. Rep. | Congo, Rép. dém.</option>
              <option value="coucg">Congo, Republic | Congo, République</option>
              <option value="coucr">Costa Rica</option>
              <option value="couci">Cote d’Ivoire | Côte d’Ivoire</option>
              <option value="couhr">Croatia | Hrvatska</option>
              <option value="coucu">Cuba</option>
              <option value="coucy">Cyprus | Κύπρος | Kıbrıs</option>
              <option value="coucz">Czechia | Česko</option>
              <option value="coudk">Denmark | Danmark</option>
              <option value="coudj">Djibouti | جيبوتي</option>
              <option value="coudm">Dominica</option>
              <option value="coudo">Dominican Republic | República Dominicana</option>
              <option value="coutl">East Timor | Timór-Leste | Timor-Leste</option>
              <option value="couec">Ecuador</option>
              <option value="coueg">Egypt | مصر</option>
              <option value="cousv">El Salvador</option>
              <option value="cougq">Equatorial Guinea | Guinea Ecuatorial | Guinée équatoriale | Guiné Equatorial</option>
              <option value="couer">Eritrea | ኤርትራ | إرتريا</option>
              <option value="couee">Estonia | Eesti</option>
              <option value="couet">Ethiopia | ኢትዮጵያ</option>
              <option value="coufj">Fiji | Viti | फ़िजी</option>
              <option value="coufi">Finland | Suomi</option>
              <option value="coufr">France</option>
              <option value="couga">Gabon</option>
              <option value="cougm">Gambia</option>
              <option value="couge">Georgia | საქართველო</option>
              <option value="coude">Germany | Deutschland</option>
              <option value="cough">Ghana</option>
              <option value="cougr">Greece | Ελλάδα</option>
              <option value="cougd">Grenada</option>
              <option value="cougt">Guatemala</option>
              <option value="cougn">Guinea | Guinée</option>
              <option value="cougw">Guinea-Bissau | Guiné-Bissau</option>
              <option value="cougy">Guyana</option>
              <option value="couht">Haiti | Haïti | Ayiti</option>
              <option value="couhn">Honduras</option>
              <option value="couhu">Hungary | Magyarország</option>
              <option value="couis">Iceland | Ísland</option>
              <option value="couin">India | भारत</option>
              <option value="couid">Indonesia</option>
              <option value="couir">Iran | ایران</option>
              <option value="couiq">Iraq | العراق</option>
              <option value="couie">Ireland | Éire</option>
              <option value="couil">Israel | إسرائيل | ישראל</option>
              <option value="couit">Italy | Italia</option>
              <option value="coujm">Jamaica</option>
              <option value="coujp">Japan | 日本</option>
              <option value="coujo">Jordan | الأردن</option>
              <option value="coukz">Kazakhstan | Қазақстан</option>
              <option value="couke">Kenya</option>
              <option value="couki">Kiribati</option>
              <option value="coukp">Korea, North | 조선</option>
              <option value="coukr">Korea, South | 한국</option>
              <option value="coukv">Kosovo | Kosova | Косово</option>
              <option value="coukw">Kuwait | الكويت</option>
              <option value="coukg">Kyrgyzstan | Кыргызстан</option>
              <option value="coula">Laos | ປະເທດ​ລາວ</option>
              <option value="coulv">Latvia | Latvija</option>
              <option value="coulb">Lebanon | لبنان</option>
              <option value="couls">Lesotho</option>
              <option value="coulr">Liberia</option>
              <option value="couly">Libya | ليبيا</option>
              <option value="couli">Liechtenstein</option>
              <option value="coult">Lithuania | Lietuva</option>
              <option value="coulu">Luxembourg | Luxemburg | Lëtzebuerg</option>
              <option value="coumk">Macedonia | Македонија</option>
              <option value="coumg">Madagascar | Madagasikara</option>
              <option value="coumw">Malawi | Malaŵi</option>
              <option value="coumy">Malaysia</option>
              <option value="coumv">Maldives | ދިވެހިރާއްޖެ</option>
              <option value="couml">Mali</option>
              <option value="coumt">Malta</option>
              <option value="coumh">Marshall Islands | Aelōñin Ṃajeḷ</option>
              <option value="coumr">Mauritania | موريتانيا | Mauritanie</option>
              <option value="coumu">Mauritius | Maurice</option>
              <option value="coumx">Mexico | México | Mēxihco</option>
              <option value="coufm">Micronesia</option>
              <option value="coumd">Moldova</option>
              <option value="coumc">Monaco</option>
              <option value="coumn">Mongolia | Монгол улс</option>
              <option value="coume">Montenegro | Crna Gora / Црна Гора</option>
              <option value="couma">Morocco | المغرب</option>
              <option value="coumz">Mozambique | Moçambique</option>
              <option value="couna">Namibia</option>
              <option value="counr">Nauru | Naoero</option>
              <option value="counp">Nepal | नेपाल</option>
              <option value="counl">Netherlands | Nederland</option>
              <option value="counz">New Zealand | Aotearoa</option>
              <option value="couni">Nicaragua</option>
              <option value="coune">Niger</option>
              <option value="coung">Nigeria</option>
              <option value="couno">Norway | Norge / Noreg</option>
              <option value="couom">Oman | عمان</option>
              <option value="coupk">Pakistan | پاکستان</option>
              <option value="coupw">Palau | Belau</option>
              <option value="coups">Palestine | فلسطين</option>
              <option value="coupa">Panama | Panamá</option>
              <option value="coupg">Papua New Guinea | Papua Niugini</option>
              <option value="coupy">Paraguay | Paraguái</option>
              <option value="coupe">Peru | Perú</option>
              <option value="couph">Philippines | Pilipinas</option>
              <option value="coupl">Poland | Polska</option>
              <option value="coupt">Portugal</option>
              <option value="couqa">Qatar | قطر</option>
              <option value="couro">Romania | România</option>
              <option value="couru">Russia | Россия</option>
              <option value="courw">Rwanda</option>
              <option value="coukn">Saint Kitts and Nevis</option>
              <option value="coulc">Saint Lucia</option>
              <option value="couvc">Saint Vincent and the Grenadines</option>
              <option value="couws">Samoa | Sāmoa</option>
              <option value="cousm">San Marino</option>
              <option value="coust">Sao Tome and Principe | São Tomé e Príncipe</option>
              <option value="cousa">Saudi Arabia | العربية السعودية</option>
              <option value="cousn">Senegal | Sénégal</option>
              <option value="cours">Serbia | Србија / Srbija</option>
              <option value="cousc">Seychelles | Sesel</option>
              <option value="cousl">Sierra Leone</option>
              <option value="cousg">Singapore | 新加坡 | Singapura | சிங்கப்பூர்</option>
              <option value="cousk">Slovakia | Slovensko</option>
              <option value="cousi">Slovenia | Slovenija</option>
              <option value="cousb">Solomon Islands</option>
              <option value="couso">Somalia | Soomaaliya | الصومال</option>
              <option value="couza">South Africa | Suid-Afrika</option>
              <option value="couss">South Sudan</option>
              <option value="coues">Spain | España</option>
              <option value="coulk">Sri Lanka | ශ්&zwj;රී ලංකාව | இலங்கை</option>
              <option value="cousd">Sudan | السودان</option>
              <option value="cousr">Suriname</option>
              <option value="cousz">Swaziland | eSwatini</option>
              <option value="couse">Sweden | Sverige</option>
              <option value="couch">Switzerland | Schweiz | Suisse | Svizzera | Svizra</option>
              <option value="cousy">Syria | سورية</option>
              <option value="coutw">Taiwan | 臺灣/台湾</option>
              <option value="coutj">Tajikistan | Тоҷикистон</option>
              <option value="coutz">Tanzania</option>
              <option value="couth">Thailand | ประเทศไทย</option>
              <option value="coutg">Togo</option>
              <option value="couto">Tonga</option>
              <option value="coutt">Trinidad and Tobago</option>
              <option value="coutn">Tunisia | تونس</option>
              <option value="coutr">Turkey | Türkiye</option>
              <option value="coutm">Turkmenistan | Türkmenistan</option>
              <option value="coutv">Tuvalu</option>
              <option value="couug">Uganda</option>
              <option value="couua">Ukraine | Україна</option>
              <option value="couae">United Arab Emirates | الإمارات العربية المتحدة</option>
              <option value="cougb">United Kingdom</option>
              <option value="couus">United States</option>
              <option value="couuy">Uruguay</option>
              <option value="couuz">Uzbekistan | Oʻzbekiston</option>
              <option value="couvu">Vanuatu</option>
              <option value="couva">Vatican City | Civitas Vaticana</option>
              <option value="couve">Venezuela</option>
              <option value="couvn">Vietnam | Việt Nam</option>
              <option value="coueh">Western Sahara | الصحراء الغربية</option>
              <option value="couye">Yemen | اليمن</option>
              <option value="couzm">Zambia</option>
              <option value="couzw">Zimbabwe</option>
            </select>

            <input type="submit" name="sub" value="Valider">

        </form>
    </fieldset>

    <?php
    if($_POST){


      $username = $_POST['username'];
      $user_lastname = $_POST['user_lastname'];
      $user_mail = $_POST['user_mail'];
      $user_password = $_POST['user_password'];
      $user_firstname = $_POST['user_firstname'];
      $user_address = $_POST['user_address'];
      $user_address2 = $_POST['user_address2'];
      $user_zipcode = $_POST['user_zipcode'];
      $user_city = $_POST['user_city'];
      $user_country = $_POST['user_country'];


      $servername = "127.0.0.5";
      $username = "root";
      $password = "";
      $dbname = "projet_web_2017";

      $conn = new PDO('mysql:host=localhost;dbname=projet_web_2017;charset=utf8', 'root', '');

      if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
        }

        $requete = "INSERT INTO user(username, user_lastname, user_mail, user_password, user_firstname, user_address, user_address2, user_zipcode, user_city, user_country) VALUES ('$username', '$user_lastname', '$user_mail', '$user_password', '$user_firstname', '$user_address', '$user_address2', '$user_zipcode', '$user_city', '$user_country')";

      if($conn->query($requete) === TRUE) {
          echo "vous etes inscrit";
        } else {
          echo "Error: " . $requete . "<br>" . $conn->error;
        }
        $conn->close();
      }
     ?>
  </body>
</html>
