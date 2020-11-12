@extends('dashboard/layout')

@section('title')
    Edit list | {{ env('APP_NAME') }}
@endsection

@section('content')
<div class="d-flex justify-content-between p-2 bg-white p-4">
    <h3 class="header-title">تعديل  الليست </h3>
</div>
<div class="page-inner mt-4">
    <div class="d-flex flex-column">
        <div class="col-12 mb-2">
            <div class="form mb-4">
                <form action="{{ route('dashboard.listing.update' , ['id' => $content->id ]) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="panel-heading">
                                <h4 class="tx-right">معلومات الزبون</h4> <hr>
                            </div>
                            <div class="panel-body">
                                <input type="hidden" name="mowadafaID" value=''>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 p-0">
                                                <div class="form-group col-md-12">
                                                    <input  type="text"
                                                            class="form-control" 
                                                            name="name"
                                                            value="{{ $content->name }}"
                                                            placeholder="الإسم الكامل للزبون"
                                                            required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-0">
                                            <div class="form-group col-md-12">
                                                <input  type="text"
                                                        class="form-control frequired"
                                                        name="adress"
                                                        value="dcdcd"
                                                        placeholder="العنوان"
                                                        required>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 p-0">
                                                <div class="form-group col-md-12">
                                                    <input  type="number"
                                                            class="form-control frequired"
                                                            name="tel"
                                                            value="{{ $content->name }}"
                                                            id="tel"
                                                            maxlength="10"
                                                            placeholder="رقم الهاتف"
                                                            required>
                                                </div>
                                            </div>  
                                            
                                            <div class="col-md-6 p-0">
                                                <div class="form-group col-md-12">
                                                    <select class="form-control frequired"
                                                            name="cityID"
                                                            placeholder="المدينة">
                                                        <option value='N-A'>اختيار المدينة</option>
                                                                    <option value="1">agadir</option>
                                                                    <option value="2">marakech</option>
                                                                    <option value="3">casablanca</option>
                                                                    <option value="4">dakhla</option>
                                                                    <option value="33">Fes</option>
                                                                    <option value="34">النواحي</option>
                                                                    <option value="35">Tanger</option>
                                                                    <option value="36">Rabat</option>
                                                                    <option value="37">Guelmim</option>
                                                                    <option value="38">Afourar</option>
                                                                    <option value="39">Ahfir</option>
                                                                    <option value="40">Ain El Aouda</option>
                                                                    <option value="41">Ain Harrouda</option>
                                                                    <option value="42">Ajdir</option>
                                                                    <option value="43">Al Aroui</option>
                                                                    <option value="44">Assilah</option>
                                                                    <option value="45">Azemmour</option>
                                                                    <option value="46">Azilal</option>
                                                                    <option value="47">BELAAGUID</option>
                                                                    <option value="48">Belfaa</option>
                                                                    <option value="49">Ben Ahmed</option>
                                                                    <option value="50">Beni ensar</option>
                                                                    <option value="51">Béni Mellal</option>
                                                                    <option value="52">Berkane</option>
                                                                    <option value="53">Berrechid</option>
                                                                    <option value="54">Bir Jdid</option>
                                                                    <option value="55">Bni Bouayach</option>
                                                                    <option value="56">Bni Drar</option>
                                                                    <option value="57">Boufakrane</option>
                                                                    <option value="58">Bouskoura</option>
                                                                    <option value="59">Cafémaure</option>
                                                                    <option value="60">Chefchaouen</option>
                                                                    <option value="61">Dar bouazza</option>
                                                                    <option value="62">Deroua</option>
                                                                    <option value="63">El Hajeb</option>
                                                                    <option value="64">El Jadida</option>
                                                                    <option value="65">El Ksiba</option>
                                                                    <option value="66">El Mansouria</option>
                                                                    <option value="67">Essaouira</option>
                                                                    <option value="68">Errachidia</option>
                                                                    <option value="69">Fnideq</option>
                                                                    <option value="70">Fquih Ben Salah</option>
                                                                    <option value="71">had soualem</option>
                                                                    <option value="72">Imzouren</option>
                                                                    <option value="73">Jorf Lasfar</option>
                                                                    <option value="74">Kasba Tadla</option>
                                                                    <option value="75">Khemis Zemamra</option>
                                                                    <option value="76">Khémisset</option>
                                                                    <option value="77">Khénifra</option>
                                                                    <option value="78">Khouribga</option>
                                                                    <option value="79">Ksar Sghir</option>
                                                                    <option value="80">Laayoune</option>
                                                                    <option value="81">Lakhyayeta</option>
                                                                    <option value="82">Loudaya</option>
                                                                    <option value="83">M&#039;diq</option>
                                                                    <option value="84">M&#039;rirt</option>
                                                                    <option value="85">Martil</option>
                                                                    <option value="86">Mediouna</option>
                                                                    <option value="87">Mehdia</option>
                                                                    <option value="88">Meknes</option>
                                                                    <option value="89">Mohammadia</option>
                                                                    <option value="90">Moulay Abdellah Amghar</option>
                                                                    <option value="91">Nador</option>
                                                                    <option value="92">Nouasser</option>
                                                                    <option value="93">Ouarzazate</option>
                                                                    <option value="94">Ouazzane</option>
                                                                    <option value="95">Oued Laou</option>
                                                                    <option value="96">Oued Zem</option>
                                                                    <option value="97">Oujda</option>
                                                                    <option value="98">Oulad Ayad</option>
                                                                    <option value="99">Oulad Hassoun</option>
                                                                    <option value="100">Oulad moussa</option>
                                                                    <option value="101">Ourika</option>
                                                                    <option value="102">Ras El Ma</option>
                                                                    <option value="103">Sabaa Aiyoun</option>
                                                                    <option value="104">Safi</option>
                                                                    <option value="105">Sebt Gezoula</option>
                                                                    <option value="106">Segangan</option>
                                                                    <option value="107">Selouane</option>
                                                                    <option value="108">Settat</option>
                                                                    <option value="109">Sidi Bennour</option>
                                                                    <option value="110">Sidi Bibi</option>
                                                                    <option value="111">Sidi Bou Othmane</option>
                                                                    <option value="112">Sidi Bouknadel</option>
                                                                    <option value="113">Sidi Bouzid</option>
                                                                    <option value="114">Sidi Kacem</option>
                                                                    <option value="115">Sidi Rehal</option>
                                                                    <option value="116">Sidi Slimane</option>
                                                                    <option value="117">Sidi Taibi</option>
                                                                    <option value="118">Sidi Zouine</option>
                                                                    <option value="119">Souihla</option>
                                                                    <option value="120">Souk Sebt Oulad Nemma</option>
                                                                    <option value="121">Tahanaout</option>
                                                                    <option value="122">Tamansourt</option>
                                                                    <option value="123">Tameslouht</option>
                                                                    <option value="124">Tamesna</option>
                                                                    <option value="125">Targuist</option>
                                                                    <option value="126">Taza</option>
                                                                    <option value="127">Tetouan</option>
                                                                    <option value="128">Tiflet</option>
                                                                    <option value="129">Tit Mellil</option>
                                                                    <option value="130">T</option>
                                                                    <option value="131">Youssoufia</option>
                                                                    <option value="132">Taghazout</option>
                                                                    <option value="133">Sale</option>
                                                                    <option value="134">Temara</option>
                                                                    <option value="135">Al Hoceima</option>
                                                                    <option value="136">Demnate</option>
                                                                    <option value="137">Guercif</option>
                                                                    <option value="138">l</option>
                                                                    <option value="139">Knitra</option>
                                                                    <option value="140">Taroudant</option>
                                                                    <option value="141">Tiznit</option>
                                                                    <option value="142">larache</option>
                                                                    <option value="143">Azrou</option>
                                                                    <option value="144">Aït Ourir</option>
                                                                    <option value="145">El Kelaâ des Sraghna</option>
                                                                    <option value="146">Lâattaouia</option>
                                                                    <option value="147">Bejâad</option>
                                                                    <option value="148">jamâat Shaim</option>
                                                                    <option value="149">Ifrane</option>
                                                                    <option value="150">Moulay Idriss Zerhoun</option>
                                                                    <option value="151">ksar El kébir</option>
                                                                    <option value="152">saidia</option>
                                                                    <option value="153">Tahla</option>
                                                                    <option value="154">TIZ</option>
                                                                    <option value="155">Echemmaia</option>
                                                                    <option value="156">Ounagha</option>
                                                                    <option value="157">Smimou</option>
                                                                    <option value="158">Tamanar</option>
                                                                    <option value="159">Talmest</option>
                                                                    <option value="160">El Guerdane</option>
                                                                    <option value="161">Tin Mansour</option>
                                                                    <option value="162">sidi smail</option>
                                                                    <option value="163">Goulmima</option>
                                                                    <option value="164">Tinghir</option>
                                                                    <option value="165">Aoufous</option>
                                                                    <option value="166">Rissani</option>
                                                                    <option value="167">Er-Rich</option>
                                                                    <option value="168">Midelt</option>
                                                                    <option value="169">Tinejdad</option>
                                                                    <option value="170">Arfoud</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6 p-0">
                                                <div class="form-group col-md-12">
                                                    <select class="form-control frequired"
                                                            id='choseEmployee'
                                                            name="employee"
                                                            placeholder="الموظفة">
                                                        <option value='N-A'>اختيار الموظفة</option>
                                                        <option value="142">ghizlane</option>
                                                        <option value="143">ibtissam</option>
                                                        <option value="144">horszone</option>
                                                        <option value="145">jihan</option>
                                                        <option value="146">pasconfirmé</option>
                                                        <option value="147">hanane</option>
                                                        <option value="157">elmokrara</option>
                                                        <option value="10003">produis</option>
                                                        <option value="10004">Soumia</option>
                                                        <option value="10005">meriem</option>
                                                    </select>
                                                </div>
                                            </div>
                                                
                                            <div class="col-md-6 p-0"  >
                                                <div class="form-group col-md-12">
                                                    <input  type="number"
                                                            class="form-control frequired"
                                                            name="prix_de_laivraison"
                                                            value="{{ $content->prix_de_laivraison }}"
                                                            id="prix_de_laivraison"
                                                            placeholder="ثمن الإرسال بالدرهم - أرقام فقط">
                                                </div>
                                            </div>

                                            <div class="col-md-12 p-0"  >
                                                <div class="form-group col-md-12 m-0">
                                                    <label for="notes" class="float-right">ملاحظات</label>
                                                    <textarea   class="form-control frequired notes"
                                                                name="notes"
                                                                value="{{ $content->notes }}"
                                                                placeholder="ملاحظات">
                                                    </textarea>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="panel mg-t-45 mg-b-25 panel-flat">
                                <div class="panel-heading">
                                    <h4 class="tx-right">المنتجات</h4>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <fieldset class="content-group productsList">
                                        <div class="row col productsTosale">
                                            <div class="col-md-4 p-0">
                                                <div class="form-group col-md-12">
                                                    <div class="product-q">
                                                        <select class="form-control frequired"
                                                                name="ProductID[]"
                                                                placeholder="السلعة">
                                                            <option value="N-A">اختيار المنتوج</option>
                                                            <option value="28">المفرمة الكهربائية صنع الماني</option>
                                                            <option value="29">جهاز للقضاء على الناموس وغيرها من الحشرات</option>
                                                            <option value="30">رشاش دوش بمميزات عجيبة</option>
                                                            <option value="31">مكبر الشاشة تلاثي الابعاد</option>
                                                            <option value="32">محفظة حاملةالبطاقات الذكية</option>
                                                            <option value="33">ستائر تناسب كل سيارات</option>
                                                            <option value="34">جهاز الملفوف</option>
                                                            <option value="35">آلة صنع الحلويات</option>
                                                            <option value="36">آلة الخياطة اليدوية المحمولة</option>
                                                            <option value="37">جهاز تحويل الهاتف الى التلفاز</option>
                                                            <option value="39">شريط لاصق لتثبيت مختلف الأغراض</option>
                                                            <option value="40">المخدة الطبية للاطفال</option>
                                                            <option value="41">غطاء ألمنيوم لحماية داخل السيارة</option>
                                                            <option value="42">فرشاة تنظيف النوافذ المغناطيسية</option>
                                                            <option value="43">مكواة الملابس بالبخار الأزرق</option>
                                                            <option value="44">ماكينة صنع الايس كريم من الفواكه</option>
                                                            <option value="45">‫آلة البانيني الإيطالية</option>
                                                            <option value="46">أداة توفير المساحة في المنزل Magic house</option>
                                                            <option value="47">طحانة التوابل و القهوة</option>
                                                            <option value="48">القفزات</option>
                                                            <option value="49">مصباح كاميرا</option>
                                                            <option value="50">مشط حراري لتسريح اللحية و الشعر</option>
                                                            <option value="51">أداة التقطيع متعددة الوظائف القابلة للطي</option>
                                                            <option value="52">موزع ورق مطبخ 3 في 1</option>
                                                            <option value="55">لعبة تعليمية مبتكرة</option>
                                                            <option value="56">سخان الأكل المحمول</option>
                                                            <option value="58">فيلتر لتصفية الماء</option>
                                                            <option value="60">مسدس رش الماء الخارق</option>
                                                            <option value="64">أداة توفير المساحة في المنزل INOX</option>
                                                            <option value="65">جهاز شفط قوي لإزالة قمل الرأس</option>
                                                            <option value="66">المصباح الرومانسي الدائري</option>
                                                            <option value="67">القاطعة المتعددة الوظائف</option>
                                                            <option value="68">مناديل مبللة لتنظيف الاحذية</option>
                                                            <option value="69">منتج REACT® Reflex Ball​</option>
                                                            <option value="70">المفرمة الكهربائية اينوكس 4 شفرات</option>
                                                            <option value="71">خرطوم الماء قابل للتمدد 15 metre</option>
                                                            <option value="72">ملصق للمطبخ من الألومنيوم الدهبي</option>
                                                            <option value="73">LED Strip 5 Mètres الشريط الضوئي</option>
                                                            <option value="74">ساعة fashion</option>
                                                            <option value="75">نظارات 6 في 1 للسياقه الليلية و الشمسيه</option>
                                                            <option value="76">فرشاة طلاء 6 خصائص في فرشة واحدة</option>
                                                            <option value="77">مقلات دو واجهتين الأصلية و المتعددة الإستعمالات</option>
                                                            <option value="78">revo flex</option>
                                                            <option value="80">نظارات الرؤية الليلية و النهارية لقيادة السيارات</option>
                                                            <option value="81">موزع الصابون والمعقمات الأوتوماتيكي</option>
                                                            <option value="82">الخلاط الخارق المقاوم للكسر إنوكس</option>
                                                            <option value="83">فرامة اللحم الكهربائية</option>
                                                            <option value="84">مقعد الأطفال الآمن داخل السيارة</option>
                                                            <option value="85">ملصق للمطبخ من الألومنيوم color grey</option>
                                                            <option value="86">مكواة الملابس بالبخار الأحمر</option>
                                                            <option value="87">صحن زجاج قابل للحرارة وتركي مع الغطاء</option>
                                                            <option value="88">منتج ترتيب الأحذية القابل للطي</option>
                                                            <option value="89">آلة لتحضير الفشار بدون زيت صحية</option>
                                                            <option value="90">Subaru Shampoing: سوبارو شامبو لشعر اسود داكن واخفاء الشيب</option>
                                                            <option value="91">المشواة العائلية القابلة للطي</option>
                                                            <option value="92">ساعة الأصلية و المقاومة للماء NIBOSI NOIR</option>
                                                            <option value="93">ساعة الأصلية و المقاومة للماء NIBOSI DHBI</option>
                                                            <option value="94">اغطية من السيليكون - 6 قطع</option>
                                                            <option value="95">ساعة صيفية رائعة Montblanc</option>
                                                            <option value="96">spin duster فرشاة الغبار</option>
                                                            <option value="97">SOLO آلة حلاقة</option>
                                                            <option value="98">منظف ​​بخاخ الرغوة متعدد الوظائف</option>
                                                            <option value="99">منظف مبتكر متعدد الأغراض</option>
                                                            <option value="100">آخــر صــيـحـات القبعة والمـعـطـف السـاخــن NOIR</option>
                                                            <option value="101">آخــر صــيـحـات القبعة والمـعـطـف السـاخــن GRIS</option>
                                                            <option value="102">آخــر صــيـحـات القبعة والمـعـطـف السـاخــن BLEU</option>
                                                            <option value="103">Ma9la bghrir</option>
                                                            <option value="104">Kit GHALIYA</option>
                                                            <option value="105">mkhda</option>
                                                            <option value="106">3ala9 papier cuisine</option>
                                                            <option value="107">ساعة Patec gris</option>
                                                            <option value="108">ساعة Patec Noir</option>
                                                            <option value="109">atomic zaper</option>
                                                            <option value="110">Mondif Tomobil</option>
                                                            <option value="111">Mondif Kozina</option>
                                                            <option value="112">ROZIA آلة حلاقة</option>
                                                            <option value="113">Chargeur tomobil</option>
                                                            <option value="114">Egg biol</option>
                                                            <option value="115">Papier gris</option>
                                                            <option value="116">Papier dhbi</option>
                                                            <option value="117">Zit lahya</option>
                                                            <option value="118">Pile</option>
                                                            <option value="119">Magana Omega</option>
                                                            <option value="120">Pawerbank</option>
                                                            <option value="121">magana montblanc</option>
                                                            <option value="122">9ta3a 9dima blanc</option>
                                                            <option value="123">منضم الأحذية</option>
                                                            <option value="124">Nacer dacer</option>
                                                            <option value="125">white light asnan</option>
                                                            <option value="126">hachoir plastic</option>
                                                            <option value="127">Tandeur</option>
                                                            <option value="128">آخــر صــيـحـات القبعة والكاشكول السـاخــن</option>
                                                            <option value="129">Kit Voiture X5</option>
                                                            <option value="131">قطاعة بطاطس مقلية Coupe-frites</option>
                                                            <option value="132">الغلاية الكهربائية من ELITE</option>
                                                        </select>
                                                    </div>
                                                </div>
    
                                            </div>
                                            <div class="col-md-4 p-0">
                                                <div class="form-group col-md-12">
                                                    <input  type="number"
                                                            class="form-control frequired"
                                                            name="prix[]"
                                                            value="{{ $content->price }}"
                                                            placeholder="سعر البيع"
                                                            required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3 p-0">
                                                <div class="form-group col-md-12">
                                                    <input  type="number"
                                                            name="quantity[]"
                                                            value="{{ $content->quantity }}"
                                                            class="form-control frequired"
                                                            id="produit"
                                                            placeholder="الكمية"
                                                            required="">
                                                </div>
                                            </div>
                                            <div class="col-md-1 p-0">
                                                <a id="addmoreproducts" href="javascript:;" class="btn btn-primary">+</a>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <span class="ml-2">حفظ التغييرات</span>
                                <i class="fa fa-arrow-left"></i>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection